/**
 * @file
 * A JavaScript file for the theme.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, e3, Drupal, window, document, undefined) {

  $(document).ready(function () {
    $('body').once('e3_actions', function () {
      $.each(e3.actions, function(name, action) {
        action()
      });
    });
  });

})(jQuery, e3, Drupal, this, this. document);
