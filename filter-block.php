<?php
$cities = get_terms( array( 'taxonomy' => 'city' ) );
$neighborhoods = get_terms( array( 'taxonomy' => 'neighborhood' ) );
$property_types = get_terms( array( 'taxonomy' => 'property_type' ) );
$lifestyles = get_terms( array( 'taxonomy' => 'lifestyle' ) );
$architectures = get_terms( array( 'taxonomy' => 'architecture' ) );
?>

<section id="custom-filter">
    <form id="custon-filter-form" method="POST" action="/new/filter-properties">

      <div id="regular-filters-container">
        <div class="input-list">
            <label>Cities</label>
            <input type="text" list="cities" name="cities">
            <datalist id="cities">
                <?php foreach ($cities as $city) {
                  echo '<option value="'.$city->slug.'">'.$city->name.'</option>';
                } ?>
            </datalist>
        </div>

        <div class="more-filters">
          <label>More Filters</label>
          <div id="more-filters">More</div>
        </div>

        <div class="input-range">
          <label>Price</label>
          <div id="price-range"></div>
          <input type="hidden" name="price-min" id="price-min" value="1.00" />
          <input type="hidden" name="price-max"id="price-max" value="25.00" />
        </div>

        <div class="input-range">
          <label>Living Space</label>
          <div id="size-range"></div>
          <input type="hidden" name="size-min" id="size-min" value="100.00" />
          <input type="hidden" name="size-max"id="size-max" value="600.00" />
        </div>

        <input type="submit" value="filtrar" class="button-submit" />
      </div>

      <div id="more-filters-container">
        <div class="input-list">
            <label>Neighborhood</label>
            <input type="text" list="neighborhood" name="neighborhood">
            <datalist id="neighborhood">
                <?php foreach ($neighborhoods as $neighborhood) {
                  echo '<option value="'.$neighborhood->slug.'">'.$neighborhood->name.'</option>';
                } ?>
            </datalist>
        </div>

        <div class="input-list">
          <label>Property Type</label>
          <input type="text" list="property_type" name="property_type">
          <datalist id="property_type">
              <?php foreach ($property_types as $property_type) {
                  echo '<option value="'.$property_type->slug.'">'.$property_type->name.'</option>';
              } ?>
          </datalist>
        </div>

        <div class="input-list">
          <label>Lifestyle</label>
          <input type="text" list="lifestyle" name="lifestyle">
          <datalist id="lifestyle">
              <?php foreach ($lifestyles as $lifestyle) {
                  echo '<option value="'.$lifestyle->slug.'">'.$lifestyle->name.'</option>';
              } ?>
          </datalist>
        </div>

        <div class="input-list">
          <label>Architecture</label>
          <input type="text" list="architecture" name="architecture">
          <datalist id="architecture">
              <?php foreach ($architectures as $architecture) {
                  echo '<option value="'.$architecture->slug.'">'.$architecture->name.'</option>';
              } ?>
          </datalist>
        </div>
      </div>

    </form>
</section>