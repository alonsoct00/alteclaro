<?php

if ( ! function_exists( 'banquet_core_is_back_to_top_enabled' ) ) {
	function banquet_core_is_back_to_top_enabled() {
		return banquet_core_get_post_value_through_levels( 'qodef_back_to_top' ) !== 'no';
	}
}

if ( ! function_exists( 'banquet_core_add_back_to_top_to_body_classes' ) ) {
	function banquet_core_add_back_to_top_to_body_classes( $classes ) {
		$classes[] = banquet_core_is_back_to_top_enabled() ? 'qodef-back-to-top--enabled' : '';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'banquet_core_add_back_to_top_to_body_classes' );
}

if ( ! function_exists( 'banquet_core_load_back_to_top' ) ) {
	/**
	 * Loads Back To Top HTML
	 */
	function banquet_core_load_back_to_top() {
		
		if ( banquet_core_is_back_to_top_enabled() ) {
			$parameters = array();
			
			banquet_core_template_part( 'back-to-top', 'templates/back-to-top', '', $parameters );
		}
	}
	
	add_action( 'banquet_action_before_wrapper_close_tag', 'banquet_core_load_back_to_top' );
}