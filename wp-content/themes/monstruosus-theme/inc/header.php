<div>
	<!-- <div class="cltvo-single-product__menu-first"> --><!-- Menu fix en Product show  -->
	<header class="header__JS">
		<div class="header__container">
			<div class="header__brand">
				<a href="<?= get_site_url(); ?>" class="header__logo">
					<img class="header__logo-image" src="<?= THEMEURL ?>images/logo_header.svg" alt="">
					<!-- <img class="header__logo-image--mobil" src="<?= THEMEURL ?>/images/logo_header.svg" alt=""> -->
				</a>
				<button class="header__logo-close open header-close_JS">
					<img src="<?= THEMEURL ?>images/menu.svg" alt="">
				</button>
				<button class="header__logo-close close header-close_JS">
					<img src="<?= THEMEURL ?>images/close.svg" alt="">
				</button>
				<!-- Search en Movil -->
				<div class="header__search-movil">
					<div class="header__iconMovil" id="header__iconMovil__JS">
						<a href="#" class="header__iconMovil-searchMovil"></a>
					</div>
				</div>
			</div>
			<div class="header__menu" style="flex: 1;">
				<?php wp_nav_menu([
					'theme_location' => 'header-menu',
					'menu_class' => 'header__list header__menu-items', // ul class
					'container' => 'div', // wrapper
					'container_class' => 'header__menu-list' // wrapper class
				]); ?>
				<div class="menu-header-container header__menu-icons">
					<ul class="header__list header__menu-icons--list">
						<!-- Search en desktop -->
						<li class="header__icon header__icon-movil" id="header__icon__JS"><a href="#" class="header__link header__icon-search"></a></li>
						<li class="header__icon">
							<a class="header__link header__icon-cart" href="<?php echo BLOGURL ?>/cart">(<?= wc()->cart->get_cart_contents_count() ?>)</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- Barra de search en menu -->
	<div id="header__searchbar__JS" class="header__searchbar">
		<form role="search" method="get" class="header__searchbar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<i class="header__icon--search"></i>
			<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="header__searchbar-input" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
			<button type="submit" id="header__searchbar-submit" class="header__searchbar-submit header__icon-submit"></button>
			<input type="hidden" name="post_type" value="product" />
		</form>
	</div>
</div>
