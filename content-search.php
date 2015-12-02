<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package powen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php esc_attr( the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ) ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

				<?php powen_posted_on(); ?>
				<?php powen_the_author(); ?>

			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php
				if( powen_mod('content_length') == 'full' ) {
					the_content();
				}elseif ( powen_mod('content_length') == 'excerpt' ) {
					the_excerpt();
				}
			?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php powen_entry_footer(); ?>
		</footer><!-- .entry-footer -->

</article><!-- #post-## -->
