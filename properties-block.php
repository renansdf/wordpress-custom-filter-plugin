<?php
  $city = $_POST['cities'];
  $neighborhood = $_POST['neighborhood'];
  $property_type = $_POST['property_type'];
  $lifestyle = $_POST['lifestyle'];
  $architecture = $_POST['architecture'];

  $price_min = $_POST['price-min'];
  $price_max = $_POST['price-max'];

  $size_min = $_POST['size-min'];
  $size_max = $_POST['size-max'];

  $args = array(
    'post_type' => 'property',
    'posts_per_page' => -1
  );

  if($city){ $args['tax_query'] = array(array('taxonomy' => 'city', 'field' => 'slug', 'terms' => $city)); }

  if($neighborhood){ $args['tax_query'] = array(array('taxonomy' => 'neighborhood', 'field' => 'slug', 'terms' => $neighborhood)); }

  if($property_type){ $args['tax_query'] = array(array('taxonomy' => 'property_type', 'field' => 'slug', 'terms' => $property_type)); }

  if($lifestyle){ $args['tax_query'] = array(array('taxonomy' => 'lifestyle', 'field' => 'slug', 'terms' => $lifestyle)); }

  if($architecture){ $args['tax_query'] = array(array('taxonomy' => 'architecture', 'field' => 'slug', 'terms' => $architecture)); }

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