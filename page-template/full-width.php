<?php
/**
 * The template displays full width pages
 *
 * @package powen
 * @since powen 1.0
 *
 *	Template Name: Full Width
 */
?>
<?php get_header(); ?>

<div id="content" class="site-content">	
	<div id="full-width" class="full-width-content-area">
		

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		
	</div><!-- full-width -->
</div><!-- content -->
<?php get_footer(); ?>