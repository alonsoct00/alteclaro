<?php

if ( ! function_exists( 'banquet_core_add_button_variation_textual' ) ) {
	function banquet_core_add_button_variation_textual( $variations ) {
		
		$variations['textual'] = esc_html__( 'Textual', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_button_layouts', 'banquet_core_add_button_variation_textual' );
}
