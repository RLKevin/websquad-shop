<?php 

// register block

switch_register_block('search', 'search');

// render block

function render_block_search() {
		
	// vars

	$page_not_found_id = (get_page_by_path('page-not-found'))->ID;
	$search_id = (get_page_by_path('search'))->ID;
	$thanks_id = (get_page_by_path('thanks'))->ID;
	$exclude = $page_not_found_id . ', ' . $search_id . ', ' . $thanks_id . ', ' . get_field('exclude');
	$search = $_GET["keyword"];
	$the_query = new WP_Query(
		array(
			's' => $search, 
			'posts_per_page'		=> $items,
			'post_type'				=> array('page', 'blog', 'news', 'projects', 'vacancies'),
			'post__not_in' 			=> explode(',', $exclude),
			'posts_per_page'		=> '-1',
			'orderby' 				=> 'menu_order', 
			'order' 				=> 'asc',
		) 
	);
	$count = $the_query -> post_count;
	$align = get_field('align');
	$background = get_field('background');
	$id = get_field('id');

	?>

	<div id="<?php echo $id; ?>" class="search search--<?php echo $align; ?> search--<?php echo $background; ?>">

		<div class="wrapper">
		
			<h2>Resultaten voor <?php echo $search; ?></h2>
			<h3>Er <?php echo ($count == 1 ? 'is' : 'zijn'); ?> <?php echo ($count == 0 ? 'geen' : $count); ?> <?php echo ($count == 1 ? 'resultaat' : 'resultaten'); ?> gevonden.</h3>

			<?php 

			while ($the_query -> have_posts()): $the_query -> the_post();

				// vars

				$link = get_the_permalink();
				$title = get_the_title();

				?>

				<a href="<?php echo $link; ?>"><?php echo $title; ?></a>

				<?php

			endwhile;

			?>

		</div>
	</div>

	<?php 

}

?>