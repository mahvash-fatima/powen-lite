
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
				'description' => __('Dolores porro, architecto totam, animi, pariatur qui suscipit doloribus saepe temporibus magni, ducimus ut fugit eius. Consectetur saepe nemo, optio, ut deleniti illum. Velit assumenda amet', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide5.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Two', 'powen'),
				'link' 		  => '',
				'description' => __('Soluta quidem sapiente, adipisci magni voluptatem necessitatibus voluptatum minima ipsa aliquam nobis rem officia autem odio dolorum laudantium. Minus voluptatum dicta tempora', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide4.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Three', 'powen'),
				'link' 		  => '',
				'description' => __('Explicabo doloribus neque id cupiditate consequuntur fugit, magnam itaque officiis possimus enim assumenda autem minus non similique vitae illum, perferendis optio, nemo vel tenetur', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide3.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Four', 'powen'),
				'link' 		  => '',
				'description' => __('Cupiditate deleniti, enim natus magni. Harum asperiores, maxime ratione! Iusto velit quibusdam, quo vitae esse nihil cum aspernatur laboriosam fugiat eos tenetur distinctio autem', 'powen'),
				'image'       => get_template_directory_uri() . '/images/slides/slide2.jpg',
            ),
        array
            (
				'title'       => __('Demo Post Five', 'powen'),
				'link' 		  => '',
				'description' => __('Porro quae quo voluptates nobis, architecto sunt, delectus, earum temporibus eaque rem unde iste fuga. Esse quaerat quo, pariatur voluptas accusamus minima repudiandae fugit cupiditate', 'powen'),
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
						<h3><?php echo esc_attr( $slide['title'] ); ?></h3>
						<p><?php echo esc_attr( $slide['description'] ); ?></p>
					</div>
				</a>
			</li>

		<?php endforeach; endif; ?>

		</ul>
	</section>

	<section id="carousel" class="flexslider">
		<ul class='slides'>

			<?php if( is_array( $slides ) ) : foreach ( $slides as $slide ) : ?>

				<li>
					<a href='<?php echo esc_url( $slide['link'] ); ?>'>
						<img src='<?php echo esc_url( $slide['image'] ); ?>' alt='image'>
						<div class='powen-slider-content animated slideInUp'>
							<h3><?php echo esc_attr( $slide['title'] ); ?></h3>
							<p><?php echo esc_attr( $slide['description'] ); ?></p>
						</div>
					</a>
				</li>

			<?php endforeach; endif; ?>

		</ul>
	</section>
</div>