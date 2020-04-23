<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package mediacenter
 */

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Check if Visual Composer is activated
 */
if( ! function_exists( 'is_visual_composer_activated' ) ) {
	function is_visual_composer_activated() {
		return class_exists( 'WPBakeryVisualComposerAbstract' ) ? true : false;
	}
}

/**
 * Check if Redux Framework is activated
 */
if( ! function_exists( 'is_redux_activated' ) ) {
	function is_redux_activated() {
		return class_exists( 'ReduxFrameworkPlugin' ) ? true : false;
	}	
}

/**
 * Query WooCommerce Extension Activation.
 * @var  $extension main extension class name
 * @return boolean
 */
function is_woocommerce_extension_activated( $extension ) {

	if( is_woocommerce_activated() ) {
		$is_activated = class_exists( $extension ) ? true : false;
	} else {
		$is_activated = false;
	}
	
	return $is_activated;
}

/**
 * Checks if YITH Wishlist is activated
 *
 * @return boolean
 */
if( ! function_exists( 'is_yith_wcwl_activated' ) ) {
	function is_yith_wcwl_activated() {
		return is_woocommerce_extension_activated( 'YITH_WCWL' );
	}
}

/**
 * Checks if YITH WooCompare is activated
 *
 * @return boolean
 */
if( ! function_exists( 'is_yith_woocompare_activated' ) ) {
	function is_yith_woocompare_activated() {
		return is_woocommerce_extension_activated( 'YITH_Woocompare' );
	}
}