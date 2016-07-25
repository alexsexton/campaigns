/* globals jQuery */

'use strict'

// Etc
require('date-polyfill')
require('./common')
var enquire = require('../../bower_components/enquire/dist/enquire.js')
require('../../bower_components/jquery-accessibleMegaMenu/js/jquery-accessibleMegaMenu.js')
require('../../bower_components/fitvids/jquery.fitvids.js')

jQuery(function ($) {
  // Mega menu
  $(function () {
    enquire.register('screen and (min-width:779px)', {
      match: function () {
        // Main Nav
        $('.menu-header-container').accessibleMegaMenu({
          uuidPrefix: 'accessible-nav',
          menuClass: 'nav-menu',
          topNavItemClass: 'nav-item',
          panelClass: 'sub-nav',
          panelGroupClass: 'sub-nav-group',
          hoverClass: 'hover',
          focusClass: 'focus',
          openClass: 'open'
        })
      },
      unmatch: function () {}
    })
  })

  // Extend jQuery to make a toggle text function.
  jQuery.fn.extend({
    toggleText: function (stateOne, stateTwo) {
      return this.each(function () {
        stateTwo = stateTwo || ''
        $(this).text() !== stateTwo && stateOne ? $(this).text(stateTwo) : $(this).text(stateOne)
      })
    }
  })

  // Toggle navigation
  $(function () {
    $('#js-navigation-toggle').click(function () {
      $(this).toggleText('Close', 'Menu')
      $('#js-navigation').toggleClass('open')
    })
  })

  // Call Fitvids on video elements
  $(function () {
    $('.fitvids').fitVids()
  })

  // Magic to give the hero block some height dimmensions if it has no image
  $(function () {
    enquire.register('screen and (min-width:779px)', {
      match: function () {
        $(function () {
          var overlayHeight = $('.has-background-colour').height()
          var padding = '60'
          var heroContainerHeight = overlayHeight + (padding * 2)
          if (overlayHeight !== null) {
            $('.hero').height(heroContainerHeight)
          }
        })
      },
      unmatch: function () {
        $(function () {
          $('.hero').height('auto')
        })
      }
    })
  })
// end
})
