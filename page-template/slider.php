<?php
/**
 *
 * Used for showing slider on multiple pages
 *
 * @package powen
 * @since powen 1.3.4
 *
 * Template Name: Slider Template
 */

get_header(); ?>

<?php get_template_part( 'template-parts/banner' ); ?>

<div id="content" class="site-content clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- #content -->

<?php get_footer(); ?>
