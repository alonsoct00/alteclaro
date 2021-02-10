<?php

if ( ! function_exists( 'banquet_core_add_accordion_variation_simple' ) ) {
	function banquet_core_add_accordion_variation_simple( $variations ) {
		
		$variations['simple'] = esc_html__( 'Simple', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_accordion_layouts', 'banquet_core_add_accordion_variation_simple' );
}
