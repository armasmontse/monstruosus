<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$cltvo_product = new Cltvo_Product;

$info = [
	'description' => [
		'label' => 'Description',
		'value' => $cltvo_product->post->post_content,
	],
	'process' => [
		'label' => 'Process',
		'value' => $cltvo_product->process,
	],
	'care' => [
		'label' => 'Care & Use',
		'value' => $cltvo_product->care_and_use,
	],
	'material' => [
		'label' => 'Material',
		'value' => $cltvo_product->material,
	],
	'dimensions' => [
		'label' => 'Dimensions',
		'value' => $cltvo_product->dimensions,
	],

]

?>

<div style="width: 100%; display: block; clear: both;">

	<br><br><br>

	<nav class="nav-resumen nav" id="product-navbar">
		<div class="nav-single-product nav__product">
			<ul class="nav__product-list">
				<li class="nav__product-items">
					<a href="#overview">Overview</a>

				</li>
				<?php foreach ($info as $key => $value): ?>
					<?php if (!empty($value['value'])): ?>
						<li class="nav__product-items activate-item">
							<a href="#<?= $key ?>"><?= __($value['label'], TRANSDOMAIN) ?></a>
						</li>
					<?php endif ?>
				<?php endforeach ?>
				<li class="nav__product-items activate-item">
					<a href="#gallery"><?= __('Gallery', TRANSDOMAIN) ?></a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Navbar placeholder -->
	<div id="product-navbar-placeholder" class="product-navbar-placeholder"></div>

	<br><br><br>

	<!-- Product title -->
	<h2 class="woocommerce-loop-product__title box__resumen-titleProduct"><?php echo get_the_title() ?></h2>

	<?php foreach ($info as $key => $value): ?>
		<?php if (!empty($value['value'])): ?>
			<!-- Sections -->
			<div class="box__resumen-container box__resumen-description collapse" id="<?= $key ?>">
				<h4 class="box__resumen-container--ttl title-single-resumen"><?= __($value['label'], TRANSDOMAIN) ?></h4>
				<div class="box__resumen-container--content paragraph-single-resumen openable">
					<?= apply_filters( 'the_content', $value['value'] ) ?>
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>

	<?php if (count($cltvo_product->gallery) > 1): ?>
		<!-- Gallery -->
		<div class="box__resumen-container collapse" id="gallery">
			<h4 class="title-single-resumen box__resumen-container--ttl gallery">Gallery</h4>
			<div class="masonry__container sm openable">
				<div class="masonry" style="clear: both;">
					<div class="masonry-sizer"></div>
					<?php foreach ($cltvo_product->gallery as $key => $image): ?>
						<div class="masonry-item <?= $image->proporcion == 'horizontal' ? 'masonry-item--width2' : '' ?>" data-index="<?= $key ?>">
							<img class="single__img slider__img-selector_JS" alt="" src="<?= $image->getImgSrc('large') ?>">
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>

		<div class="modal">
			<div class="modal__close"><?php themeInc('/images/close.svg');  ?></div>
			<div class="modal__content">
				<!-- Slider masonry -->
				<div class="slider__masonry">
					<?php foreach ($cltvo_product->gallery as $key => $image): ?>
						<div class="slider__masonry-image">
							<div class="slider__masonry-image-container">
								<img alt="" src="<?= $image->getImgSrc('large') ?>">
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>

		<?php // themeInc('/images/after.svg');  ?>
		<?php // themeInc('/images/before.svg');  ?>
		

	<?php endif ?>
</div>
