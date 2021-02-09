<?php if( have_rows('hero_slider') ): ?>

    <section class="strip">
        <div class="wrapper">

            <?php while ( have_rows('strip_repeater') ) : the_row();
                $strip_icon = get_sub_field('strip_icon');
                $strip_text = get_sub_field('strip_text');
                ?>

                <div class="item">
                    <div class="icon" style="background-image: url('<?= $strip_icon['url']; ?>')"></div>
                    <h3><?= $strip_text; ?></h3>
                </div>

            <?php endwhile; ?>

        </div>
    </section>

<?php endif; ?>