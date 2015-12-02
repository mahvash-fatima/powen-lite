<?php
/**
 * The template used for displaying page content in page.php
 *
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
		<?php esc_attr(the_title( '<h1 class="entry-title">', '</h1>' )); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'powen' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'powen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	</div><!-- .article-hentry -->
</article><!-- #post-## -->
