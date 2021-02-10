<?php

if ( ! function_exists( 'banquet_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function banquet_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'banquet_filter_mobile_header_template', banquet_get_template_part( 'mobile-header', 'templates/mobile-header' ) );
	}
	
	add_action( 'banquet_action_page_header_template', 'banquet_load_page_mobile_header' );
}

if ( ! function_exists( 'banquet_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function banquet_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'banquet_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'banquet' ) ) );
		
		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}
	
	add_action( 'banquet_action_after_include_modules', 'banquet_register_mobile_navigation_menus' );
}