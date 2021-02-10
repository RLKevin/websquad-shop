<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

//  initialize fonts
$primary_font = get_field('font_primary', 'options');
if (!$primary_font) {
    $primary_font = 'Roboto';
}
$secondary_font = get_field('font_secondary', 'options');
if (!$secondary_font) {
    $secondary_font = 'Roboto Slab';
}

$primary_font = str_replace(' ', '+', $primary_font);
$secondary_font = str_replace(' ', '+', $secondary_font);

?><!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link href="https://fonts.googleapis.com/css2?family=<?= $primary_font; ?>:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=<?= $secondary_font; ?>:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <meta name="theme-color" content="<?= get_field('color_tab','option'); ?>">
        <?php wp_head(); ?>

        <script type="text/javascript">
            var siteUrl = "<?php echo get_site_url(); ?>";
            var pageId = "<?php echo get_the_ID(); ?>";
            var template = '<?= get_template_directory_uri(); ?>';
        </script>

        <?php 
            // vars
            $tag_manager_head = get_field('options_tag_manager_head', 'option');
            if ($tag_manager_head):
                echo $tag_manager_head;
            endif;
        ?>
    </head>

<body <?php body_class(); ?>>

    <?php 
        // vars
        $tag_manager_body = get_field('options_tag_manager_body', 'option');
        if ($tag_manager_body):
            echo $tag_manager_body;
        endif;
    ?>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<?php get_template_part('partials/header'); ?>

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		do_action( 'storefront_content_top' );
