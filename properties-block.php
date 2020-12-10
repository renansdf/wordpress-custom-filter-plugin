<?php

  /// GETTING ALL VARIABLES FROM FILTER
  $city = $_POST['cities'];
  $neighborhood = $_POST['neighborhood'];
  $property_type = $_POST['property_type'];
  $lifestyle = $_POST['lifestyle'];
  $architecture = $_POST['architecture'];

  $price_min = $_POST['price-min'];
  $price_max = $_POST['price-max'];

  $size_min = $_POST['size-min'];
  $size_max = $_POST['size-max'];

  if($size_max === "1000.00"){
    $size_max = "10000000";
  }


  /// SETTING UP THE PRICES TO QUERY
  $all_prices = get_terms( array(
    'taxonomy' => 'price',
    'hide_empty' => true,
  ) );

  foreach ($all_prices as $price) {
    $property_price = floatval($price->name);
    if($property_price > 100){
      $property_price = $property_price/1000;
    }

    if($property_price >= $price_min && $property_price <= $price_max){
      $price_range[] = number_format($property_price*1000000, 0, ',','.');
    }
  }


  /// SETTING UP THE SIZES TO QUERY
  $all_sizes = get_terms(array(
    'taxonomy' => 'space',
    'hide_empty' => true,
  ) );

  foreach ($all_sizes as $size) {
    $property_size = intval($size->name);

    if($property_size >= $size_min && $property_size <= $size_max){
      $size_range[] = $property_size;
    }
  }


  /// SETTING UP THE QUERY
  $args = array(
    'post_type' => 'property',
    'posts_per_page' => -1
  );

  /// ADDING QUERY VARIABLES
  $all_variables = array();

  if($city){ $all_variables[] = array('taxonomy' => 'city', 'field' => 'slug', 'terms' => $city); }

  if($neighborhood){ $all_variables[] = array('taxonomy' => 'neighborhood', 'field' => 'slug', 'terms' => $neighborhood); }

  if($property_type){ $all_variables[] = array('taxonomy' => 'property_type', 'field' => 'slug', 'terms' => $property_type); }

  if($lifestyle){ $all_variables[] = array('taxonomy' => 'lifestyle', 'field' => 'slug', 'terms' => $lifestyle); }

  if($architecture){ $all_variables[] = array('taxonomy' => 'architecture', 'field' => 'slug', 'terms' => $architecture); }

  if($price_range){ $all_variables[] = array('taxonomy' => 'price', 'field' => 'name', 'terms' => $price_range); }
  
  if($size_range){ $all_variables[] = array('taxonomy' => 'space', 'field' => 'name', 'terms' => $size_range); }

  $args['tax_query'] = $all_variables;


  // THE QUERY
  $properties_query = new WP_Query( $args );
  

  // THE LOOP
  if ( $properties_query->have_posts() ) :
    echo '<div class="custom-properties-container">';
      while ( $properties_query->have_posts() ) : $properties_query->the_post(); ?>


        <a class="custom-property" href="<?= get_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
          <h3><?= get_the_title(); ?></h3>
          <ul>
            <?php $city = get_the_terms($post->ID, 'city');
            if( $city[0] ){echo '<li>'.$city[0]->name.'</li>';} ?>

            <?php $neighborhood = get_the_terms($post->ID, 'neighborhood');
            if( $neighborhood[0] ){echo '<li>'.$neighborhood[0]->name.'</li>';} ?>

            <?php $price = get_the_terms($post->ID, 'price');
            if( $price[0] ){echo '<li>€'.$price[0]->name.'</li>';} ?>

            <?php $space = get_the_terms($post->ID, 'space');
            if( $space[0] ){echo '<li>'.$space[0]->name.'m²</li>';} ?>

            <?php $lifestyle = get_the_terms($post->ID, 'lifestyle');
            if( $lifestyle[0] ){echo '<li>'.$lifestyle[0]->name.'</li>';} ?>

            <?php $architecture = get_the_terms($post->ID, 'architecture');
            if( $architecture[0] ){echo '<li>'.$architecture[0]->name.'</li>';} ?>

            <?php $property_type = get_the_terms($post->ID, 'property_type');
            if( $property_type[0] ){echo '<li>'.$property_type[0]->name.'</li>';} ?>
          </ul>
        </a>


      <?php
      endwhile;
    echo '</div>';
  endif;


  // RESET POSTDATA
  wp_reset_postdata();
?>