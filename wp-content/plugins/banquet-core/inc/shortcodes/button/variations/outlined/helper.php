<?php

if ( ! function_exists( 'banquet_core_add_button_variation_outlined' ) ) {
	function banquet_core_add_button_variation_outlined( $variations ) {
		
		$variations['outlined'] = esc_html__( 'Outlined', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_button_layouts', 'banquet_core_add_button_variation_outlined' );
}
