<?php

/**
 * Adds Footer_Widget widget.
 */
class Powen_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'powen_social_widget', // Base ID
			__( 'Powen Social Widget', 'powen-lite' ), // Name
			apply_filters('powen_social_widget_description', array( 'description' => __( 'Shows Widget for social icons', 'powen-lite' ), ) ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'powen_widget_title', $instance['title'] ). $args['after_title'];
		}
		powen_social_media_icons();
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'powen-lite' );
		?>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Footer_Widget


// register social widget in footer
if( ! function_exists( 'powen_register_social_widget' ) ) :

	function powen_register_social_widget() {
	    register_widget( 'Powen_Social_Widget' );
	}

endif;//powen_register_social_widget

add_action( 'widgets_init', 'powen_register_social_widget' );