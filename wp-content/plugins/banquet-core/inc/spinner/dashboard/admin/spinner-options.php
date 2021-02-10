<?php

if ( ! function_exists( 'banquet_core_add_page_spinner_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_page_spinner_options( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_spinner',
					'title'         => esc_html__( 'Enable Page Spinner', 'banquet-core' ),
					'description'   => esc_html__( 'Enable Page Spinner Effect', 'banquet-core' ),
					'default_value' => 'no'
				)
			);
			
			$spinner_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_spinner_section',
					'title'      => esc_html__( 'Page Spinner Section', 'banquet-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_spinner' => array(
								'values'        => 'yes',
								'default_value' => 'no'
							)
						)
					)
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_spinner_type',
					'title'         => esc_html__( 'Select Page Spinner Type', 'banquet-core' ),
					'description'   => esc_html__( 'Choose a page spinner animation style', 'banquet-core' ),
					'options'       => apply_filters( 'banquet_core_filter_page_spinner_layout_options', array() ),
					'default_value' => apply_filters( 'banquet_core_filter_page_spinner_default_layout_option', 'predefined' ),
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_background_color',
					'title'       => esc_html__( 'Spinner Background Color', 'banquet-core' ),
					'description' => esc_html__( 'Choose the spinner background color', 'banquet-core' )
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_color',
					'title'       => esc_html__( 'Spinner Color', 'banquet-core' ),
					'description' => esc_html__( 'Choose the spinner color', 'banquet-core' )
				)
			);
			
			$spinner_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_page_spinner_text',
					'title'         => esc_html__( 'Spinner Text', 'banquet-core' ),
					'description'   => esc_html__( 'Choose the spinner text', 'banquet-core' ),
					'default_value' => 'Banquet',
					'dependency'    => array(
						'show' => array(
							'qodef_page_spinner_type' => array(
								'values'        => 'predefined',
								'default_value' => 'no'
							)
						)
					)
				 
				)
			);
		}
	}
	
	add_action( 'banquet_core_action_after_general_options_map', 'banquet_core_add_page_spinner_options' );
}