<?php

if ( ! function_exists( 'banquet_core_add_icon_with_text_variation_before_content' ) ) {
	function banquet_core_add_icon_with_text_variation_before_content( $variations ) {
		
		$variations['before-content'] = esc_html__( 'Before Content', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_icon_with_text_layouts', 'banquet_core_add_icon_with_text_variation_before_content' );
}
