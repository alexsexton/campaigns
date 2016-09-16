/* globals jQuery */

'use strict'
// Cookie function
jQuery(function ($) {
  var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)cookieMessage\s*\=\s*([^;]*).*$)|^.*$/, '$1')
  var cookieBanner = $('global-cookie-message')

  cookieBanner.click(function (e) {
    e.preventDefault
    $(this).addClass('visually-hidden')
  })

  if (cookieValue === 'true') {
    cookieBanner.addClass('visually-hidden')
  } else {
    cookieBanner.removeClass('visually-hidden')
    document.cookie = 'cookieMessage=true'
  }
})
