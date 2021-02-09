<?php

    $title = get_field('facebook_title');
    $facebook = get_field('options_social_facebook', 'options');
    $read = get_field('facebook_read');
    $read_more = get_field('facebook_read_more');
    
?>

<section class="news">

    <div class="wrapper">

        <?php if ($title) : ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <div class="news">

        <?php 
            $amount = 3;

            $id = get_the_ID();

            $options = array(
                'post_type'      => 'Facebook',
                'posts_per_page' => $amount,
                'order'          => 'DESC',
                'orderby'        => 'date',
                'post__not_in'   => array($id)

            );
            $news = get_posts($options);

            foreach($news as $post) {

                $image = get_field('facebook_image');
                $date = get_the_date();
                $title = get_the_title();
                $intro = get_field('facebook_text');
                $link = get_field('facebook_link');
                ?>

                <a target="_blank" href="<?php echo $link; ?>" class="news-item">
                    <div class="image" style="background-image: url('<?php echo $image; ?>')"></div>
                    <div class="content">
                        <p class="date"><?= $date; ?></p>
                        <p class="facebook dotdotdot"><?= $intro; ?></p>
                        <span class="button button--green-white"><?= $read; ?></span>
                    </div>
                    
                </a>

            <?php

            }

            wp_reset_postdata();

        ?>
        
        </div>

        <div class="buttons">
            <a href="<?= $facebook; ?>" class="button button--green-blue"><?= $read_more; ?></a>
        </div>
    </div>
</section>