<?php

if ( ! function_exists( 'banquet_core_add_clients_list_variation_image_only' ) ) {
	function banquet_core_add_clients_list_variation_image_only( $variations ) {
		
		$variations['image-only'] = esc_html__( 'Image Only', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_clients_list_layouts', 'banquet_core_add_clients_list_variation_image_only' );
}