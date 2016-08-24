/* global jQuery acf confirm */

'use strict'

jQuery(function ($) {
  // Add an "are you sure" message to the flexible content remove button

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

  // Change wording of title attributes

  $('[data-event="add-layout"]').attr('title', 'Add section')
  $('[data-event="remove-layout"]').attr('title', 'Remove section')
  $('[data-event="collapse-layout"]').attr('title', 'Collapse')

  // Replace CSS-styled buttons with words

  $('[data-event="add-layout"]').text('Add new section')
  $('[data-event="remove-layout"]').text('Remove')
  $('[data-event="collapse-layout"]').text('Collapse')
})
