<?php

if ( ! function_exists( 'banquet_core_add_team_single_sidebar_meta_boxes' ) ) {
	/**
	 * Function that add sidebar meta boxes for team single module
	 */
	function banquet_core_add_team_single_sidebar_meta_boxes( $page, $has_single ) {
		
		if ( $page && $has_single ) {
			$section = $page->add_section_element(
				array(
					'name'       => 'qodef_team_sidebar_section',
					'title'      => esc_html__( 'Sidebar Settings', 'banquet-core' )
				)
			);
			$section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'banquet-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for team singles', 'banquet-core' ),
					'default_value' => 'no-sidebar',
					'options'       => banquet_core_get_select_type_options_pool( 'sidebar_layouts', false )
				)
			);
			
			$custom_sidebars = banquet_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$section->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_team_single_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'banquet-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on team singles', 'banquet-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'banquet-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'banquet-core' ),
					'options'     => banquet_core_get_select_type_options_pool( 'items_space' )
				)
			);
		}
	}
	
	add_action( 'banquet_core_action_after_team_meta_box_map', 'banquet_core_add_team_single_sidebar_meta_boxes', 10, 2 );
}