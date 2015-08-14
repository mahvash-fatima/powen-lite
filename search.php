<?php
/**
 * The template for displaying search results pages.
 *
 * @package powen
 */

get_header(); ?>

	<div id="content" class="site-content">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<div class="powen-featured-img">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" >
				<!-- Featured Images -->
				<?php if ( has_post_thumbnail() )
				{
					if( powen_mod( 'sidebar_position' ) === 'no-sidebar' ){
						the_post_thumbnail('full');
					}else{
						the_post_thumbnail('large');
					}
				}
				?>
				</a>
			</div>
			<div class="article-hentry">

			<header class="page-header">
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'powen' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );

				?>


			<?php endwhile; ?>

			<?php do_action( 'powen_before_pagination' ); ?>

			<?php powen_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- .article-hentry -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- #content -->

<?php get_footer(); ?>