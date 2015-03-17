!function($) {

  Drupal.behaviors.actionName = function () {
    attach: function (context, settings) {
      $(someSelector, context).once(function () {
        // do work ...
      });
    }
  };

}(jQuery);
