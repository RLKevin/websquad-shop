<?php

    $parent_id = 183;

    $store_map = get_field('store_map');
    $store_name = get_the_title();

?>

<section class="map">
    <div class="wrapper">
        <div class="map__container">
        <?php if($store_map) { ?>
            <div class="marker" data-lat="<?php echo $store_map['lat']; ?>" data-lng="<?php echo $store_map['lng']; ?>">
                <?= $store_name; ?>
            </div>
            <?php } else { 
                $query = new WP_Query(array(
                    
                    'post_parent'       => $parent_id,
                    'post_type'         => 'page',                          
                    'order'             => 'ASC',
                    'orderby'           => 'menu_order',
                    'posts_per_page'    => -1,
                    
                ));
                
                if ($query->have_posts()) : ?>

                <?php while ($query->have_posts()) : $query->the_post(); 
                
                    $stores_map = get_field('store_map');
                    $store_title = get_the_title();
                    $store_address_street = get_field('store_address_street');
                    $store_address_postcode = get_field('store_address_postcode');
                    $store_address_city = get_field('store_address_city');

                    // debug_to_console($stores_map);
                
                ?>
                    <div class="marker" data-lat="<?php echo $stores_map['lat']; ?>" data-lng="<?php echo $stores_map['lng']; ?>">
                        <h4><?= $store_title; ?></h4>
                        <p class="address">
                            <?= $store_address_street; ?>,<br/>
                            <?= $store_address_postcode.' '.$store_address_city; ?>
                        </p>
                        <a href="#" target="_blank" class="button button-primary">Open in Google Maps</a>
                    </div>
                <?php endwhile; ?> 
            <?php endif; ?>
        <?php } ?>
        </div>
    </div>
</section>