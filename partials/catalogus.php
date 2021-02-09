<?php

    $page_title = get_the_title();
    $catalogus_type = get_field('catalogus_type');
    $catalogus_pdf = get_field('catalogus_pdf');
    $catalogus_embed = get_field('catalogus_embed');
    $catalogus_link = get_field('catalogus_link');

?>

<?php if ($catalogus_type !== 'none' && $catalogus_type != null) : ?>

    <section class="catalogus">

        <div class="wrapper">
        
            <div class="row">

                <div class="column">
                    <h2>Bekijk de online catalogus</h2>
                    <?php if ($catalogus_link) : ?>
                        <p>WIlt u de <?= $page_title; ?> catalogus liever thuis ontvangen?</p>
                        <a href="<?= $catalogus_link['url']; ?>" class="button"><?= $catalogus_link['title']; ?></a>
                    <?php endif; ?>
                </div>

                <div class="column embed">
                    <?php if ($catalogus_type === 'pdf') { ?>
                        <?php echo do_shortcode('[pdf-embedder url="'.$catalogus_pdf.'"]'); ?>
                    <?php } else if ($catalogus_type === 'external') { ?>
                        <iframe src="<?= $catalogus_embed; ?>" frameborder="0"></iframe>
                    <?php } ?>
                </div>
                </div>

        </div>

    </section>

<?php endif; ?>