!function($, Drupal, dinosaur, document, window, undefined) {

  $(document).ready(function () {
    $('.views-row .node-teaser').samify({
      'resize': true,
      'vshrink': true,
      'cols': function (width) {
        switch (true) {
          case ((width > dinosaur.bpsmall) && (width < dinosaur.bpsmall_medium)) || (width > dinosaur.bpmedium):
            return 3;
          case ((width > dinosaur.bpmini) && (width < dinosaur.bpsmall)) || ((width > dinosaur.bpsmall_medium) && (width < dinosaur.bpmedium)):
            return 2;
          default:
            return 1;
        }
      }
    });
  });

}(jQuery, Drupal, dinosaur, document, window);
