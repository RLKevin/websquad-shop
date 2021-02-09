<?php

    $content = get_field('content');

    // Check value exists.
    if( have_rows('content') ):

?>
    <section class="content">
        <div class="wrapper">

            <?php
                while ( have_rows('content') ) : the_row();
            ?>

                <!-- Case: Text -->
                <?php if( get_row_layout() == 'text' ):
                    $text = get_sub_field('content_wysiwyg'); ?>
                    <div class="content-block text">
                        <div class="wysiwyg">
                            <?= $text; ?>
                        </div>
                    </div>

                <!-- Case: Form -->
                <?php elseif( get_row_layout() == 'form' ):
                    $title = get_sub_field('content_form_title'); 
                    $form_id = get_sub_field('content_form_form'); ?>
                    <div class="content-block form">
                        <div class="form">
                            <h2><?= $title; ?></h2>
                            <?php gravity_form( $form_id, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true, $tabindex = 1, $echo = true ); ?>
                        </div>
                    </div>

                <!-- Case: Text + Image -->
                <?php elseif( get_row_layout() == 'text_image' ):
                    $text = get_sub_field('content_wysiwyg');
                    $image = get_sub_field('content_image'); ?>
                    <div class="content-block textImage">
                        <div class="wysiwyg">
                            <?= $text; ?>
                        </div>
                        <div class="image">
                            <img src="<?= $image['url']; ?>" alt="">
                        </div>
                    </div>

                <!-- Case: Image -->
                <?php elseif( get_row_layout() == 'image' ):
                    $image = get_sub_field('content_image'); ?>
                    <div class="content-block image">
                        <div class="image">
                            <img src="<?= $image['url']; ?>" alt="">
                        </div>
                    </div>

                <!-- Case: Video -->
                <?php elseif( get_row_layout() == 'video' ):
                    $video = get_sub_field('content_video'); ?>
                    <div class="content-block video">
                        <video controls>
                            <source src="<?= $video; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                <!-- Case: Gallery -->
                <?php elseif( get_row_layout() == 'gallery' ):
                    // Check rows exists.
                    if( have_rows('content_gallery') ): ?>
                        <div class="content-block gallery">
                        <?php
                            while( have_rows('content_gallery') ) : the_row();
                            $image = get_sub_field('content_gallery_image'); 
                        ?>

                            <img src="<?= $image['url']; ?>" alt="">
                        <?php
                            endwhile;
                        ?>

                        </div>
                    <?php endif; ?>

                <!-- Case: FAQ -->
                <?php elseif( get_row_layout() == 'faq' ): ?>

                    <div class="content-block faq">

                    <?php while( have_rows('content_faq') ) : the_row();
                        $question = get_sub_field('content_faq_question'); 
                        $anwser = get_sub_field('content_faq_anwser'); 
                    ?>

                        <div class="question" id="question<?= get_row_index(); ?>" onclick="toggleActive(<?= get_row_index(); ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <h3><?= $question; ?></h3>
                            <div class="wysiwyg">
                                <?= $anwser; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    </div>

                <!-- Case: Links -->
                <?php elseif( get_row_layout() == 'links' ):
                    $links_title = get_sub_field('content_links_title');
                    // Check rows exists.
                    if( have_rows('content_links') ): 
                        ?>
                        <div class="content-block links">
                            <h2><?= $links_title; ?></h2>
                        <?php
                            while( have_rows('content_links') ) : the_row();
                            $link = get_sub_field('content_link_page');
                            $id = $link->ID;
                            $url = get_permalink($id);
                            $name = $link->post_title;
                            $image = get_field('image_image', $id);
                        ?>

                            <a href="<?= $url; ?>">
                                <div class="img" style="background-image: url('<?= $image['sizes']['medium']; ?>')"></div>
                                <p class="button"><?= $name; ?></p>
                            </a>
                        <?php
                            endwhile;
                        ?>

                        </div>
                    <?php endif; ?>
                
                <?php endif; ?>

            <?php endwhile; ?>  
        
        </div>
    </section>
<?php endif; ?>

<script>

    function toggleActive(id) {
        var query = '.question#question' + id;
        var question = document.querySelector(query);
        if (question.classList.contains('active')) {
            question.classList.remove('active');
        } else {
            question.classList.add('active');
        }
    }

    // var questions = document.querySelectorAll('.question');
    // questions.forEach(function(elem) {
    //     elem.addEventListener("input", function() {
    //         console.log('test');
    //         if (!elem.classList('active')) {
    //             elem.classList.add('active');
    //         }
    //     });
    // });


</script>