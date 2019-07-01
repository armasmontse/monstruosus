<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Menus functions
 *
 *
 */
if ( ! function_exists( 'cltvo_register_menus' ) ) {

	/**
	 * Register the menus of the theme.
	 */
	function cltvo_register_menus() {
		register_nav_menu('header-menu', 'Header Menu');
		register_nav_menu('footer-menu', 'Footer Menu');
	}
}

/**
 * Woocommerce functions
 *
 *
 */
if ( ! function_exists( 'cltvo_show_product_details' ) ) {

	/**
	 * Output the product details.
	 */
	function cltvo_show_product_details() {
		wc_get_template( 'single-product/product-details.php' );
	}
}