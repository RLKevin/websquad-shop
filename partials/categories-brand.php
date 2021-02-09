<?php

    $parent_id = 171;

    $brand_categories = get_field('brand_categories');
    $brand_id = $post->ID;
    // var_dump($brand_categories);

?>

<section class="categories-brand">
    <div class="wrapper">

    <h2>Ons assortiment</h2>

    <?php

        $query = new WP_Query(array(

            'post_parent'       => $parent_id,
            'post_type'         => 'page',                          
            'order'             => 'ASC',
            'orderby'           => 'menu_order',
            'posts_per_page'    => -1,
            'post_name__in'     => $brand_categories

        ));

        if ($query->have_posts()) : ?>

            <?php while ($query->have_posts()) : $query->the_post(); 
            
                $cat_slug = $post->post_name;
                $count = 'count'.$query->found_posts;
                $cat_title = get_the_title();
                $cat_image = get_field('category_image');

                // get link
                $cat_permalink = null;
                if ( $cat_slug == 'boxsprings-bedden' && get_field('brand_bb', $brand_id) ) {
                    $cat_permalink = get_the_permalink(get_field('brand_bb', $brand_id)->ID);
                }
                if ( $cat_slug == 'matrassen-toppers' && get_field('brand_mt', $brand_id) ) {
                    $cat_permalink = get_the_permalink(get_field('brand_mt', $brand_id)->ID);
                }
                if ( $cat_slug == 'beddengoed-meer' && get_field('brand_bm', $brand_id) ) {
                    $cat_permalink = get_the_permalink(get_field('brand_bm', $brand_id)->ID);
                }

            ?>

                <?php if ($cat_permalink) { ?>
                    <a href="<?= $cat_permalink; ?>" class="category <?= $count; ?>" style="background-image: url('<?= $cat_image['url']; ?>')">
                        <h3><?= $cat_title; ?></h3>
                    </a>
                <?php } else { ?>
                    <div class="category <?= $count; ?>" style="background-image: url('<?= $cat_image['url']; ?>')">
                        <h3><?= $cat_title; ?></h3>
                    </div>
                <?php } ?>
                
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>

    </div>
</section>