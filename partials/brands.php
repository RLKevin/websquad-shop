<?php

    $brands_title = get_field('brands_title');
    $brands_button = get_field('brands_button');
    $cat_slug = $post->post_name;
    $page_parent_id = $post->post_parent;

?>

<section class="brands">
    <div class="wrapper">
        <h2><?= $brands_title; ?></h2>
        <div class="slider--brands">
        <?php

        $parent_id = '173';
        $category_page_id = '171';

        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $parent_id,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
        );


        $parent = new WP_Query( $args );

        if ( $parent->have_posts() ) : ?>

            <?php while ( $parent->have_posts() ) : $parent->the_post(); 
            
                $child_title = get_the_title();
                $brand_image = get_field('brand_logo');
                $child_permalink = get_the_permalink();
                $brand_categories = get_field('brand_categories');
                
                if ($page_parent_id == $category_page_id && !in_array($cat_slug, $brand_categories)) {
                    continue;
                }
                ?>

                <a href="<?= $child_permalink; ?>" class="brand">
                    <img src="<?= $brand_image['url']; ?>" alt="">
                </a>

            <?php endwhile; ?>

        <?php endif; wp_reset_postdata(); ?>
        </div>
        <?php if ($brands_button) : ?>
            <div class="buttons">
                <a href="<?= $brands_button['url']; ?>" class="button"><?= $brands_button['title']; ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>