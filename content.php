<?php
/**
 * @package powen
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-img">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" >
		<!-- Featured Images -->
		<?php if ( has_post_thumbnail() )
		{
			the_post_thumbnail();
		}
		?>
		</a>
	</div>
	<div class="article-hentry">
	<header class="entry-header">
		<?php esc_attr( the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ) ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php powen_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->
	<i class='powen-border-line'></i>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'powen' ),
				'after'  => '</div>',
			) );
		?>

	<!-- Continue reading -->
	<div class="continue-reading"><a href="<?php esc_url( the_permalink() ); ?>"><?php _e('Continue Reading', 'powen') ?></a></div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php powen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</div><!-- .article-hentry -->
</article><!-- #post-## -->