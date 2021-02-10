<?php

if ( ! function_exists( 'banquet_core_add_banner_variation_link_overlay' ) ) {
	function banquet_core_add_banner_variation_link_overlay( $variations ) {
		
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_banner_layouts', 'banquet_core_add_banner_variation_link_overlay' );
}
