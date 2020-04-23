<?php
/**
 * mediacenter engine room
 *
 * @package mediacenter
 */

/**
 * Setup.
 * Load Classes. Enqueue styles, register widget regions, etc.
 */
require get_template_directory() . '/inc/functions/hooks.php';
require get_template_directory() . '/inc/functions/setup.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/functions/media.php';
require get_template_directory() . '/inc/functions/extras.php';

/**
 * Initialize Theme Options
 */
if( is_redux_activated() ) {
	require get_template_directory() . '/inc/redux-framework/mc-options.php';
	require get_template_directory() . '/inc/redux-framework/hooks.php';
	require get_template_directory() . '/inc/redux-framework/functions.php';
	require get_template_directory() . '/inc/redux-framework/header.php';
	require get_template_directory() . '/inc/redux-framework/woocommerce.php';
}

/**
 * Structure - Layout and template functions used throught the theme
 */
require get_template_directory() . '/inc/structure/hooks.php';
require get_template_directory() . '/inc/structure/layout.php';
require get_template_directory() . '/inc/structure/page.php';
require get_template_directory() . '/inc/structure/comments.php';

/**
 * Load WooCommerce compatibility files
 */
if( is_woocommerce_activated() ) {
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
	require get_template_directory() . '/inc/woocommerce/integrations.php';
}

/**
 * Load Visual Composer compatibility files
 */
if( is_visual_composer_activated() ) {
	require get_template_directory() . '/inc/visual-composer/hooks.php';
	require get_template_directory() . '/inc/visual-composer/functions.php';
}