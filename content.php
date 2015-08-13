<?php
/**
 * @package powen
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="powen-featured-img">
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
			<?php powen_the_author(); ?>
		</div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		/**
		* Custom Excerpt Length powen using wp_trim_excerpt()
		*/

		$powen_content = get_the_content();
		echo wp_trim_words( $powen_content , apply_filters('powen_excerpt_length', '100') );
		?>


		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'powen' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php powen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</div><!-- .article-hentry -->
</article><!-- #post-## -->