<?php

	$id = get_the_ID();
	$name = get_the_title($id);
	
	$pageType = null;
	$template = basename(get_page_template());

	$post_types = array(
		'news', 'vacancies', 'reviews'
	);

	$class = '';
	
	if ($name == 'Homepagina') {
		$pageType = 'custom';
		$class = 'home';
	} else if (is_singular( $post_types )) {
		$pageType = 'custom';
	} else if ($template == 'page.php') {
		$pageType = 'store';
	} else if ($template == 'template-fullwidth.php') {
		$pageType = 'store';
	} else {
		$pageType = 'custom';
	}
	
	$phone = get_field('options_phone_number', 'option');
	$phoneStripped = str_replace([' ', '-'], '', $phone);
	$whatsapp = get_field('options_whatsapp', 'option');
	$whatsappStripped = str_replace([' ', '-'], '', $whatsapp);
	$whatsappStripped = str_replace(['+'], '00', $whatsappStripped);
	$email = get_field('options_email_address', 'option');
	$search = get_field('options_search', 'option');
	$support = get_field('options_support', 'option');

	// social
	$facebook = get_field('options_social_facebook', 'options');
	$twitter = get_field('options_social_twitter', 'options');
	$instagram = get_field('options_social_instagram', 'options');
	$linkedin = get_field('options_social_linkedin', 'options');
	$youtube = get_field('options_social_youtube', 'options');
	?>

<section id="header" class="header full-width <?php echo $pageType; ?> <?php echo $class; ?>" button-style="<?= get_field('button_style', 'option'); ?>">


	<div class="wrapper">

		<!-- <div class="contact">
			<?php if ($phoneStripped) { ?>
			<a href="tel:<?= $phoneStripped; ?>" class="phone" target="_blank"><?= $phone; ?></a>
			<?php } ?>
			<?php if ($email) { ?>
			<a href="mailto:<?= $email; ?>" class="mail" target="_blank"><?= $email; ?></a>
			<?php } ?>
			<?php if ($whatsapp) { ?>
			<a href="https://wa.me/<?= $whatsappStripped; ?>" class="mail" target="_blank"><?= $whatsapp; ?></a>
			<?php } ?>
		</div> -->

		<div class="logo">
			<?php 
				$image = get_field('options_logo', 'option');
			?>
			<a class="logo__image" href="<?php echo home_url(); ?>">
				<?php if ($image) { ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
				<?php } else { ?>
					<span class="textual-logo"><?= get_field('options_company', 'option'); ?></span>
				<?php } ?>
				<!-- <span>Webshop</span> -->
			</a>
		</div>

		<!-- <div class="search">
			<?php get_product_search_form(); ?>
		</div> -->

		<div class="desktop-menu">
			<?php
				wp_nav_menu(array(
					'menu' => 'aside',
					'container' => '',
					'container_class' => '',
					'menu_id' => 'main-menu__container',
					'menu_class' => 'main-menu__container',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
				));
			?>

			<?php
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator', 'author');
			if( array_intersect($allowed_roles, $user->roles ) ) {  ?>
			<!-- <ul>
				<li>
					<a href="<?= site_url(); ?>/admin">Admin</a>
				</li>
			</ul> -->
			<?php } ?>
		</div>

		<div class="cart">
			<?php global $woocommerce; ?>
			<a href="<?php echo wc_get_cart_url(); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
				<span class="count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'),
				$woocommerce->cart->cart_contents_count);?></span>
			</a>
		</div>

	</div>

</section>


<section class="menu">
	
	<div class="wrapper">
		<?php
			wp_nav_menu(array(
				'menu' => 'aside',
				'container' => '',
				'container_class' => '',
				'menu_id' => 'main-menu__container',
				'menu_class' => 'main-menu__container',
				'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			));
		?>

		<?php
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator', 'author');
			if( array_intersect($allowed_roles, $user->roles ) ) {  ?>
			<ul>
				<li>
					<a href="<?= site_url(); ?>/admin">Admin</a>
				</li>
			</ul>
			<?php } ?>
	</div>
</section>

<div class="shadow"></div>

<div class="hamburger">
	<span></span>
	<span></span>
	<span></span>
</div>