<?php

    $parent_id = 183;
    $stores_title = false;
    if (get_field('stores_title')) {
        $stores_title = get_field('stores_title');
    }

?>

<section class="stores">
    <div class="wrapper">
    <?php if ($stores_title) : ?>
        <h2><?= $stores_title; ?></h2>
    <?php endif; ?>

        <?php

            $query = new WP_Query(array(

                'post_parent'       => $parent_id,
                'post_type'         => 'page',                          
                'order'             => 'ASC',
                'orderby'           => 'menu_order',
                'posts_per_page'    => -1,
                'post__not_in'      => array(get_the_ID())

            ));

            if ($query->have_posts()) : ?>

                <?php while ($query->have_posts()) : $query->the_post(); 
                
                    $store_title = get_the_title();
                    $store_image = get_field('store_image');
                    $store_address_street = get_field('store_address_street');
                    $store_address_postcode = get_field('store_address_postcode');
                    $store_address_city = get_field('store_address_city');
                    $store_phone = get_field('store_phone');
                    $store_permalink = get_the_permalink();
                    $store_permalink_text = 'meer informatie';

                ?>
                    <div class="store">
                        <div class="image" style="background-image: url('<?= $store_image['url']; ?>')"></div>
                        <div class="winkel">
                            <h4><?= $store_title; ?></h4>
                            <p class="address">
                                <?= $store_address_street; ?>,<br/>
                                <?= $store_address_postcode.' '.$store_address_city; ?>
                            </p>
                            <a href="tel:<?= $store_phone; ?>" class="phone"><?= $store_phone; ?></a>
                            <a href="<?= $store_permalink; ?>" class="button"><?= $store_permalink_text; ?></a>
                            <!-- <p>Zeeburgerpad 80-81, 1019 AD Amsterdam</p>
                            <p>Tel: 020-6929151</p> -->
                        </div>
                    </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>