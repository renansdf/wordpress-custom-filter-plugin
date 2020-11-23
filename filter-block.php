<section id="custom-filter">
    <form id="custon-filter-form" method="POST" action="/new/filter-properties">

      <div id="regular-filters-container">
        <div class="input-list">
            <label>Cities</label>
            <input type="text" list="cities" name="cities">
            <datalist id="cities">
                <option value="Lisboa">
                <option value="Porto">
                <option value="Coimbra">
                <option value="Braga">
                <option value="Evora">
            </datalist>
        </div>

        <div class="more-filters">
          <label>More Filters</label>
          <div id="more-filters">More</div>
        </div>

        <div class="input-range">
          <label>Price</label>
          <div id="price-range"></div>
        </div>

        <div class="input-range">
          <label>Living Space</label>
          <div id="size-range"></div>
        </div>

        <input type="submit" value="filtrar" class="button-submit" />
      </div>

      <div id="more-filters-container">
        <div class="input-list">
            <label>Neighborhood</label>
            <input type="text" list="neighborhood" name="neighborhood">
            <datalist id="neighborhood">
                <option value="Lisboa">
                <option value="Porto">
                <option value="Coimbra">
                <option value="Braga">
                <option value="Evora">
            </datalist>
        </div>

        <div class="input-list">
          <label>Property Type</label>
          <input type="text" list="property_type" name="property_type">
          <datalist id="property_type">
              <option value="typee1">
              <option value="type2">
          </datalist>
        </div>

        <div class="input-list">
          <label>Lifestyle</label>
          <input type="text" list="lifestyle" name="lifestyle">
          <datalist id="lifestyle">
              <option value="lifestyle1">
              <option value="life2">
          </datalist>
        </div>

        <div class="input-list">
          <label>Architecture</label>
          <input type="text" list="architecture" name="architecture">
          <datalist id="architecture">
              <option value="arch1">
              <option value="arch2">
          </datalist>
        </div>
      </div>

    </form>
</section>