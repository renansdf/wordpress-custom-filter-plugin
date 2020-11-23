(function ($) {
  $(document).ready(function () {

    var priceSlider = document.getElementById('price-range');
    if (priceSlider) {
      noUiSlider.create(priceSlider, {
        start: [20, 80],
        connect: true,
        range: {
          'min': 0,
          'max': 100
        }
      });
    }

    var sizeSlider = document.getElementById('size-range');
    if (sizeSlider) {
      noUiSlider.create(sizeSlider, {
        start: [20, 80],
        connect: true,
        range: {
          'min': 0,
          'max': 100
        }
      });
    }

    $('#more-filters').click(() => {
      $('#more-filters-container').toggleClass('active');
    });

  });
})(jQuery);