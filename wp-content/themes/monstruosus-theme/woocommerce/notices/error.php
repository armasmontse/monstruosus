<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>

<div class="woocommerce-error woocommerce-alert">
	<?php foreach ( $messages as $message ) : ?>
		<?php echo wp_kses_post( $message ); ?>
	<?php endforeach; ?>
	<span id="closeAlert_JS" class="closeAlert"></span>
</div>


<script>
//Se agrega Script para cerrar modales, no funciona desde micorriza
	var $ = jQuery
	var btnCerrarAlert = $("#closeAlert_JS");
	var contAlert = $('.woocommerce-alert');
	btnCerrarAlert.on("click", function() {
	    contAlert.hide();

	});

	var $ = jQuery
	var btnCerrarAlert = $(".closeAlert");
	var contAlert = $('.woocommerce-alert');
	btnCerrarAlert.on("click", function() {
	    contAlert.hide();

	});

	var CerrarAlert = $("#closeAlert");
	var contAlertJS = $('.woocommerce-error');
	var open = true;
	CerrarAlert.on("click", function() {
	    if(open) {
	        contAlertJS.addClass('hide');
	    }
	    // contAlertJS.hide();
	});
</script>
