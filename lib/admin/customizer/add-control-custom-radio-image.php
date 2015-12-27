<?php
/**
 * Customizer: Add Control: Custom: Radio Image
 *
 * This file demonstrates how to add a custom radio-image control to the Customizer.
 *
 * @package code-examples
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

/**
 * Theme Options Customizer Implementation
 *
 * Implement the Theme Customizer for Theme Settings.
 *
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 *
 * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
 */
function powen_register_customizer_control_custom_radio_image( $wp_customize ){
    /*
     * Failsafe is safe
     */
    if ( ! isset( $wp_customize ) ) {
        return;
    }

    /**
     * Create a Radio-Image control
     *
     * This class incorporates code from the Kirki Customizer Framework and from a tutorial
     * written by Otto Wood.
     *
     * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
     * is licensed under the terms of the GNU GPL, Version 2 (or later).
     *
     * @link https://github.com/reduxframework/kirki/
     * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
     */
    class Powen_Custom_Radio_Image_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'radio-image';

        /**
         * Enqueue scripts and styles for the custom control.
         *
         * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
         *
         * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
         * at 'customize_controls_print_styles'.
         *
         * @access public
         */
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-button' );
        }

        /**
         * Render the control to be displayed in the Customizer.
         */
        public function render_content() {
            if ( empty( $this->choices ) ) {
                return;
            }

            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title">
                <?php echo esc_attr( $this->label ); ?>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
            </span>
            <div id="input_<?php echo $this->id; ?>" class="image">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                        <label for="<?php echo $this->id . $value; ?>">
                            <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                        </label>
                    </input>
                <?php endforeach; ?>
            </div>
            <script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
            <?php
        }
    }


    /**
     * Radio Image control.
     *
     * - Control: Radio Image
     * - Setting: Blog Layout
     * - Sanitization: select
     *
     * Register "Powen_Custom_Radio_Image_Control" to be  used to configure
     * the Blog Posts Index Layout setting.
     *
     * @uses $wp_customize->add_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
     * @link $wp_customize->add_control() https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
     */
    //Post Layouts
    $wp_customize->add_section( 'powen_post_layouts_section' , array(
      'title'      =>  __( 'Post Layouts', 'powen-lite' ),
      'capability' => 'edit_theme_options',
      'panel'      => 'powen_content_pannel',
    ) );

    $wp_customize->add_setting( 'powen_mod[post_layout]', array(
      'sanitize_callback' => 'sanitize_text_field',
      'capability'        => 'edit_theme_options',
    ) );

    $wp_customize->add_control( new Powen_Custom_Radio_Image_Control( $wp_customize, 'powen_mod[post_layout]', array(
      'label'    =>   __( 'Post Layout', 'powen-lite' ),
      'section'  =>  'powen_post_layouts_section',
      'settings' =>  'powen_mod[post_layout]',
      'default'  =>  'center',
      'choices'  => array(
        'left'   => POWEN_URI . '/images/layouts/left.png',
        'center' => POWEN_URI . '/images/layouts/center.png',
        'right'  => POWEN_URI . '/images/layouts/right.png',
      ),
    ) ) );

    $wp_customize->add_setting( 'powen_mod[image_size]', array(
      'sanitize_callback' => 'sanitize_text_field',
      'capability'        => 'edit_theme_options',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[image_size]', array(
      'label'    =>   __( 'Image Size', 'powen-lite' ),
      'type'     => 'select',
      'section'  =>  'powen_post_layouts_section',
      'settings' =>  'powen_mod[image_size]',
      'default'  =>  'large',
      'choices'  =>  powen_get_image_size()
    ) ) );
}

// Settings API options initilization and validation
add_action( 'customize_register', 'powen_register_customizer_control_custom_radio_image' );