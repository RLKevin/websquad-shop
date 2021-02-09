<?php

    $id = $post->ID;
    $intro_title = get_field('intro_title');
    $intro_text = get_field('intro_text');
    $intro_image = get_field('intro_image');

?>

<section class="intro <?php if ($intro_image) echo 'full-width'; ?>">
    <div class="wrapper">
        <?php if ($intro_image) { ?>
            <div class="image" style="background-image: url('<?= $intro_image['url']; ?>')"></div>
        <?php } ?>
        <div class="intro">
            <h1><?= $intro_title; ?></h1>
            <p><?= $intro_text; ?></p>
        </div>
    </div>
</section>