<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Declare WC support
function cltvo_wc_support() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'cltvo_wc_support' );

include_once CLTVO_ABSPATH . 'functions/theme/ajax.php';
include_once CLTVO_ABSPATH . 'functions/theme/helpers.php';
include_once CLTVO_ABSPATH . 'functions/theme/filters.php';
include_once CLTVO_ABSPATH . 'functions/theme/template-functions.php';
include_once CLTVO_ABSPATH . 'functions/theme/template-hooks.php';


// Filtro q elimina el label de "Flat rate" en checkout.
add_filter( 'woocommerce_cart_shipping_method_full_label', 'cltvo_remove_shipping_label', 10, 2 );
  
function cltvo_remove_shipping_label($label, $method) {
$new_label = preg_replace( '/^.+:/', '', $label );
return $new_label;
}