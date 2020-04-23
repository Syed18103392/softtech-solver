<?php

add_action( 'body_class', 'mc_apply_body_class' );

/**
 * Page Hooks and Actions
 */

add_filter( 'mc_should_hide_page_title', 'mc_should_hide_page_header' );

add_action( 'mc_page',	'mc_display_page_header', 	10 );
add_action( 'mc_page',	'mc_page_content', 			20 );