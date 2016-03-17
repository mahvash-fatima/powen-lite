
<?php
/**
 * Tempate part used in index.php for showing flexslider
 * @package powen
 */

$slides = get_theme_mod( 'powen_slides', powen_default_slides() );

?>

<?php if( ! powen_mod( 'hide_slider' , false ) ) :  ?>
	<section id="powen-slider" class="powen-main-slider">

		<?php if( is_array( $slides ) ) : foreach ( $slides as $slide ) : ?>

			<?php
				$slide_title       = isset( $slide['title'] ) ? $slide['title'] : false;
				$slide_link        = isset( $slide['link'] ) ? $slide['link'] : false;
				$slide_image       = isset( $slide['image'] ) ? $slide['image'] : false;
				$slide_description = isset( $slide['description'] ) ? $slide['description'] : false;

			if( ! trim( $slide_image ) ) continue; ?>

			<div class="powen-slide">
				<a href='<?php echo esc_url( $slide_link ); ?>'>
					<img src='<?php echo esc_url( $slide_image ); ?>' alt='image'>
					<?php if( $slide_title || $slide_description ) { ?>
					<div class='powen-slider-content'>
						<div class="powen-slider-content-wrapper">
							<h6 class="powen-slider-title"><?php echo esc_attr( $slide_title ); ?></h6>
							<p class="powen-slider-description"><?php echo esc_attr( $slide_description ); ?></p>
						</div>
					</div>
					<?php } ?>
				</a>
			</div>

		<?php endforeach; endif; ?>

	</section>
<?php endif; ?>