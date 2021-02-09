<section class="brands-category">
    <div class="wrapper">
        <h2>Onze collectie</h2>
        <div class="categories">
            <?php

            $parent_id = 171;

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
                    $cat_image = get_field('category_image');
                    $cat_slug = $post->post_name;

                ?>

                    <div class="category" style="background-image: url('<?= $cat_image['url']; ?>')">
                        <a href="#" class="button categoryButton" id="<?= $cat_slug; ?>" onclick="activateCat('<?= $cat_slug; ?>')">Bekijk merken</a>
                        <div class="filter"></div>
                        <h3><?= $cat_title; ?></h3>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
        <?php

            $parent_id = 171;

            $query = new WP_Query(array(

                'post_parent'       => $parent_id,
                'post_type'         => 'page',                          
                'order'             => 'ASC',
                'orderby'           => 'menu_order',
                'posts_per_page'    => -1

            ));

            if ($query->have_posts()) : ?>

                <div class="brands_container">

                <?php while ($query->have_posts()) : $query->the_post(); 

                    $cat_slug = $post->post_name;
                    $brands_id = '173';

                    $brand_query = new WP_Query(array(
                        'post_parent'       => $brands_id,
                        'post_type'         => 'page',                          
                        'order'             => 'ASC',
                        'orderby'           => 'menu_order',
                        'posts_per_page'    => -1,
                    ));
                    if ($brand_query->have_posts()) : ?>

                        <div class="brands" id="<?= $cat_slug; ?>">

                        <?php while ($brand_query->have_posts()) : $brand_query->the_post(); 

                            $brand_name = get_the_title();
                            $brand_id = $post->ID;
                            $brand_logo = get_field('brand_logo');
                            $brand_categories = get_field('brand_categories');
                            if (!in_array($cat_slug, $brand_categories)) {
                                continue;
                            }
                            
                            // get permalink of the brand, or of a subpage when selected
                            $brand_permalink = get_permalink( $brand_id );
                            if ( $cat_slug == 'boxsprings-bedden' && get_field('brand_bb', $brand_id) ) {
                                $brand_permalink = get_the_permalink(get_field('brand_bb', $brand_id)->ID);
                            }
                            if ( $cat_slug == 'matrassen-toppers' && get_field('brand_mt', $brand_id) ) {
                                $brand_permalink = get_the_permalink(get_field('brand_mt', $brand_id)->ID);
                            }
                            if ( $cat_slug == 'beddengoed-meer' && get_field('brand_bm', $brand_id) ) {
                                $brand_permalink = get_the_permalink(get_field('brand_bm', $brand_id)->ID);
                            }
                        ?>

                        <a href="<?= $brand_permalink; ?>" class="">
                            <img src="<?= $brand_logo['url']; ?>" alt="">
                        </a>
                    <?php endwhile; ?>
                        </div>

                    <?php endif;


                ?>
                


                
                            
                <?php endwhile; ?>
                
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<script>

    function activateCat(cat) {
        
        const buttons = document.querySelectorAll('a.categoryButton');
        const button = document.querySelector('a.categoryButton#' + cat);

        buttons.forEach(element => {
            element.classList.remove("active");
        });
        button.classList.add("active");

        const brands = document.querySelectorAll('div.brands');
        const brand = document.querySelector('div.brands#' + cat);

        brands.forEach(element => {
            element.classList.remove("active");
        });
        brand.classList.add("active");
    }

</script>