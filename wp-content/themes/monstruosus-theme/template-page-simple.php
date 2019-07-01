<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Template Name: Simple Page */

$cltvo_page = new Cltvo_Page;

get_header();

?>

<div class="grid__row">
	<div class="grid__container">
		<div class="layout__content">
			<?= apply_filters( 'the_content', $cltvo_page->post->post_content ) ?>
		</div>
	</div>
</div>

<?php

get_footer();