<?php

if ( ! function_exists( 'banquet_core_add_button_variation_filled' ) ) {
	function banquet_core_add_button_variation_filled( $variations ) {
		
		$variations['filled'] = esc_html__( 'Filled', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_button_layouts', 'banquet_core_add_button_variation_filled' );
}
