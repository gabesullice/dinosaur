!function($, pumpJack, Drupal, document, window) {

  e3.actions.bxSlider = function () {

    var sliders = {
      'selector': {'options'},

      '.views-row': {
        'slideSelector': 'li.views-row',

        'mode': 'fade',
        'speed': 750,
        'pause': 8500,

        'randomStart': true,
        'controls': false,
        'pager': false,
        'auto': true,
        'infiniteLoop': true,
        'preloadImages': 'all'
      }
    };

    $.each(sliders, function (selector, options) {
      $(selector).bxSlider(options);
    });
  }

}(jQuery, pumpJack, Drupal, document, window);
