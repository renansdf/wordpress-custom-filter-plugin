(function ($) {
  $(document).ready(function () {

    var priceSlider = document.getElementById('price-range');
    if (priceSlider) {
      noUiSlider.create(priceSlider, {
        start: [1, 25],
        tooltips: [wNumb({
          thousand: '.',
          prefix: '€',
          suffix: ' mil'
        }), wNumb({
          thousand: '.',
          prefix: '€',
          suffix: ' mil'
        })],
        connect: true,
        step: 1,
        range: {
          'min': 1,
          'max': 25
        }
      });
    }

    var sizeSlider = document.getElementById('size-range');
    if (sizeSlider) {
      noUiSlider.create(sizeSlider, {
        start: [100, 600],
        connect: true,
        tooltips: [wNumb({
          suffix: ' sqft'
        }), wNumb({
          suffix: ' sqft'
        })],
        step: 100,
        range: {
          'min': 100,
          'max': 600
        }
      });
    }

    $('#more-filters').click(() => {
      $('#more-filters-container').toggleClass('active');
    });

    priceSlider.noUiSlider.on('end', function (values) {
      $('#price-min').val(values[0]);
      $('#price-max').val(values[1]);
    });

    sizeSlider.noUiSlider.on('end', function (values) {
      $('#size-min').val(values[0]);
      $('#size-max').val(values[1]);
    });



    $('#price-range').click(function () {
      $('#price-min').val(priceSlider.noUiSlider.get()[0]);
      $('#price-max').val(priceSlider.noUiSlider.get()[1]);
    });

    $('#size-range').click(function () {
      $('#size-min').val(sizeSlider.noUiSlider.get()[0]);
      $('#size-max').val(sizeSlider.noUiSlider.get()[1]);
    });

  });
})(jQuery);