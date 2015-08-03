<div id="powen-latest-post" class="powen-recent-post">
	<div class="powen-wrapper">

	<?php $args = apply_filters('powen_recent_post_arguments_array', array(
					'author'			  => 1,
					'posts_per_page'      => 1,
					'ignore_sticky_posts' => true,
					'post_status'         => 'publish',
					'orderby'             => 'date',
					'order'               => 'DESC',
				) );

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

	<div id="powen-most-latest-post" class="powen-most-recent-post">

		<?php do_action( 'powen_recent_post_top_extras' ); ?>

		<div class="featured-img">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" >
			<?php the_post_thumbnail(); ?>
			</a>
		</div>

		<div class="powen-recent-article">
			<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<div class="entry-meta">
				<?php powen_posted_on(); ?>
				</div>
			</header>
			<i class='powen-border-line'></i>

			<div class="powen-latest-post-tag"><span><?php echo __('Latest', 'powen'); ?></span></div>

			<div class="entry-content">
			<?php

			if(powen_mod('content_length') == 'excerpt') {
				the_excerpt();
			}
			elseif(powen_mod('content_length') == 'full') {
				the_content();
			}
			elseif (powen_mod('content_length') == '') {
				the_excerpt();
			}

			?>
			</div>

			<div class="continue-reading"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo __(powen_mod( 'read_more_textbox', 'Continue Reading')); ?></a></div>

			<footer class="entry-footer">
				<?php powen_entry_footer(); ?>
				<?php do_action( 'powen_recent_post_bottom_extras' ); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>

	<?php endwhile; else : ?><p><?php echo apply_filters('powen_four_o_four_page_text', __( 'Sorry, no posts matched your criteria.' ) ); ?></p>

	<?php endif; wp_reset_postdata(); ?>

	</div>
</div>