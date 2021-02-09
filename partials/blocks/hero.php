<?php 

// register block - for icon use https://developer.wordpress.org/resource/dashicons/

switch_register_block('hero', 'images-alt');

// render block

function render_block_hero() {

	// vars
	$id = get_field('id');
	$scroll = get_field('scroll');
	$align = get_field('options_header_align', 'option');

	?>

	<div id="<?php echo $id; ?>" class="hero">

		<div class="hero__slider slider">

			<?php
			
			if( have_rows('repeater') ):
			
				while ( have_rows('repeater') ) : the_row();

					// vars
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$subtitle = get_sub_field('subtitle');
					$button_left = get_sub_field('button_left');
					$button_right = get_sub_field('button_right');
					$header_align = get_field('options_header_align', 'option');

					?>
					
					<div class="hero__container hero__container--<?php echo $align; ?>">	
						
						<div class="hero__image" style="background-image: url(<?php echo $image['sizes']['1920-16-9']; ?>);">
						</div>
						
						<div class="hero__text">

							<div class="wrapper">

								<?php if ($title): ?>

									<h2><?php echo $title; ?></h2>

								<?php endif; ?>

								<?php if ($subtitle): ?>

									<h3><?php echo $subtitle; ?></h3>

								<?php endif; ?>
							
								<?php if ($button_left || $button_right ): ?>

									<div class="hero__button-container">

										<?php if ($button_left): ?>

											<a class="button button--filled-secondary" href="<?php echo $button_left['url']; ?>" target="<?php echo $button_left['target']; ?>"><?php echo $button_left['title']; ?></a>

										<?php endif; ?>

										<?php if ($button_right): ?>

											<a class="button button--filled-secondary" href="<?php echo $button_right['url']; ?>" target="<?php echo $button_right['target']; ?>"><?php echo $button_right['title']; ?></a>

										<?php endif; ?>

									</div>
									
								<?php endif; ?>

							</div>

						</div>

					</div>

					<?php 
				
				endwhile; 
			
			endif;
			
			?>

		</div>

		<?php 
		
		if ($scroll): 
		
		?>

			<div class="hero__scroll-button">
				<a href="#<?php echo $scroll; ?>"></a>
			</div>
		
		<?php 
	
		endif;



	?>

	</div>

	<?php

}

?>