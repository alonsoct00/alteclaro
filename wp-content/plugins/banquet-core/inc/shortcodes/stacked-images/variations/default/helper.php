<?php

if ( ! function_exists( 'banquet_core_add_stacked_images_variation_default' ) ) {
	function banquet_core_add_stacked_images_variation_default( $variations ) {
		
		$variations['default'] = esc_html__( 'Default', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_stacked_images_layouts', 'banquet_core_add_stacked_images_variation_default' );
}
