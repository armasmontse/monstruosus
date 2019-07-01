<?php 

$home = new Cltvo_Page_Home;

get_header();

?>

<div class="grid__row">
	<div class="grid__container grid__noPad">
		<div class="grid__col-1-1">
			<div class="home__container">
				<img class="home__container-image" src="<?php echo $home->gallery[array_rand($home->gallery)]->getImgSrc('large') ?>" alt="">
			</div>
		</div>
	</div>
</div>

<?php

get_footer();
