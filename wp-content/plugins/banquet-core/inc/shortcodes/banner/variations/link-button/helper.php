<?php

if ( ! function_exists( 'banquet_core_add_banner_variation_link_button' ) ) {
	function banquet_core_add_banner_variation_link_button( $variations ) {
		
		$variations['link-button'] = esc_html__( 'Link Button', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_banner_layouts', 'banquet_core_add_banner_variation_link_button' );
}
