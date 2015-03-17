!function($, pumpJack, Drupal, document, window) {

  Drupal.behaviors.actionName = function () {
    attach: function (context,settings) {
      $(someSelector, context).once(function () {

      });
    }
  }

}(jQuery, pumpJack, Drupal, document, window);
