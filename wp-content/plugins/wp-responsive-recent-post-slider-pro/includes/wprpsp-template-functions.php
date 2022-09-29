<?php
/**
 * Template Functions
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Returns the path to the plugin templates directory
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.7
 */
function wprpsp_get_templates_dir() {
	return apply_filters( 'wprpsp_template_dir', WPRPSP_DIR . '/templates' );
}

/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *	yourtheme/$template_path/$template_name
 *	yourtheme/$template_name
 *	$default_path/$template_name
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.7
 * 
 */
function wprpsp_locate_template( $template_name, $template_path = '', $default_path = '', $default_template = '' ) {

	if ( ! $template_path ) {
		$template_path = trailingslashit( 'wp-responsive-recent-post-slider-pro' );
	}

	if ( ! $default_path ) {
		$default_path = trailingslashit( wprpsp_get_templates_dir() );
	}

	// Look within passed path within the theme - this is priority.
	$template_lookup = array(
							trailingslashit( $template_path ) . $template_name,
						);

	// Adding default path to check
	if( !empty($default_template) ) {
		$template_lookup[] = trailingslashit( $template_path ) . $default_template;
	}

	// Look within passed path within the theme - this is priority
	$template = locate_template( $template_lookup );

	// Look within plugin template folder
	if ( !$template || WPOS_TEMPLATE_DEBUG_MODE ) {
		$template = $default_path . $template_name;
	}

	// If template does not exist then load passed $default_template
	if ( !empty($default_path) && !file_exists($template) ) {
		$template = $default_path . $default_template;
	}

	// Return what we found
	return apply_filters('wprpsp_locate_template', $template, $template_name, $template_path);
}

/**
 * Get other templates (e.g. attributes) passing attributes and including the file.
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.7
 */
function wprpsp_get_template( $template, $args = array(), $template_path = '', $default_path = '', $default_template = '' ) {

	$located = wprpsp_locate_template( $template, $template_path, $default_path, $default_template );

	if ( !file_exists( $located ) ) {
		return;
	}

	if ( $args && is_array($args) ) {
		extract( $args );
	}

	do_action( 'wprpsp_before_template_part', $template, $template_path, $located, $args );

	include( $located );

	do_action( 'wprpsp_after_template_part', $template, $template_path, $located, $args );
}

/**
 * Like wprpsp_get_template, but returns the HTML instead of outputting.
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.7
 */
function wprpsp_get_template_html( $template_name, $args = array(), $template_path = '', $default_path = '', $default_template = '' ) {
	ob_start();
	wprpsp_get_template( $template_name, $args, $template_path, $default_path, $default_template );
	return ob_get_clean();
}