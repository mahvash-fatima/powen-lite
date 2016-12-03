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

	<div class ="powen-featured-img">
		<a href ="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" >
			<?php the_post_thumbnail('full'); ?>
		</a>
	</div>

	<div class="article-hentry">
		<header class="entry-header">
			<?php esc_attr( the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ) ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php powen_posted_on(); ?>
				<?php powen_the_author(); ?>
			</div>

			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php
			powen_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'powen-lite' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'powen-lite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php powen_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div><!-- .article-hentry -->

</article><!-- #post-## -->
