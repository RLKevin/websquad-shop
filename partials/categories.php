<?php

    $parent_id = 171;

?>

<section class="categories full-width">
    <div class="wrapper">

    <?php

        $query = new WP_Query(array(

            'post_parent'       => $parent_id,
            'post_type'         => 'page',                          
            'order'             => 'ASC',
            'orderby'           => 'menu_order',
            'posts_per_page'    => -1

        ));

        if ($query->have_posts()) : ?>

            <?php while ($query->have_posts()) : $query->the_post(); 
            
                $cat_title = get_the_title();
                $cat_intro = get_field('category_intro');
                $cat_image = get_field('category_image');
                $cat_permalink = get_the_permalink();
                $cat_permalink_text = get_field('category_button');

            ?>

                <div class="category">
                    <div class="content">
                        <h3><?= $cat_title; ?></h3>
                        <p><?= $cat_intro; ?></p>
                        <a href="<?= $cat_permalink; ?>" class="button button--dark"><?= $cat_permalink_text; ?></a>
                    </div>
                    <div class="image" style="background-image: url('<?= $cat_image['sizes']['medium']; ?>')"></div>
                </div>
                
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>

    </div>
</section>