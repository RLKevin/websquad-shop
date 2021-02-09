<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<main id="nieuws">
	<article>

	<?php

	get_template_part('partials/image');


	$id = get_the_ID();
	$image = get_the_post_thumbnail_url($id, 'full');  
	$title = get_the_title();
	$date = get_the_date();
	$intro = get_field('news_intro');
	$content = get_field('news_text');

	?>

	<section class="news-single">
		<div class="wrapper">
			<h1><?= $title; ?></h1>
			<span class="date"><?= $date; ?></span>
			<div class="wysiwyg">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php get_template_part('partials/news'); ?>


	</article>
</main>

<?php 
	endwhile;
	endif;
	get_footer();
?>