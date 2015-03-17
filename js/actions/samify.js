!function($, pumpJack, Drupal, document, window) {

  $(document).ready(function () {
    $('.views-row .node-teaser').samify({
      'resize': true,
      'vshrink': true,
      'cols': function (width) {
        switch (true) {
          case ((width > e3.bpsmall) && (width < e3.bpsmall_medium)) || (width > e3.bpmedium):
            return 3;
          case ((width > e3.bpmini) && (width < e3.bpsmall)) || ((width > e3.bpsmall_medium) && (width < e3.bpmedium)):
            return 2;
          default:
            return 1;
        }
      }
    });
  });

}(jQuery, pumpJack, Drupal, document, window);
