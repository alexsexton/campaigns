/* globals jQuery, ajaxurl, alert */

'use strict'

var angular = require('angular')
var ngSanitize = require('angular-sanitize')

var wizard = angular.module('wizard', [ngSanitize])

wizard.controller('Wizard', function ($scope, $sce, $sanitize) {
  var errorSettingId = function () {
    alert('An error has occurred. Please contact the administrator of the site.')
  }

  var successSettingId = function () {
    alert('Set successfully.')
  }

  $scope.set = function (type, id) {
    var nonce = document.querySelector('div[ng-controller="Wizard"]').dataset['nonce']

    jQuery.ajax({
      url: ajaxurl,
      method: 'POST',
      data: {
        action: 'campaigns_wizard_set',
        nonce: nonce,
        campaigns_wizard_type: type,
        campaigns_wizard_id: id
      },
      success: function (data) {
        if (data.error === false) {
          successSettingId()
        } else {
          errorSettingId()
        }
      },
      error: function (data) {
        errorSettingId()
      }
    })
  }
})
