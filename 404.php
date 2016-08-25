<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package powen
 */
?>

<?php get_header();  ?>

	<section class="error-404 not-found">
		<div class="powen-wrapper">
			<header class="page-header">
				<span class="fa fa-exclamation-circle"></span>
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'powen-lite' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'powen-lite' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</div>
	</section><!-- .error-404 -->

<?php do_action( 'powen_footer_top_extras' ); ?>

<?php get_footer(); ?>