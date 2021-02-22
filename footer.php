<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<?php get_template_part('partials/footer'); ?>

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

<div class="switchcookie disabled">
	<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus, ipsam!</p>
	<a class="button" id="switchcookiebutton">ok</a>
</div>

</html>
