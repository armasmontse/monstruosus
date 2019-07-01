<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact = new Cltvo_Page_Contact;

?>

</div> <!-- / aqui cierra main-wrap -->

<footer class="">
	<div class="footer__container">
		<div class="footer__logo">
			<img src="<?= THEMEURL ?>/images/logo_footer.svg" alt="">
		</div>
		<div class="footer__items">
			<div class="footer__items-link">&copy; <?= date('Y') ?> Monstruosus</div>
			<?php wp_nav_menu([
				'theme_location' => 'footer-menu',
				'menu_class' => 'footer__menu-items', // ul class
				'container' => 'div', // wrapper
				'container_class' => 'footer__items-link' // wrapper class
			]); ?>
			<?php foreach ($contact->social as $network => $link): ?>
				<?php if (!empty($link)): ?>
					<a href="<?= $link ?>" class="footer__items-link footer__items-icon--<?= $network ?>" target="_blank"></a>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
