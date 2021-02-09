
<?php

// vars
$map = get_field('options_footer_map', 'option');
$logo = get_field('options_logo_alt', 'option');
$icon = get_field('options_icon', 'option');
$background = get_field('options_footer_background', 'option');
$icon = get_field('options_icon', 'options');

$location = get_field('options_map', 'option');
$street = get_field('options_street', 'options');
$postal_code = get_field('options_postal_code', 'options');
$city = get_field('options_city', 'options');

$phone = get_field('options_phone_number', 'option');
$phoneStripped = str_replace([' ', '-'], '', $phone);
$email = get_field('options_email_address', 'option');

$facebook = get_field('options_social_facebook', 'options');
$twitter = get_field('options_social_twitter', 'options');
$instagram = get_field('options_social_instagram', 'options');
$linkedin = get_field('options_social_linkedin', 'options');
$youtube = get_field('options_social_youtube', 'options');

?>

<footer id="footer">

	<div class="wrapper">

		<div class="column logo">
	
			<a href="<?= site_url(); ?>" class="logo">
				<img src="<?= $logo['url']; ?>" alt="logo">
			</a>

		</div>
		<div class="column contact">

			<img src="<?= $icon['url']; ?>" alt="logo">

			<div class="row">
				<div class="address">
					<p>
						<?= $street; ?>
					</p>
					<p>
						<?= $postal_code; ?> <?= $city; ?>
					</p>
				</div>

				<div class="contact">
					<a href="tel:<?= $phoneStripped; ?>" class="phone"><?= $phone; ?></a>
					<a href="mailto:<?= $email; ?>" class="phone"><?= $email; ?></a>
				</div>
			</div>

		</div>

		

		<div class="column social">
			<p><?= get_field('options_social', 'options'); ?></p>
			<?php if ($facebook) { ?>
				<a href="<?= $facebook; ?>" class="facebook" target="_blank"></a>
			<?php } ?>
			<?php if ($twitter) { ?>
				<a href="<?= $twitter; ?>" class="twitter" target="_blank"></a>
			<?php } ?>
			<?php if ($instagram) { ?>
				<a href="<?= $instagram; ?>" class="instagram" target="_blank"></a>
			<?php } ?>
			<?php if ($linkedin) { ?>
				<a href="<?= $linkedin; ?>" class="linkedin" target="_blank"></a>
			<?php } ?>
			<?php if ($youtube) { ?>
				<a href="<?= $youtube; ?>" class="youtube" target="_blank"></a>
			<?php } ?>

		</div>

</div>

</footer>

<section class="privacy">
	<div class="wrapper">
		<div class="switch">
			Webdesign & development <a href="#">Switch Reclamebureau</a>
		</div>
		<div class="privacy">
			<?php
				$terms = get_field('options_terms', 'options');
				$privacy = get_field('options_privacy', 'options');
			?>
			<?php if ($terms) { ?>
				<a href="<?= $terms['url']; ?>"><?= $terms['title']; ?></a>
			<?php } ?>
			<?php if ($privacy) { ?>
				<a href="<?= $privacy['url']; ?>"><?= $privacy['title']; ?></a>
			<?php } ?>
		</div>
	</div>
</section>