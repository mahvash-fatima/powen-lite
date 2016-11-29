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
		<?php esc_attr( the_title( '<h2 class="entry-title">', '</h2>' ) ); ?>

		<div class="entry-meta">
			<?php powen_posted_on(); ?>
			<?php powen_the_author(); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
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
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php powen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	</div><!-- .article-hentry -->
</article><!-- #post-## -->
