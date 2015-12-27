<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package powen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="powen-featured-img">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" >
		<!-- Featured Images -->
		<?php if ( has_post_thumbnail() )
		{
			the_post_thumbnail('full');
		}
		?>
		</a>
	</div>

	<div class="article-hentry">
	<header class="entry-header">
		<?php esc_attr( the_title( '<h2 class="entry-title">', '</h2>' ) ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'powen-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'powen-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	</div><!-- .article-hentry -->
</article><!-- #post-## -->
