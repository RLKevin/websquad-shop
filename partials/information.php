<?php

    $brand_title = get_the_title();

    $brand_left_title = get_field('brand_left_title');

    $brand_top_image = get_field('brand_top_image');
    $brand_top_title = get_field('brand_top_title');
    $brand_top_button = get_field('brand_top_button');

    $brand_bottom_image = get_field('brand_bottom_image');
    $brand_bottom_title = get_field('brand_bottom_title');
    $brand_bottom_button = get_field('brand_bottom_button');

?>

<section class="information">

    <div class="children">
    
        <h2><?= $brand_left_title; ?></h2>

        <?php

        $exclude = [];
        if ($brand_permalink = get_field('brand_bb')) {
            array_push($exclude, $brand_permalink = get_field('brand_bb')->ID);
        }
        if ($brand_permalink = get_field('brand_mt')) {
            array_push($exclude, $brand_permalink = get_field('brand_mt')->ID);
        }
        if ($brand_permalink = get_field('brand_bm')) {
            array_push($exclude, $brand_permalink = get_field('brand_bm')->ID);
        }

        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $post->ID,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post__not_in'   => $exclude
        );


        $parent = new WP_Query( $args );

        if ( $parent->have_posts() ) : ?>

            <?php while ( $parent->have_posts() ) : $parent->the_post(); 
            
                $child_title = get_the_title();
                $child_id = $post->ID;
                $child_image = get_field('image_image', $child_id);
                // $child_image = get_the_post_thumbnail_url($post->ID,'medium');
                $child_permalink = get_the_permalink();
                ?>

                <a href="<?= $child_permalink; ?>" class="child">
                    <img src="<?= $child_image['sizes']['640']; ?>" alt="">
                    <span class="button"><?= $child_title; ?></span>
                </a>

            <?php endwhile; ?>

        <?php endif; wp_reset_postdata(); ?>
    
    </div>

    <div class="more">
        <div class="top" style="background-image: url('<?= $brand_top_image['sizes']['640'] ; ?>')">
            <?php if ($brand_top_title) : ?>
                <h3><?= $brand_top_title; ?></h3>
            <?php endif; ?>
            <?php if ($brand_top_button) : ?>
                <a class="button" href="<?= $brand_top_button['url']; ?>"><?= $brand_top_button['title']; ?></a>
            <?php endif; ?>
        </div>
        <div class="bottom">
            <?php if ($brand_bottom_image) : ?>
                <img src="<?= $brand_bottom_image['sizes']['640-1-1']; ?>" alt="">
            <?php endif; ?>
            <?php if ($brand_bottom_title) : ?>
                <h3><?= $brand_bottom_title; ?></h3>
            <?php endif; ?>
            <a class="button" href="<?= $brand_bottom_button['url']; ?>"><?= $brand_bottom_button['title']; ?></a>
        </div>
    </div>

</section>