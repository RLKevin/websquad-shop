<?php

$form_title = get_field('form_title');
$form_id = get_field('form_form');
$form_meat = get_field('form_image');

$form_info_title = get_field('form_info_title');
$form_info_text = get_field('form_info_text');

?>

<section class="form">

    <div class="wrapper">

        <div class="meat" style="background-image: url('<?= $form_meat['url']; ?>'); "></div>

        <div class="left">
            
            <h2><?= $form_info_title; ?></h2>
            <p><?= $form_info_text; ?></p>
        
        </div>

        <div class="form">
            <h2><?= $form_title; ?></h2>
        
            <?php 
                gravity_form( $form_id, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true, $tabindex = 1, $echo = true );
            ?>

        </div>
    
    </div>

</section>