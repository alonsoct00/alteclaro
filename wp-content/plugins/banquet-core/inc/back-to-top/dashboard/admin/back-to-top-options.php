<?php

if ( ! function_exists( 'banquet_core_add_back_to_top_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_back_to_top_options( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_back_to_top',
					'title'         => esc_html__( 'Enable Back to Top', 'banquet-core' ),
					'default_value' => 'yes'
				)
			);
		}
	}
	
	add_action( 'banquet_core_action_after_general_options_map', 'banquet_core_add_back_to_top_options' );
}