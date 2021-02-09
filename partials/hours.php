<?php

    // Check rows exists.
    if( have_rows('store_hours') ): ?>

        <section class="hours">
            <div class="wrapper">
            <h2>Openingstijden</h2>

            <?php while( have_rows('store_hours') ) : the_row();

                // Load sub field value.
                $hour_day = get_sub_field('store_hours_day');
                $hour_open = get_sub_field('store_hours_open');
                $hour_close = get_sub_field('store_hours_close');

            ?>
                <p>
                    <?php if ($hour_open) { ?>
                        <span class="day"><?= $hour_day; ?>: </span>
                        <span class="hours"><?= $hour_open." - ".$hour_close; ?></span>
                    <?php } else { ?>
                        <span class="day"><?= $hour_day; ?>: </span>
                        <span class="hours">gesloten</span>
                    <?php } ?>
                </p>

            <?php endwhile;

        // No value.
        else :
            // Do something...
        endif;

    ?>
    
    </div>
</section>