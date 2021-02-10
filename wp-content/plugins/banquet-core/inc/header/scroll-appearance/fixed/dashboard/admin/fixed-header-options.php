<?php

if ( ! function_exists( 'banquet_core_add_fixed_header_options' ) ) {
	function banquet_core_add_fixed_header_options( $page ) {
	
	}
	
	add_action( 'banquet_core_action_after_header_options_map', 'banquet_core_add_fixed_header_options' );
}