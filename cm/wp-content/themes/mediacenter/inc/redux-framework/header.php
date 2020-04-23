<?php
/**
 * Functions for implementing Header options
 *
 * @package mediacenter
 */

if( ! function_exists( 'rx_toggle_search_dropdown_categories' ) ) {
	/**
	 * Enable/Disables search dropdown categories
	 */
	function rx_toggle_search_dropdown_categories( $enable ) {
		global $media_center_theme_options;

		if( array_key_exists ( 'display_search_categories_filter', $media_center_theme_options ) && '0' === $media_center_theme_options[ 'display_search_categories_filter' ] ) {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'rx_modify_search_dropdown_categories_args' ) ) {
	/**
	 * Implements top level or all categories option
	 */
	function rx_modify_search_dropdown_categories_args( $args ) {
		global $media_center_theme_options;

		if( array_key_exists ( 'header_search_dropdown', $media_center_theme_options ) && 'hsd1' === $media_center_theme_options[ 'header_search_dropdown' ] ) {
			$args[ 'hierarchical' ] = 1;
		} else {
			$args[ 'hierarchical' ] = 1;
			$args[ 'depth' ] 		= 1;
		}

		return $args;
	}
}