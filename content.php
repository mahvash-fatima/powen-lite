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
		<?php powen_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'powen-lite' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php powen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</div><!-- .article-hentry -->
</article><!-- #post-## -->