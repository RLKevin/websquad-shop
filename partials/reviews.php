<?php

    $reviews_title = get_field('reviews_title');
    $reviews_button = get_field('reviews_button');

?>

<section class="reviews">
    <div class="wrapper">
        <h2>
            <?= $reviews_title; ?>
        </h2>
        <div class="reviews">
        <?php 

            $args = array(
                'post_type'=> 'Reviews',
                'order'    => 'ASC',
                'amount'   => 3
            );              

            $the_query = new WP_Query( $args );
            if($the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : 
                $the_query->the_post(); 
                $review_name = get_field('review_name');
                $review_image = get_field('review_image');
                $review_rating = get_field('review_rating');
                $review_text = get_field('review_text');
                $review_link = get_field('review_link');
                ?>

                    <?php if ($review_link) { ?>
                        <a href="<?= $review_link; ?>" class="review" >
                    <?php } else { ?>
                        <div class="review" >
                    <?php } ?>
                        <div class="info">
                            <p class="name"><?= $review_name; ?></p>
                            <span class="stars">
                                <?php 

                                    for ($i=0; $i < $review_rating; $i++) { 
                                        echo "<span class='star'></span>";
                                    }

                                ?>
                            </span>
                            <p class="text dotdotdot">
                                <?= $review_text; ?>
                            </p>
                        </div>
                    <?php if ($review_link) { ?>
                        </a>
                    <?php } else { ?>
                    </div>
                    <?php } ?>
                <?php endwhile; 
                wp_reset_postdata(); 
            else: 
            endif;

            ?>
        </div>
        <?php if ($reviews_button['url'] && $reviews_button['url'] != '#') { ?>
            <div class="buttons">
                <a href="<?= $reviews_button['url']; ?>" class="button"><?= $reviews_button['title']; ?></a>
            </div>
        <?php } ?>
    </div>
</section>