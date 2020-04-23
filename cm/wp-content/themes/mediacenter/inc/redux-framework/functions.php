<?php
/**
 * All functions related to Redux Framework
 */

/**
 * Font Awesome for Redux Framework
 * 
 * @return void
 */
if( ! function_exists( 'mc_set_redux_icon_font' ) ) {
	function mc_set_redux_icon_font() {
		wp_register_style(
	        'redux-font-awesome',
	        get_template_directory_uri() . '/assets/css/font-awesome.min.css',
	        array(),
	        time(),
	        'all'
	    );  
	    wp_enqueue_style( 'redux-font-awesome' );
	}
}

/**
 * Remove redux framework demo mode
 *
 * @return void
 */
if( ! function_exists( 'mc_remove_redux_demo_mode' ) ) {
	function mc_remove_redux_demo_mode() {
    	remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    	remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
	}
}