
<?php
/**
 * Tempate part used in index.php for showing flexslider
 * @package powen
 */

$powen_default_slides =  apply_filters('powen_default_slides_array', array(
        array
            (
				'title'       => __('Demo Post One', 'powen'),
				'link' 		  => '',
				'description' => __('Omnis fugit itaque architecto sit saepe quidem tempora fuga esse incidunt perferendis harum.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide8.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Two', 'powen'),
				'link' 		  => '',
				'description' => __('Reiciendis blanditiis eius officia molestias dicta vero hic accusamus aliquam enim optio porro veritatis.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide7.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Three', 'powen'),
				'link' 		  => '',
				'description' => __('Eaque perferendis nesciunt provident facere sint laboriosam commodi saepe quas dolorem ipsam saepe itaque', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide6.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Four', 'powen'),
				'link' 		  => '',
				'description' => __('Cupiditate deleniti, enim natus magni nisi deleniti eligendi recusandae reiciendis.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide5.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Five', 'powen'),
				'link' 		  => '',
				'description' => __('Temporibus eaque rem unde iste fugasse quaerat quo veniam reprehenderit repudiandae perferendis porro minus.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide4.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Six', 'powen'),
				'link' 		  => '',
				'description' => __('Perferendis quasi totam voluptates quo quaerat temporibus maiores nesciunt soluta rerum sint laboriosam.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide3.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Seven', 'powen'),
				'link' 		  => '',
				'description' => __('Inventore nesciunt quaerat unde dicta molestiae animi blanditiis expedita est architecto ipsum ullam nisi perspiciatis.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide2.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Eight', 'powen'),
				'link' 		  => '',
				'description' => __('Libero mollitia error expedita totam iste minus cumque quos obcaecati earum rerum totam ea vitae.', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide1.jpg',
            )
         ) );

$slides = get_theme_mod( 'powen_slides', $powen_default_slides );

?>

<div id="powen-main-slider" class="clear">
	<section id="slider" class="flexslider">
		<ul class='slides'>

		<?php if( is_array( $slides ) ) : foreach ( $slides as $slide ) : ?>

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