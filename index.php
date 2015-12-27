<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package powen
 */

$first_post_id = false;

$show_latest_post = powen_mod( 'show_latest_post', 1 );

get_header(); ?>

<?php if( $show_latest_post && get_query_var( 'paged' ) === 0 ) { ?>
	<div id="powen-latest-post" class="powen-recent-post">
		<div class="powen-wrapper">

		<?php

			$args = apply_filters('powen_recent_post_arguments_array', array(
				'posts_per_page'      => 1,
				'ignore_sticky_posts' => true,
			) );

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

			get_template_part( 'template-parts/recent-post' );

			$first_post_id = get_the_ID();

		?>

			<?php endwhile; ?>

			<?php endif; wp_reset_postdata(); ?>

		</div><!-- powen-wrapper -->
	</div><!-- powen-recent-post -->

	<?php do_action( 'powen_after_first_home_post' ); ?>

<?php } ?>


<?php do_action( 'powen_before_content' ); ?>

<div id="content" class="site-content clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					if( $show_latest_post && get_the_ID() === $first_post_id ) {
						continue;
					}
					?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

						get_template_part( 'content', get_post_format() );

					?>

				<?php endwhile; ?>

				<?php
					 do_action( 'powen_before_pagination' );
					 powen_pagination(); //pagination
				 ?>

				<!-- To reset custom loop -->
				<?php wp_reset_postdata(); ?>

					<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- #content -->

<?php get_footer(); ?>