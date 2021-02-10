<?php

if ( ! function_exists( 'banquet_core_add_minimal_header_meta' ) ) {
	function banquet_core_add_minimal_header_meta( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_minimal_header_section',
				'title'      => esc_html__( 'Minimal Header', 'banquet-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'minimal',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_minimal_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'banquet-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'banquet-core' ),
				'default_value' => '',
				'options'       => banquet_core_get_select_type_options_pool( 'no_yes' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_height',
				'title'       => esc_html__( 'Header Height', 'banquet-core' ),
				'description' => esc_html__( 'Enter header height', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'banquet-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'banquet-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'banquet-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_minimal_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'banquet-core' ),
				'description' => esc_html__( 'Enter header background color', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'banquet-core' )
				)
			)
		);

	}
	
	add_action( 'banquet_core_action_after_page_header_meta_map', 'banquet_core_add_minimal_header_meta' );
}