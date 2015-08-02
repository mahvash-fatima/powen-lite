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

				<div class="featured-img">
					<a href="<?php echo apply_filters('powen_recent_post_featured_imgage_url', esc_url( get_permalink() ) ); ?>" rel="bookmark" >
					<?php the_post_thumbnail(); ?>
					</a>
				</div>

				<div class="article-hentry">
					<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', apply_filters('powen_recent_post_title_link', esc_url( get_permalink() ) ) ), '</a></h2>' ); ?>
					<?php powen_posted_on(); ?>
					</header>
					<i class='powen-border-line'></i>
				</div>

				<div class="powen-latest-post-tag"><span><?php echo apply_filters('powen_recent_post_tag_title',__('Latest', 'powen') ); ?></span></div>

				<div class="entry-content">
				<?php the_excerpt(); ?>
				</div>

				<div class="continue-reading"><a href="<?php echo apply_filters('powen_continue_reading_url', esc_url( the_permalink() ) ); ?>"><?php echo apply_filters('powen_continue_reading_title', __('Continue Reading', 'powen') ); ?></a></div>

				<footer class="entry-footer">
					<?php powen_entry_footer(); ?>
				</footer><!-- .entry-footer -->

			</div>

		<?php endwhile; else : ?> <p><?php echo apply_filters('powen_four_o_fout_page_text', __( 'Sorry, no posts matched your criteria.' ) ); ?></p>

		<?php endif; wp_reset_postdata(); ?>
	</div>
</div>