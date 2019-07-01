<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['a.header__icon-cart'] = '<a class="header__link header__icon-cart" href="' . BLOGURL . '/cart">(' . wc()->cart->get_cart_contents_count() . ')</a>';
    
    return $fragments;
    
}


add_filter( 'woocommerce_single_product_image_thumbnail_html', 'cltvo_remove_class', 10, 1 );


function cltvo_remove_class($html) {
	$html = str_replace('woocommerce-product-gallery__image', '', $html);
	return $html;
}

add_filter( 'woocommerce_get_availability_text', 'customizing_availability_text', 10, 2);

function customizing_availability_text( $availability, $product ) {

    if ( $product->managing_stock() && $product->is_on_backorder( 1 )  ) {
		$availability = $product->backorders_require_notification() ? __( 'Available to ship in 1 week', 'woocommerce' ) : '';
	}

	$availability = str_replace('(can be backordered)', '', $availability);

    return $availability;
}