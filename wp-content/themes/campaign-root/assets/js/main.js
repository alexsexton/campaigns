/* globals jQuery, ga */

'use strict'

// Etc
require('date-polyfill')
require('./common')
var enquire = require('../../bower_components/enquire/dist/enquire.js')
require('../../bower_components/jquery-accessibleMegaMenu/js/jquery-accessibleMegaMenu.js')
require('../../bower_components/fitvids/jquery.fitvids.js')
require('../../bower_components/jquery-backstretch/jquery.backstretch.min.js')

jQuery(function ($) {
  // Enquire functions
  $(function () {
    enquire.register('screen and (min-width:779px)', {
      match: function () {
        // Main Nav
        $('.menu-header').accessibleMegaMenu({
          uuidPrefix: 'accessible-nav',
          menuClass: 'nav-menu',
          topNavItemClass: 'nav-item',
          panelClass: 'sub-nav',
          panelGroupClass: 'sub-nav-group',
          hoverClass: 'hover',
          focusClass: 'focus',
          openClass: 'open'
        })
        // hack so that the megamenu doesn't show flash of css animation after the page loads.
        setTimeout(function () {
          $('body').removeClass('init')
        }, 500)
        // Change aria-hidden state
        $('#js-navigation-toggle').attr('aria-hidden', 'true')
        // Magic
        $('.banner-has-background-colour').each(function () {
          var overlayHeight = $(this).find('.overlay').height()
          var padding = '38' // should be the same as $padding in scss/settings/_global.scss
          var heroContainerHeight = overlayHeight + (padding * 2)
          if (overlayHeight !== null) {
            $(this).height(heroContainerHeight)
          }
        })
      },
      unmatch: function () {
        // Un Magic
        $('.banner-has-background-colour').height('auto')
      }
    })
  })

  // Change aria-hidden state
  $(function () {
    enquire.register('screen and (max-width:779px)', {
      match: function () {
        $('#js-navigation-toggle').attr('aria-hidden', 'false')
        $('.sub-nav').attr('aria-hidden', 'false')
      },
      unmatch: function () {
        $('#js-navigation-toggle').attr('aria-hidden', 'true')
        $('.sub-nav').attr('aria-hidden', 'true')
      }
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

  // Hidden help text
  $(function () {
    $('.details').each(function () {
      $(this).find('.panel').addClass('visually-hidden')
      $(this).click(function () {
        $(this).toggleClass('open')
        $(this).find('.panel').toggleClass('visually-hidden')
      })
    })
  })

  // Adds external class to outbound links for tracking
  $(function () {
    $('a').not('[href*="mailto:"]').each(function () {
      var isInternalLink = new RegExp('/' + window.location.host + '/')
      if (!isInternalLink.test(this.href)) {
        $(this).addClass('external').attr('rel', 'external')
      }
    })
  })

  // Tracks external links but not those with event tracking already attached
  $(function () {
    $('.external:not([onclick])').click(function () {
      ga('send', 'event', 'External Link Clicked', this.href, $(this).text())
    })
  })

  // Call Fitvids on video elements
  $(function () {
    $('.fitvids').fitVids()
  })
// end
})
