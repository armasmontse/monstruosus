<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Menus actions
 *
 *
 */

/** Add actions */

add_action( 'init', 'cltvo_register_menus' );

/**
 * Woocommerce actions and filters
 *
 *
 */

/** Add actions */

// Add product details.
add_action( 'woocommerce_after_single_product_summary', 'cltvo_show_product_details', 10);

/** Remove actions */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ); 

// Remove data tabs.
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Remove related products.
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );