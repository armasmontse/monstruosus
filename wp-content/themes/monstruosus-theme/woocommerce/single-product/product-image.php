<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper flex-control__wrapper">
		<!-- Slider main container -->
		<div class="flex-control-top">
			<?php
			if ( has_post_thumbnail() ) {
				$html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				$html .= '</div>';
			} ?>
			<!-- Se comenta ya que no debe aparecer ésta imagen en el slider blooooo -->
			<!-- <div class="swiper-slide">
				<?php // echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); ?>
			</div> -->
			<?php if ($attachment_ids && has_post_thumbnail()): ?>
				<?php foreach ( $attachment_ids as $attachment_id ): ?>
					<div class="slick-slide">
						<?php echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id, true ), $attachment_id ); ?>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		<div class="flex-control-nav-box">
			<!-- Slider main container -->
			<div class="flex-control-nav">
				<?php 
					if (has_post_thumbnail()) {
						$src = wp_get_attachment_image_src($post_thumbnail_id)[0];
					}else {
						$src = wc_placeholder_img_src();
					}
				?>
				<!-- Se comenta ya que no debe aparecer ésta imagen en el slider -->
				<!-- <li class="swiper-slide">
					<img src="<?php //echo $src ?>" alt="">
				</li> -->
				<?php if ($attachment_ids && has_post_thumbnail()): ?>
					<?php foreach ( $attachment_ids as $attachment_id ): ?>
						<div class="slick-slide">
							<img class="img__slider--vertical" src="<?php echo wp_get_attachment_image_src($attachment_id)[0] ?>" alt="">
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</figure>
</div>
