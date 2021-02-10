<?php

if ( ! function_exists( 'banquet_core_add_pricing_table_variation_standard' ) ) {
	function banquet_core_add_pricing_table_variation_standard( $variations ) {
		
		$variations['standard'] = esc_html__( 'Standard', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_pricing_table_layouts', 'banquet_core_add_pricing_table_variation_standard' );
}
