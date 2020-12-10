(function ($) {
  $(document).ready(function () {

    /// PRICE SLIDER SETUP
    var priceSlider = document.getElementById('price-range');
    if (priceSlider) {
      noUiSlider.create(priceSlider, {
        start: [0.5, 7],
        tooltips: [wNumb({
          decimals: 1,
          prefix: '€',
          suffix: ' mil'
        }), wNumb({
          decimals: 1,
          prefix: '€',
          suffix: ' mil'
        })],
        connect: true,
        step: 0.5,
        range: {
          'min': 0.5,
          'max': 7
        }
      });
    }

    /// SIZE SLIDER SETUP
    var sizeSlider = document.getElementById('size-range');
    if (sizeSlider) {
      noUiSlider.create(sizeSlider, {
        start: [100, 1000],
        connect: true,
        tooltips: [wNumb({
          suffix: 'm²',
          thousand: '.'
        }), wNumb({
          suffix: 'm²',
          thousand: '.'
        })],
        step: 100,
        range: {
          'min': 100,
          'max': 1000
        }
      });
    }

    /// PRICE SLIDER ON DRAG RELEASE AND ON CLICK
    if (priceSlider) {
      priceSlider.noUiSlider.on('end', function (values) {
        $('#price-min').val(values[0]);
        $('#price-max').val(values[1]);
      });

      $('#price-range').click(function () {
        $('#price-min').val(priceSlider.noUiSlider.get()[0]);
        $('#price-max').val(priceSlider.noUiSlider.get()[1]);
      });
    }

    /// SIZE SLIDER ON DRAG RELEASE AND ON CLICK
    if (sizeSlider) {
      sizeSlider.noUiSlider.on('end', function (values) {
        $('#size-min').val(values[0]);
        $('#size-max').val(values[1]);
      });

      $('#size-range').click(function () {
        $('#size-min').val(sizeSlider.noUiSlider.get()[0]);
        $('#size-max').val(sizeSlider.noUiSlider.get()[1]);
      });
    }

    /// TOGGLE MORE FILTERS
    $('#more-filters').click(() => {
      $('#more-filters-container').toggleClass('active');
    });


  });
})(jQuery);