<div id="powen-most-latest-post" class="powen-most-recent-post">
	<?php do_action( 'powen_recent_post_top_extras' ); ?>

	<div class ="powen-featured-img">
	<a href ="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" >
	<?php the_post_thumbnail(); ?>
	</a>
	</div>

	<div class="article-hentry">
		<header class ="entry-header">
			<?php the_title( sprintf( '<h2 class ="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php powen_posted_on(); ?>
			<?php powen_the_author(); ?>

		</header>

		<div class="powen-latest-post-tag"><span><?php echo __('Latest', 'powen'); ?></span></div>

		<div class="entry-content">
			<?php powen_content(); ?>
		</div>

		<div class="powen-continue-reading"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo powen_mod( 'read_more_textbox', __( 'Continue Reading' , 'powen' )); ?></a></div>

		<footer class="entry-footer">
			<?php powen_entry_footer(); ?>
			<?php do_action( 'powen_recent_post_bottom_extras' ); ?>
		</footer><!-- .entry-footer -->
	</div>
</div>