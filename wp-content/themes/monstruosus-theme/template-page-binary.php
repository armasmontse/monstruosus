<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Template Name: Page 2 columns */

$cltvo_page = new Cltvo_Page;

get_header();

?>

	<div class="page-template">
		<div class="container">
			<div class="container__background-text">
				<div class="container__background">
					<div class="background__img" <?php if (!is_null($cltvo_page->getThumbnailImg())): ?> style="background-image: url( <?= $cltvo_page->getThumbnailImg()->getImgSrc('large') ?> )" <?php endif ?>>
						<div class="box__text">
							<h3 class="box__text-title title-template-img"><?= $cltvo_page->post->post_title ?>.</h3>
						</div>
					</div>
				</div>
			</div>

			<div class="content">

				<div class="content__30">
					<div class="content__30-image">
						<img src="<?= THEMEURL ?>images/logo-template.png" alt="Monstruosos">
					</div>
				</div>

				<div class="content__70">
					<div class="content__70-text">
						<?= apply_filters( 'the_content', $cltvo_page->post->post_content ) ?>
					</div>
				</div>

			</div>

		</div>
	</div>

<?php get_footer(); ?>
