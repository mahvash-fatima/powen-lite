<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package powen
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						esc_attr(the_archive_title( '<h2 class="page-title">', '</h2>' ));
						esc_attr(the_archive_description( '<div class="taxonomy-description">', '</div>' ));
					?>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php do_action( 'powen_before_pagination' ); ?>

				<?php apply_filters('excerpt_more', 'powen_change_read_more'); ?>

				<?php powen_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- #content -->

<?php get_footer(); ?>
