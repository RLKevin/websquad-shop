
$cl-primary: <?php the_field('color_primary', 'option'); ?>;
$cl-primary-text: <?php if(get_field('color_primary_text', 'option') === 'dark') { echo '#212121'; } else { echo "#ffffff"; } ?>;
$cl-secondary: <?php the_field('color_secondary', 'option'); ?>;
$cl-secondary-text: <?php if(get_field('color_secondary_text', 'option') === 'dark') { echo '#212121'; } else { echo "#ffffff"; } ?>;

$shape_top_left: <?php the_field('shape_top_left', 'option'); ?>;
$shape_top_right: <?php the_field('shape_top_right', 'option'); ?>;
$shape_bottom_left: <?php the_field('shape_bottom_left', 'option'); ?>;
$shape_bottom_right: <?php the_field('shape_bottom_right', 'option'); ?>;

$ff-primary: "<?php the_field('font_primary', 'option'); ?>", Roboto, <?php the_field('font_primary_alt', 'option'); ?>;
$ff-secondary: "<?php the_field('font_secondary', 'option'); ?>", Roboto Slab, <?php the_field('font_secondary_alt', 'option'); ?>;

$preferred-animation: <?php the_field('animation', 'option'); ?>;

$cl-background: <?php if(get_field('color_dark_theme', 'option') === 'dark') { echo '#212121'; } else { echo '#ffffff'; }?>;
$cl-text: <?php if(get_field('color_dark_theme', 'option') === 'dark') { echo '#ffffff'; } else { echo '#212121'; }?>;
$cl-grey: <?php if(get_field('color_dark_theme', 'option') === 'dark') { echo '#4b4b4b'; } else { echo '#efefef'; }?>;