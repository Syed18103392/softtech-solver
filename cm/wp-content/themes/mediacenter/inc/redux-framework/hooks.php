<?php

add_action( 'init', 											'mc_remove_redux_demo_mode' );
add_action( 'redux/page/media_center_theme_options/enqueue', 	'mc_set_redux_icon_font' );

/**
 * Header Options
 */
add_filter( 'mc_enable_search_dropdown_categories', 'rx_toggle_search_dropdown_categories' );
add_filter( 'mc_search_dropdown_categories_args', 	'rx_modify_search_dropdown_categories_args' );

/**
 * Shop Options
 */
add_filter( 'mc_is_catalog_mode_enabled',			'rx_change_catalog_mode' );
add_filter( 'mc_default_view_switcher_view',		'rx_change_default_view_switcher_view' );
add_filter( 'mc_localize_script_data',				'rx_add_remeber_user_view_to_localize_data' );
add_filter( 'mc_loop_shop_columns',					'rx_apply_product_loop_columns' );
add_filter( 'mc_loop_shop_per_page',				'rx_apply_products_per_page' );
add_filter( 'mc_enable_loop_product_animation',		'rx_toggle_product_animation' );
add_filter( 'mc_loop_product_animation',			'rx_apply_product_animation' );
add_filter( 'wp_get_attachment_image_attributes', 	'rx_apply_lazy_loading', 10, 2 );
add_filter( 'mc_show_rating_in_title',				'rx_toggle_rating_in_title' );
add_filter( 'mc_layout_args_products-archive-page',	'rx_apply_shop_page_layout' );
add_filter( 'mc_layout_args_single-product-page',	'rx_apply_single_product_layout' );
add_filter( 'mc_product_comparison_page_id',		'rx_apply_product_comparison_page_id' );