<?php

if ( ! function_exists( 'banquet_core_add_page_logo_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_page_logo_meta_box( $page ) {
		
		if ( $page ) {
			
			$logo_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-logo',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Logo Settings', 'banquet-core' ),
					'description' => esc_html__( 'Logo settings', 'banquet-core' )
				)
			);
			
			$header_logo_section = $logo_tab->add_section_element(
				array(
					'name'       => 'qodef_header_logo_section',
					'title'      => esc_html__( 'Header Logo Options', 'banquet-core' ),
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_height',
					'title'       => esc_html__( 'Logo Height', 'banquet-core' ),
					'description' => esc_html__( 'Enter Logo Height', 'banquet-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'banquet-core' )
					)
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_main',
					'title'       => esc_html__( 'Logo - Main', 'banquet-core' ),
					'description' => esc_html__( 'Choose main logo image', 'banquet-core' ),
					'multiple'    => 'no'
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'banquet-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'banquet-core' ),
					'multiple'    => 'no'
				)
			);
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'banquet-core' ),
					'description' => esc_html__( 'Choose light logo image', 'banquet-core' ),
					'multiple'    => 'no'
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_page_logo_meta_map', $logo_tab );
		}
	}
	
	add_action( 'banquet_core_action_after_general_meta_box_map', 'banquet_core_add_page_logo_meta_box' );
}