<?php

    $type = get_field('cta_type');

    $cta_title = get_field('cta_title');
    $cta_subtitle = get_field('cta_subtitle');
    // $button = get_field('cta_button');

?>

<section class="cta <?= $type; ?>">
    <div class="wrapper">
        <h2><?= $cta_title; ?></h2>
        <h4><?= $cta_subtitle; ?></h4>
        <!-- <a href="<?= $button['url']; ?>" class="button"><?= $button['title']; ?></a> -->
    </div>
</section>