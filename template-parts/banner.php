
<?php
/**
 * Tempate part used in index.php for showing flexslider
 * @package powen
 */

$slides = get_theme_mod( 'powen_slides', powen_default_slides() );

?>

<div id="powen-main-slider" class="clear">
	<section id="slider" class="flexslider">
		<ul class='slides'>

		<?php if( is_array( $slides ) ) : foreach ( $slides as $slide ) : ?>

			<?php if( ! trim( $slide['image'] ) ) continue; ?>
			<li>
				<a href='<?php echo esc_url( $slide['link'] ); ?>'>
					<img src='<?php echo esc_url( $slide['image'] ); ?>' alt='image'>
					<div class='powen-slider-content animated slideInUp'>
						<h6><?php echo esc_attr( $slide['title'] ); ?></h6>
						<p><?php echo esc_attr( $slide['description'] ); ?></p>
					</div>
				</a>
			</li>

		<?php endforeach; endif; ?>

		</ul>
	</section>
</div>