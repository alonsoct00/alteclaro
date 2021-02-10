<?php

if ( ! function_exists( 'banquet_core_add_call_to_action_variation_standard' ) ) {
	function banquet_core_add_call_to_action_variation_standard( $variations ) {
		
		$variations['standard'] = esc_html__( 'Standard', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_call_to_action_layouts', 'banquet_core_add_call_to_action_variation_standard' );
}
