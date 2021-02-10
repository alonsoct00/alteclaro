<?php

if ( ! function_exists( 'banquet_core_add_social_share_variation_dropdown' ) ) {
	function banquet_core_add_social_share_variation_dropdown( $variations ) {
		
		$variations['dropdown'] = esc_html__( 'Dropdown', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_social_share_layouts', 'banquet_core_add_social_share_variation_dropdown' );
}
