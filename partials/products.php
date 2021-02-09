<?php

    $products_title = get_field('products_title');
    $products_text = get_field('products_text');
    $products_image = get_field('products_image');
    $products_button = get_field('products_button');

?>

<section class="products products__intro" id="products">
    <div class="wrapper">
        <div class="meat" style="background-image: url('<?= $products_image['url']; ?>'); "></div>
        <h2>
            <?= $products_title; ?>
        </h2>
        <p>
            <?= $products_text; ?>
        </p>
    </div>
</section>

<section class="products">
    <div class="wrapper">
        
        <div class="product__slider">

            <?php

                $args = array(
                    'post_status'       => 'published',
                    'post_type'         => 'product',
                    'posts_per_page'    => 8,
                    'orderby'           => 'rand'
                );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post(); 

                        // var_dump($post); // debug
                        // $res = get_post_meta($post->id);
                        
                        $product_id = $post->ID;
                        $product = wc_get_product( $product_id );
                        $product_permalink = get_permalink($product_id);
                        $product_image = get_the_post_thumbnail_url($product_id);
                        $product_sale_price = $product->get_price();
                        
                        $showroom_locations = wc_get_product_terms( $product_id, 'pa_showroom', array( 'fields' => 'names' ) );
                        $showroom_location = null;
                        if ($showroom_locations) {
                            $showroom_location = $showroom_locations[0];
                        }
                    ?>

                        <a class="slide" href="<?= $product_permalink; ?>">
                            <h3>
                                <?= $post->post_title; ?>
                            </h3>
                            <div class="price">
                                <span class="price">€<?= $product_sale_price; ?></span>
                                <span class="price-bg"></span>
                            </div>
                            <div class="product_image" style="background-image: url('<?= $product_image; ?>');"></div>
                            <div href="<?= $product_permalink; ?>" class="link">Bestellen</div>
                        </a>
                    <?php endwhile;
                } else {
                    echo __( 'No products found' );
                }
                wp_reset_postdata();
            ?>
        </div>
        <div class="buttons">
            <a href="<?= $products_button['url']; ?>" class="button grey"><?= $products_button['title']; ?></a>
        </div>
    </div>
</section>