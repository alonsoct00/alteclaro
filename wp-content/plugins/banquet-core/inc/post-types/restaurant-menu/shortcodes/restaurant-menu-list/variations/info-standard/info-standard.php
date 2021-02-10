<?php

if ( ! function_exists( 'banquet_core_add_restaurant_menu_list_variation_info_standard' ) ) {
	function banquet_core_add_restaurant_menu_list_variation_info_standard( $variations ) {
		$variations['info-standard'] = esc_html__( 'Info Standard', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_restaurant_menu_list_layouts', 'banquet_core_add_restaurant_menu_list_variation_info_standard' );
}