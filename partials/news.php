<?php

    $title = get_field('news_title');

?>

<section class="news">

    <div class="wrapper">

        <?php if ($title) : ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <div class="news">

        <?php 

            if ( is_single() || is_front_page() ) {
                $amount = 3;
            } else {
                $amount = -1;
            }

            $id = get_the_ID();

            $options = array(
                'post_type'      => 'News',
                'posts_per_page' => $amount,
                'order'          => 'DESC',
                'orderby'        => 'date',
                'post__not_in'   => array($id)

            );
            $news = get_posts($options);

            foreach($news as $post) {

                $image = get_the_post_thumbnail_url();
                $date = get_the_date();
                $title = get_the_title();
                $intro = get_the_excerpt();
                $link = get_the_permalink();
                ?>

                <a href="<?php echo $link; ?>" class="news-item">
                    <div class="image" style="background-image: url('<?php echo $image; ?>')"></div>
                    <div class="content">
                        <h3><?= $title; ?></h3>
                        <span class="button primary">Lees verder</span>
                    </div>
                    
                </a>

            <?php

            }

            wp_reset_postdata();

        ?>
        
        </div>

        <?php if ( is_single() || is_front_page() ) { ?>
            <div class="buttons">
                <a href="<?= get_site_url(); ?>/blog" class="link">Blog overzicht</a>
            </div>
        <?php } ?>
    </div>
</section>