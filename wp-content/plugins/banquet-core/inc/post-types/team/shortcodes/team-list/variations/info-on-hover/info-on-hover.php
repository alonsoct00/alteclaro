<?php

if ( ! function_exists( 'banquet_core_add_team_list_variation_info_on_hover' ) ) {
	function banquet_core_add_team_list_variation_info_on_hover( $variations ) {
		
		$variations['info-on-hover'] = esc_html__( 'Info on Hover', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_team_list_layouts', 'banquet_core_add_team_list_variation_info_on_hover' );
}