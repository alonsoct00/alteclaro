<?php

if ( ! function_exists( 'banquet_core_add_social_share_variation_text' ) ) {
	function banquet_core_add_social_share_variation_text( $variations ) {
		
		$variations['text'] = esc_html__( 'Text', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_social_share_layouts', 'banquet_core_add_social_share_variation_text' );
}
