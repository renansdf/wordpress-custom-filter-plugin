(function ($) {
  $(document).ready(function () {

    var priceSlider = document.getElementById('price-range');

    noUiSlider.create(priceSlider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });


    var sizeSlider = document.getElementById('size-range');

    noUiSlider.create(sizeSlider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });

  });
})(jQuery);