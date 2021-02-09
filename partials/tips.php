<?php

    $left = get_field('left_block');
    $tips_left_title = $left['tips_left_title'];
    $tips_left_subtitle = $left['tips_left_subtitle'];
    $tips_left_button = $left['tips_left_button'];

    $top = get_field('top_block');
    $tips_top_title = $top['tips_top_title'];
    $tips_top_subtitle = $top['tips_top_subtitle'];
    $tips_top_image = $top['tips_top_image'];

    $bottom = get_field('bottom_block');
    $tips_bottom_image = $bottom['tips_bottom_image'];
    $tips_bottom_title = $bottom['tips_bottom_title'];
    $tips_bottom_button = $bottom['tips_bottom_button'];

?>

<section class="tips full-width">
    <div class="wrapper">
        <div class="row">
            <div class="column left">
                <h2>
                    <?= $tips_left_title; ?>
                </h2>
                <h3>
                    <?= $tips_left_subtitle; ?>
                </h3>
                <ul>
                    <?php while( have_rows('left_block') ): the_row(); 
                        while( have_rows('tips_left_tips') ): the_row(); 
                        $tips_left_tip = get_sub_field('tips_left_tip');
                        ?>
                        <li><?= $tips_left_tip; ?></li>
                    <?php endwhile; endwhile; ?>
                </ul>
                <a href="<?= $tips_left_button['url']; ?>" class="button"><?= $tips_left_button['title']; ?></a>
            </div>
            <div class="column right">
                <div class="dromen" style="background-image: url('<?= $tips_top_image['sizes']['medium']; ?>'); ">
                    <h2>
                        <?= $tips_top_title; ?>
                    </h2>
                    <h3>
                        <?= $tips_top_subtitle; ?>
                    </h3>
                    <?php while( have_rows('top_block') ): the_row(); 
                        while( have_rows('tips_top_buttons') ): the_row(); 
                        $tips_top_button = get_sub_field('tips_top_button');
                        ?>
                        <a href="<?= $tips_top_button['url']; ?>" class="button"><?= $tips_top_button['title']; ?></a>
                    <?php endwhile; endwhile; ?>
                </div>
                <div class="afspraak">
                    <div class="image" style="background-image: url('<?= $tips_bottom_image['sizes']['medium']; ?>')"></div>
                    <h3><?= $tips_bottom_title; ?></h3>
                    <a href="<?= $tips_bottom_button['url']; ?>" class="button button-blue"><?= $tips_bottom_button['title']; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>