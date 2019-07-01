<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$company = new Cltvo_Page_Company;

get_header();

?>

	<div class="page-template">
		<div class="container">
			<div class="container__background-text">
				<div class="container__background">
					<div class="background__img" <?php if (!is_null($company->getThumbnailImg())): ?> style="background-image: url( <?= $company->getThumbnailImg()->getImgSrc('large') ?> )" <?php endif ?>>
						<div class="box__text">
							<h3 class="box__text-title title-template-img"><?= $company->post->post_title ?>.</h3>
						</div>
					</div>
				</div>
			</div>

			<div class="content">

				<div class="content__30">
					<div class="content__30-image">
						<img src="<?= THEMEURL ?>images/logo-template.png" alt="Monstruosos">
					</div>
					<div class="content__30-text">
						<h3 class="content__30-title"><?= __('What?', TRANSDOMAIN) ?></h3>
						<?= apply_filters( 'the_content', $company->what ) ?>
					</div>
				</div>

				<div class="content__70">
					<div class="content__70-text">
						<h5><?= __('Why?', TRANSDOMAIN) ?></h5>
						<?= apply_filters( 'the_content', $company->why ) ?>
						<h5 class="content__70-text--title"><?= __('How?', TRANSDOMAIN) ?></h5>
						<?= apply_filters( 'the_content', $company->how ) ?>
					</div>
				</div>

			</div>

		</div>
	</div>

<?php get_footer(); ?>
