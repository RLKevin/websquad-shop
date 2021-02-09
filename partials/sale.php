<?php

    $sale_left_title = get_field('sale_left_title');
    $sale_left_button = get_field('sale_left_button');
    
    $sale_right_title = get_field('sale_right_title');
    $sale_right_button = get_field('sale_right_button');

?>

<section class="sale full-width">
    <div class="wrapper">
        <div class="title">
            <h2>
                <?= $sale_left_title; ?>
            </h2>
            <a href="<?= $sale_left_button['url']; ?>" class="button button-blue"><?= $sale_left_button['title']; ?></a>
        </div>
        <div class="product">
            <?php if ($sale_right_title) : ?>
                <h2><?= $sale_right_title; ?></h2>
            <?php endif; ?>
            <div class="slider slider--sale">

                <?php

                // Check rows exists.
                if( have_rows('sale_right_repeater') ):

                    while( have_rows('sale_right_repeater') ) : the_row();

                        $sale_right_product_title = get_sub_field('sale_right_product_title');
                        $sale_right_product_image = get_sub_field('sale_right_product_image')['sizes']['medium'];
                        $sale_right_product_link = get_sub_field('sale_right_product_link');
                        ?>

                            <a class="slider__container" href="<?= $sale_right_product_link; ?>">
                                <div class="row">
                                    <div class="slider__content">
                                        <h3>
                                            <?= $sale_right_product_title; ?></strong>
                                        </h3>
                                    </div>
                                    <div class="slider__image" style="background-image: url('<?= $sale_right_product_image; ?>');"></div>
                                </div>
                            </a>
                        <?php
                    endwhile;
                endif; ?>

            </div>
            <a href="<?= $sale_right_button['url']; ?>" class="button"><?= $sale_right_button['title']; ?></a>

        </div>
    </div>
</section>