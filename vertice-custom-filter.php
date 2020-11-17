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
add_action( 'wp_enqueue_scripts', 'enqueue_custom_filter_styles');
function enqueue_custom_filter_styles() {
    wp_enqueue_style( 'slider-style', plugin_dir_url( __FILE__ ).'styles/nouislider.base.css' );
    wp_enqueue_style( 'custom-filter-style', plugin_dir_url( __FILE__ ).'/styles/styles.css' );

    wp_enqueue_script('slider-script',  plugin_dir_url( __FILE__ ) . 'scripts/nouislider.js', '', true);
    wp_enqueue_script('custom-filter-script',  plugin_dir_url( __FILE__ ) . 'scripts/scripts.min.js', array('jquery'), true);
}


add_shortcode( 'vertice-custom-filter', 'vertice_custom_filter_shortcode' );
function vertice_custom_filter_shortcode( $atts ) {
    return 
    '<section id="custom-filter">
        <form id="custon-filter-form" method="POST" action="/new/filter-properties">
            <div class="input-city">
                <label>Cidades</label>
                <input type="text" list="cities">
                <datalist id="cities">
                    <option value="Lisboa">
                    <option value="Porto">
                    <option value="Coimbra">
                    <option value="Braga">
                    <option value="Evora">
                </datalist>
            </div>

            <div class="input-range">
                <label>Preço</label>
                <div id="price-range"></div>
            </div>

            <div class="input-range">
                <label>Tamanho</label>
                <div id="size-range"></div>
            </div>

            <input type="submit" value="filtrar" class="button-submit" />
        </form>
    </section>';
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