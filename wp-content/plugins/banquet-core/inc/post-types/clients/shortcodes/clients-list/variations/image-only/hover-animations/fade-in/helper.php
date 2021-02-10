<?php
if ( ! function_exists( 'banquet_core_filter_clients_list_image_only_fade_in' ) ) {
	function banquet_core_filter_clients_list_image_only_fade_in( $variations ) {
		
		$variations['fade-in'] = esc_html__( 'Fade In', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_clients_list_image_only_animation_options', 'banquet_core_filter_clients_list_image_only_fade_in' );
}