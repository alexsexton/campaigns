/* globals jQuery, ajaxurl, alert */

'use strict'

var angular = require('angular')
var ngSanitize = require('angular-sanitize')
var _ = require('lodash')

var wizard = angular.module('wizard', [ngSanitize])

wizard.controller('Wizard', function ($scope, $sce, $sanitize) {
  var errorSettingGaId = function () {
    alert('An error has occurred. Please contact the administrator of the site.')
  }

  var successSettingGaId = function () {
    alert('Set successfully. You may now continue.')
  }

  $scope.steps = {
    start: {
      start: true,
      actions: {
        'Continue': 'createGoogleAccount'
      },
      instructions: [
        $sanitize('This will step you through the process of setting up GA.')
      ]
    },
    createGoogleAccount: {
      actions: {
        'I created a Google account': 'createGaAccount',
        'I already have a Google account': 'createGaAccount'
      },
      instructions: [
        $sce.trustAsHtml('<a href="https://accounts.google.com/signup">Create a Google account</a>')
      ]
    },
    createGaAccount: {
      actions: {
        'I created an Analytics account': 'enterGaId',
        'I already have an Analytics account': 'enterGaId'
      },
      instructions: [
        $sce.trustAsHtml('<a href="https://analytics.google.com/">Create a Google Analytics account</a>')
      ]
    },
    enterGaId: {
      actions: {
        'Continue': 'finish'
      },
      instructions: [
        $sanitize('Enter your GA code.')
      ],
      fields: [
        {
          type: 'text-and-submit',
          buttonText: 'Set account ID',
          buttonAction: function (ev) {
            var gaId = document.querySelector('div[ng-controller="Wizard"] input').value
            var nonce = document.querySelector('div[ng-controller="Wizard"]').dataset['nonce']

            jQuery.ajax({
              url: ajaxurl,
              method: 'POST',
              data: {
                action: 'campaigns_wizard_ga_id',
                nonce: nonce,
                campaigns_ga_id: gaId
              },
              success: function (data) {
                if (data.error) {
                  errorSettingGaId()
                } else {
                  successSettingGaId()
                }
              },
              error: function (data) {
                errorSettingGaId()
              }
            })
          }
        }
      ]
    },
    finish: {
      instructions: [
        $sanitize('Done. Thank you.')
      ]
    }
  }

  // Set the current step to the start step
  $scope._currentStep = null
  _.each($scope.steps, function (step, id) {
    if (step.start === true) {
      $scope._currentStep = id
    }
  })

  $scope.currentStep = function () {
    return $scope.steps[$scope._currentStep]
  }

  $scope.nextStep = function (target) {
    $scope._currentStep = target
  }
})
