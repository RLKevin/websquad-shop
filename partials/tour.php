<?php

    $tour_image = get_field('store_image')['url'];
    $tour_url = get_field('tour_url');

?>

<?php if ($tour_url) : ?>

    <section class="tour dev" style="background-image: url('<?= $tour_image; ?>'); ">

        <div class="shade"></div>

        <div class="wrapper">
        
            <h2>Virtuele winkeltour</h2>
            <div class="icon"></div>
            <a target="_blank" href="<?= $tour_url; ?>" class="button">bekijk onze winkel</a>
        
        </div>

    </section>

<?php endif; ?>