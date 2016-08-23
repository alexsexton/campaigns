/* global jQuery acf confirm */

'use strict'

jQuery(function ($) {
  var removeElOriginal = acf.remove_el

  acf.remove_el = function () {
    // The situation where we want the "are you sure" message uses 3 arguments.
    // The other situations just use 1 argument.
    if (arguments.length === 3) {
      if (confirm('Are you sure you want to remove this?')) {
        removeElOriginal.apply(acf, arguments)
      }
    } else {
      removeElOriginal.apply(acf, arguments)
    }
  }
})
