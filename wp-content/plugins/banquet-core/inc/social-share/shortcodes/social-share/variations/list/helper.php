<?php

if ( ! function_exists( 'banquet_core_add_social_share_variation_list' ) ) {
	function banquet_core_add_social_share_variation_list( $variations ) {
		
		$variations['list'] = esc_html__( 'List', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_social_share_layouts', 'banquet_core_add_social_share_variation_list' );
}
