
<?php
/**
 * Tempate part used in index.php for showing flexslider
 * @package powen
 */

$powen_default_slides =  array(
        array
            (
				'title'       => __('Demo Post One', 'powen'),
				'link' 		  => esc_url( 'home_url( '/' )' ),
				'description' => __('Dolores porro, architecto totam, animi, pariatur qui suscipit doloribus saepe temporibus magni, ducimus ut fugit eius. Consectetur saepe nemo, optio, ut deleniti illum. Velit assumenda amet', 'powen'),
				'image'       => esc_url(get_template_directory_uri() . '/images/slides/slide5.jpg'),
            ),
        array
            (
				'title'       => __('Demo Post Two', 'powen'),
				'link' 		  => esc_url( 'home_url( '/' )' ),
				'description' => __('Soluta quidem sapiente, adipisci magni voluptatem necessitatibus voluptatum minima ipsa aliquam nobis rem officia autem odio dolorum laudantium. Minus voluptatum dicta tempora', 'powen'),
				'image'       => esc_url(get_template_directory_uri() . '/images/slides/slide4.jpg'),
            ),
        array
            (
				'title'       => __('Demo Post Three', 'powen'),
				'link' 		  => esc_url( 'home_url( '/' )' ),
				'description' => __('Explicabo doloribus neque id cupiditate consequuntur fugit, magnam itaque officiis possimus enim assumenda autem minus non similique vitae illum, perferendis optio, nemo vel tenetur', 'powen'),
				'image'       => esc_url(get_template_directory_uri() . '/images/slides/slide3.jpg'),
            ),
        array
            (
				'title'       => __('Demo Post Four', 'powen'),
				'link' 		  => esc_url( 'home_url( '/' )' ),
				'description' => __('Cupiditate deleniti, enim natus magni. Harum asperiores, maxime ratione! Iusto velit quibusdam, quo vitae esse nihil cum aspernatur laboriosam fugiat eos tenetur distinctio autem', 'powen'),
				'image'       => esc_url(get_template_directory_uri() . '/images/slides/slide2.jpg'),
            ),
        array
            (
				'title'       => __('Demo Post Five', 'powen'),
				'link' 		  => esc_url( 'home_url( '/' )' ),
				'description' => __('Porro quae quo voluptates nobis, architecto sunt, delectus, earum temporibus eaque rem unde iste fuga. Esse quaerat quo, pariatur voluptas accusamus minima repudiandae fugit cupiditate', 'powen'),
				'image'       => esc_url(get_template_directory_uri() . '/images/slides/slide1.jpg'),
            )
         );


	$slides = powen_get_option( 'powen_slider_settings' , $powen_default_slides );

 ?>

<?php if( powen_options('show-slider') || ! isset($powen_options['show-slider']) ){ ?>

<div id="powen-main-slider" class="clear">
	<section id="slider" class="flexslider">
		<ul class='slides'>
			<?php
				if( ! empty($slides) ){
					foreach ( $slides as $slide ) {

						$slideLink		  = esc_url_raw($slide['link']);
						$slideImage		  = esc_url_raw($slide['image']);
						$slideTitle 	  = esc_attr(__($slide['title'], 'powen'));
						$slideDescription = esc_attr(__($slide['description'], 'powen'));

						echo "<li>";
						echo "<a href='{$slideLink}'>";
						echo 	"<img src='{$slideImage}' alt='image'>";
						echo 	"<div class='powen-slider-content animated slideInUp'>";
						echo 		"<h2>{$slideTitle}</h2>";
						echo 		"<p>{$slideDescription}</p>";
						echo 	"</div>";
						echo 	"</a>";
						echo "</li>";
					}
				}
			?>
		</ul>
	</section>

	<section id="carousel" class="flexslider">
		<ul class='slides'>
			<?php
				if( ! empty($slides) ){
					foreach ( $slides as $slide ) {

						$slideLink		  = esc_url_raw($slide['link']);
						$slideImage		  = esc_url_raw($slide['image']);
						$slideTitle 	  = esc_attr(__($slide['title'], 'powen'));
						$slideDescription = esc_attr(__($slide['description'], 'powen'));

						echo "<li>";
						echo "<a href='{$slideLink}'>";
						echo 	"<img src='{$slideImage}' alt='image'>";
						echo 	"<div class='powen-slider-content animated slideInUp'>";
						echo 		"<h2>{$slideTitle}</h2>";
						echo 		"<p>{$slideDescription}</p>";
						echo 	"</div>";
						echo 	"</a>";
						echo "</li>";
					}
				}
			?>
		</ul>
	</section>
</div>
<?php } ?>

