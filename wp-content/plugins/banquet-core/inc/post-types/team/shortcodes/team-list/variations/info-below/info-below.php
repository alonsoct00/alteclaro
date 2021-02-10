<?php

if ( ! function_exists( 'banquet_core_add_team_list_variation_info_below' ) ) {
	function banquet_core_add_team_list_variation_info_below( $variations ) {
		
		$variations['info-below'] = esc_html__( 'Info Below', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_team_list_layouts', 'banquet_core_add_team_list_variation_info_below' );
}