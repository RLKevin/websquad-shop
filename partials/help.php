<?php

    $help_title = get_field('help_title');
    $help_type = get_field('help_type');

    $phone = get_field('options_phone_number', 'option');
	$phoneStripped = str_replace([' ', '-'], '', $phone);
	$whatsapp = get_field('options_whatsapp', 'option');
	$whatsappStripped = str_replace([' ', '-'], '', $whatsapp);
	$whatsappStripped = str_replace(['+'], '00', $whatsappStripped);
	$email = get_field('options_email_address', 'option');

?>

<section class="help">
    <div class="wrapper">
        <h2>
            <?= $help_title; ?>
        </h2>
        <div class="icons">
        <?php if ($help_type == 'contact' || !$help_type) : ?>
            <?php if ($phoneStripped) : ?>
                <a href="tel:<?= $phoneStripped; ?>" class="phone"></a>
            <?php endif; ?>
            <?php if ($email) : ?>
                <a href="mailto:<?= $email; ?>" class="mail"></a>
            <?php endif; ?>
            <?php if ($whatsappStripped) : ?>
                <a href="https://wa.me/<?= $whatsappStripped; ?>" class="whatsapp"></a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($help_type == 'webshop') : ?>
            <?php if ($phoneStripped) : ?>
                <a href="<?= get_site_url(); ?>/webshop" class="webshop"></a>
            <?php endif; ?>
        <?php endif; ?>    
        </div>
    </div>
</section>