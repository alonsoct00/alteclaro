<?php

if ( ! function_exists( 'banquet_core_add_icon_with_text_variation_before_title' ) ) {
	function banquet_core_add_icon_with_text_variation_before_title( $variations ) {
		
		$variations['before-title'] = esc_html__( 'Before Title', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_icon_with_text_layouts', 'banquet_core_add_icon_with_text_variation_before_title' );
}
