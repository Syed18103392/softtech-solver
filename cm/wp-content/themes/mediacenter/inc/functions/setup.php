<?php
/**
 * MediaCenter setup functions
 *
 * @package mediacenter
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @see mc_content_width()
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 810;
}

/**
 * Assign the MediaCenter version to a var
 */
$theme 					= wp_get_theme();
$mc_version 			= $theme['Version'];

/**
 * Enables template debug mode
 */
function mc_template_debug_mode() {
	if ( ! defined( 'MC_TEMPLATE_DEBUG_MODE' ) ) {
		$status_options = get_option( 'woocommerce_status_options', array() );
		if ( ! empty( $status_options['template_debug_mode'] ) && current_user_can( 'manage_options' ) ) {
			define( 'MC_TEMPLATE_DEBUG_MODE', true );
		} else {
			define( 'MC_TEMPLATE_DEBUG_MODE', false );
		}
	}
}

/**
 * Get other templates (e.g. product attributes) passing attributes and including the file.
 *
 * @access public
 * @param string $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return void
 */
function mc_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}
	
	$located = mc_locate_template( $template_name, $template_path, $default_path );
	
	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}
	
	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'mc_get_template', $located, $template_name, $args, $template_path, $default_path );
	
	do_action( 'mc_before_template_part', $template_name, $template_path, $located, $args );
	
	include( $located );
	
	do_action( 'mc_after_template_part', $template_name, $template_path, $located, $args );
}

/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *		yourtheme		/	$template_path	/	$template_name
 *		yourtheme		/	$template_name
 *		$default_path	/	$template_name
 *
 * @access public
 * @param string $template_name
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return string
 */
function mc_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = 'templates/';
	}
	
	if ( ! $default_path ) {
		$default_path = 'templates/';
	}
	
	// Look within passed path within the theme - this is priority
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name
		)
	);
	
	// Get default template
	if ( ! $template || MC_TEMPLATE_DEBUG_MODE ) {
		$template = $default_path . $template_name;
	}
	
	// Return what we found
	return apply_filters( 'mc_locate_template', $template, $template_name, $template_path );
}