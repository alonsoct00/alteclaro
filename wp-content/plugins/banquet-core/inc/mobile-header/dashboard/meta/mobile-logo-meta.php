<?php

if ( ! function_exists( 'banquet_core_add_page_mobile_logo_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_page_mobile_logo_meta_box( $logo_tab ) {
		
		if ( $logo_tab ) {
			
			$mobile_header_logo_section = $logo_tab->add_section_element(
				array(
					'name'       => 'qodef_mobile_header_logo_section',
					'title'      => esc_html__( 'Mobile Header Logo Options', 'banquet-core' ),
				)
			);
			
			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'banquet-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'banquet-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'banquet-core' )
					)
				)
			);
			
			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_mobile_logo_main',
					'title'       => esc_html__( 'Mobile Logo - Main', 'banquet-core' ),
					'description' => esc_html__( 'Choose main mobile logo image', 'banquet-core' ),
					'multiple'    => 'no'
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_page_mobile_logo_meta_map', $mobile_header_logo_section );
		}
	}
	
	add_action( 'banquet_core_action_after_page_logo_meta_map', 'banquet_core_add_page_mobile_logo_meta_box' );
}