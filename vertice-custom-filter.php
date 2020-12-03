<?php
/*
Plugin Name: Custom Filter for One Stop Properties
Plugin URI: -
description: >-
Enables shortcode call to filter of posts
Version: 1.0
Author: Renan de Freitas
Author URI: http://blog.defreitas.xyz/
License: GPL2
*/

// ENQUEUE CUSTOM STYLES
add_action( 'wp_enqueue_scripts', 'enqueue_custom_filter_styles', 999);
function enqueue_custom_filter_styles() {
    wp_enqueue_style( 'slider-style', plugin_dir_url( __FILE__ ).'styles/nouislider.base.css' );
    wp_enqueue_style( 'custom-filter-style', plugin_dir_url( __FILE__ ).'/styles/styles.css' );

    wp_enqueue_script('slider-script',  plugin_dir_url( __FILE__ ) . 'scripts/nouislider.js', '', true);
    wp_enqueue_script('wNumb-script',  plugin_dir_url( __FILE__ ) . 'scripts/wNumb.min.js', '', true);
    wp_enqueue_script('custom-filter-script',  plugin_dir_url( __FILE__ ) . 'scripts/scripts.min.js', '', true);
}

add_shortcode( 'vertice-custom-filter', 'vertice_custom_filter_shortcode' );
function vertice_custom_filter_shortcode( $atts ) {
    return include(plugin_dir_path( __FILE__ ) .'filter-block.php');
}

add_filter( 'page_template', 'vertice_custom_filter_page_template' );
function vertice_custom_filter_page_template( $page_template )
{
    if ( is_page( 'filter-properties' ) ) {
        $page_template = dirname( __FILE__ ) . '/filter-properties.php';
    }
    return $page_template;
}

?>