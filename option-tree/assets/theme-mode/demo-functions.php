<?php
/**
 * Theme Mode
 */
# add_filter( 'powen_theme_mode', '__return_false' );

/**
 * Child Theme Mode
 */
# add_filter( 'powen_child_theme_mode', '__return_false' );

/**
 * Show Settings Pages
 */
# add_filter( 'powen_show_pages', '__return_true' );

/**
 * Show Theme Options UI Builder
 */
# add_filter( 'powen_show_options_ui', '__return_true' );

/**
 * Show Settings Import
 */
# add_filter( 'powen_show_settings_import', '__return_true' );

/**
 * Show Settings Export
 */
# add_filter( 'powen_show_settings_export', '__return_true' );

/**
 * Show New Layout
 */
# add_filter( 'powen_show_new_layout', '__return_true' );

/**
 * Show Documentation
 */
# add_filter( 'powen_show_docs', '__return_true' );

/**
 * Custom Theme Option page
 */
# add_filter( 'powen_use_theme_options', '__return_true' );

/**
 * Meta Boxes
 */
# add_filter( 'powen_meta_boxes', '__return_true' );

/**
 * Allow Unfiltered HTML in textareas options
 */
# add_filter( 'powen_allow_unfiltered_html', '__return_false' );

/**
 * Loads the meta boxes for post formats
 */
# add_filter( 'powen_post_formats', '__return_true' );

/**
 * OptionTree in Theme Mode
 */
# require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
# require( trailingslashit( get_template_directory() ) . 'admin/theme-options.php' );