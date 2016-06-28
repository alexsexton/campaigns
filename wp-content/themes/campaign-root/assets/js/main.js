/* globals jQuery */

'use strict'

require('./common')
var enquire = require('./plugins/enquire')
require('./plugins/jquery-accessibleMegaMenu')

jQuery(function ($) {
  $(function () {
    enquire.register('screen and (min-width:500px)', {
      match: function () {
        // Main Nav
        $('.menu-main-container').accessibleMegaMenu({
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
// end of block
})
