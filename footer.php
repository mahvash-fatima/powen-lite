<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package powen
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer_widgets">
			<div class="powen-wrapper">

				<?php
				    /* The footer widget area is triggered if any of the areas
				     * have widgets. So let's check that first.
				     *
				     * If none of the sidebars have widgets, then let's bail early.
				     */

				    	if (   is_active_sidebar( 'first-footer-widget-area'  )
				    	    && is_active_sidebar( 'second-footer-widget-area' )
				    	    && is_active_sidebar( 'third-footer-widget-area'  )
				    	    && is_active_sidebar( 'fourth-footer-widget-area' )
				    	) : ?>

				    	<aside class="fatfooter" role="complementary">
				    	    <div class="first quarter left widget-area">
				    	        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
				    	    </div><!-- .first .widget-area -->

				    	    <div class="second quarter widget-area">
				    	        <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
				    	    </div><!-- .second .widget-area -->

				    	    <div class="third quarter widget-area">
				    	        <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
				    	    </div><!-- .third .widget-area -->

				    	    <div class="fourth quarter right widget-area">
				    	        <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
				    	    </div><!-- .fourth .widget-area -->
				    	</aside><!-- #fatfooter -->


						<?php
						elseif ( is_active_sidebar( 'first-footer-widget-area'  )
						    && is_active_sidebar( 'second-footer-widget-area' )
						    && is_active_sidebar( 'third-footer-widget-area'  )
						    && ! is_active_sidebar( 'fourth-footer-widget-area' )
						) : ?>
						<aside class="fatfooter" role="complementary">
						    <div class="first one-third left widget-area">
						        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
						    </div><!-- .first .widget-area -->

						    <div class="second one-third widget-area">
						        <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
						    </div><!-- .second .widget-area -->

						    <div class="third one-third right widget-area">
						        <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
						    </div><!-- .third .widget-area -->

						</aside><!-- #fatfooter -->


						<?php
						elseif ( is_active_sidebar( 'first-footer-widget-area'  )
						    && is_active_sidebar( 'second-footer-widget-area' )
						    && ! is_active_sidebar( 'third-footer-widget-area'  )
						    && ! is_active_sidebar( 'fourth-footer-widget-area' )
						) : ?>
						<aside class="fatfooter" role="complementary">
						    <div class="first half left widget-area">
						        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
						    </div><!-- .first .widget-area -->

						    <div class="second half right widget-area">
						        <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
						    </div><!-- .second .widget-area -->

						</aside><!-- #fatfooter -->



						<?php
						elseif ( is_active_sidebar( 'first-footer-widget-area'  )
						    && ! is_active_sidebar( 'second-footer-widget-area' )
						    && ! is_active_sidebar( 'third-footer-widget-area'  )
						    && ! is_active_sidebar( 'fourth-footer-widget-area' )
						) :
						?>
						<aside class="fatfooter" role="complementary">
						    <div class="first full-width widget-area">
						        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
						    </div><!-- .first .widget-area -->

						</aside><!-- #fatfooter -->


				    <!-- //end of all sidebar checks. -->
				   <?php endif; ?>

		    </div><!-- .powen-wrapper -->
	</div><!-- #footer_widgets -->

	<div class="site-info">

		<div class="powen-wrapper">
			<?php if( get_theme_mod( 'powen_hide_copyright' ) == '') { ?>
			    <?php _e(date('Y')); ?><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
			        <?php echo get_theme_mod( 'powen_copyright_textbox', '@copyright'); ?>
			    </a>
			<?php } // end if ?>
			<span class="sep"> | </span>

			<?php printf( __( '%1$s by %2$s .', 'powen' ), get_theme_mod('powen_website_name', 'Powen'), '<a href= '.esc_url(get_theme_mod('powen_author_uri')).' rel="designer">'.get_theme_mod('powen_author_name').'</a>' ); ?>

		</div><!-- powen-wrapper -->
	</div><!-- site-info -->

	</footer><!-- #colophon -->

<!-- back to top -->
<div class="footer-scroll"></div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>