<?php

/**
 * En este archivo se incluyen los filtros generales
 *
 */


/** ==============================================================================================================
 *                                                  HOOKS
 *  ==============================================================================================================
 */

add_filter('show_admin_bar', function(){
	return false;
}); // elimina la barra de herramientas del sitio en el front

// activa la tradudccion del sitio por archivos .mo
add_action( 'after_setup_theme', function (){
	load_theme_textdomain( TRANSDOMAIN, get_template_directory() . '/languages' );
	apply_filters( 'theme_locale', get_locale(), TRANSDOMAIN );
});


// Se agrega flitro que elimina en link q abre la imágen principal en single product
add_filter('woocommerce_single_product_image_thumbnail_html','cltvo_remove_link_on_thumbnails' );
 // Función
function cltvo_remove_link_on_thumbnails( $html ) {
     return strip_tags( $html,'<img>' );
}


/** ==============================================================================================================
 *                                                FILTROS
 *  ==============================================================================================================
 */


// elimina la categoria base

include 'helpers/Classes/WP_Remove_Category_Base.php';


?>
