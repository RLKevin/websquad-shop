<?php

	$slogan = get_field('hero_slogan');

?>

<section class="hero full-width">

	<div class="wrapper">

	<?php
	
	if( have_rows('hero_slider') ): 
	
		?>

		<div class="hero__slider">

			<?php 
			
			while ( have_rows('hero_slider') ) : the_row();

				$hero_image = get_sub_field('hero_image');
				$hero_title = get_sub_field('hero_title');
				$hero_text = get_sub_field('hero_text');
				$hero_button = get_sub_field('hero_button');
				?>

				<div class="slide" style="background-image: url('<?php echo $hero_image['sizes']['large']; ?>');">
					<div class="content">
						<h2><?= $hero_title; ?></h2>
						<p><?= $hero_text; ?></p>
						<a href="<?= $hero_button['url']; ?>" class="button"><?= $hero_button['title']; ?></a>
						<div class="placeholder"></div>
					</div>
				</div>

				<?php
			
			endwhile; 
			
			?>

		</div>

		<?php 
	
	endif;
	
	?>
		<div class="overlay">
			<span class="tagline"><?= $slogan; ?></span>
		</div>
	</div>

</section>