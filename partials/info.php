<?php

$info_title = get_field('info_title');

?>

<section class="info full-width">
    <div class="wrapper">
        <h2><?= $info_title; ?></h2>
        <div class="info__slider">
        <?php

        // Check rows exists.
        if( have_rows('info_repeater') ):

            $color = '';

            // Loop through rows.
            while( have_rows('info_repeater') ) : the_row();

                // Load sub field value.
                $info_content = get_sub_field('info_wysiwyg');
                $info_image = get_sub_field('info_image');
            ?>
                <div class="slide">
                    <div class="wysiwyg <?= $color; ?>">
                        <?= $info_content; ?>
                    </div>
                    <div class="image" style="background-image: url('<?= $info_image['url']; ?>')"></div>
                </div>
                <?php
                if ($color == 'alt') {
                    $color = '';
                } else {
                    $color = 'alt';
                }
                ?>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</section>