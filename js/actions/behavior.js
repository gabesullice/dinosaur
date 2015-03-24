!function($, Drupal, dinosaur, document, window, undefined) {

  Drupal.behaviors.actionName = function () {
    attach: function (context, settings) {
      $(someSelector, context).once(function () {
        // do work ...
      });
    }
  };

}(jQuery, Drupal, dinosaur, document, window);
