<?php

if ( ! function_exists( 'banquet_core_add_blog_list_variation_standard' ) ) {
	function banquet_core_add_blog_list_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_blog_list_layouts', 'banquet_core_add_blog_list_variation_standard' );
}

if ( ! function_exists( 'banquet_core_load_blog_list_variation_standard_assets' ) ) {
	function banquet_core_load_blog_list_variation_standard_assets( $is_enabled, $params ) {
		
		if ( $params['layout'] === 'standard' ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
	
	add_filter( 'banquet_core_filter_load_blog_list_assets', 'banquet_core_load_blog_list_variation_standard_assets', 10, 2 );
}