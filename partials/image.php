<?php 

    $id = get_the_ID();
    $page_title = get_the_title();
    $image_image = get_field('image_image')['url'];
    $image = get_the_post_thumbnail_url($id, 'full');  
    if ($image) {
        $image_image = $image;
    }

?>

<section class="image" style="background-image: url('<?= $image_image; ?>')">

        <div class="wrapper">
        
            <h1><?= $page_title; ?></h1>

        </div>

</section>