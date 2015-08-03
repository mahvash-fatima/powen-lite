<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package powen
 */
?>

<?php get_header();  ?>
	<section id="error-404" class="not-found">
		<header class="page-header">
			<h2 class="page-title"><?php _e( 'oops! That page can&rsquo;t be found.', 'powen' ); ?></h2>
		</header><!-- .page-header -->
		<?php do_action( 'powen_footer_top_extras' ); ?>
	</section><!-- .error-404 -->
<?php get_footer(); ?>
