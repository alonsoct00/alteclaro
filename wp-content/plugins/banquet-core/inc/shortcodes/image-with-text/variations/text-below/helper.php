<?php

if ( ! function_exists( 'banquet_core_add_image_with_text_variation_text_below' ) ) {
	function banquet_core_add_image_with_text_variation_text_below( $variations ) {
		
		$variations['text-below'] = esc_html__( 'Text Below', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_image_with_text_layouts', 'banquet_core_add_image_with_text_variation_text_below' );
}
