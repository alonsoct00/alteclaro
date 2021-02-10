<?php

if ( ! function_exists( 'banquet_core_nav_menu_options' ) ) {
	function banquet_core_nav_menu_options( $page ) {
		
		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'  => 'qodef_nav_menu_section',
					'title' => esc_html__( 'Nav Menu', 'banquet-core' )
				)
			);
			
			$section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_wide_dropdown_full_width',
					'title'         => esc_html__( 'Wide Dropdown Full Width', 'banquet-core' ),
					'default_value' => 'yes'
				)
			);

			$section_dropdown_content = $section->add_section_element(
				array(
					'name'       => 'qodef_wide_dropdown_content_section',
					'title'      => esc_html__( 'Wide Dropdown Full Width Section', 'banquet-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_wide_dropdown_full_width' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);

			$row_dropdown_content = $section_dropdown_content->add_row_element(
				array(
					'name'       => 'qodef_wide_dropdown_content_row',
					'title'      => esc_html__( 'Wide Dropdown Full Width Settings', 'banquet-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_wide_dropdown_full_width' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$row_dropdown_content->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_wide_dropdown_content_grid',
					'title'         => esc_html__( 'Wide Dropdown Content In Grid', 'banquet-core' ),
					'default_value' => 'yes',
					'args'       => array(
						'col_width' => 6
					)
				)
			);
			
			$row_dropdown_content->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_dropdown_appearance',
					'title'         => esc_html__( 'Main Dropdown Menu Appearance', 'banquet-core' ),
					'default_value' => 'default',
					'options'		=> array(
						'default'			=> esc_html__( 'Default', 'banquet-core' ),
						'animate-height'	=> esc_html__( 'Animate Height', 'banquet-core' ),
					),
					'args'       => array(
						'col_width' => 6
					)
				)
			);


			$nav_menu_typography_section = $page->add_section_element(
				array(
					'name'       => 'qodef_nav_menu_typography_section',
					'title'      => esc_html__( 'Nav Menu Typography', 'banquet-core' )
				)
			);

			$first_level_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'       => 'qodef_first_level_typography_row',
					'title'      => esc_html__( 'Nav First Level Typography', 'banquet-core' )
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_1st_lvl_color',
					'title'         => esc_html__( 'Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_1st_lvl_hover_color',
					'title'         => esc_html__( 'Hover Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_1st_lvl_active_color',
					'title'         => esc_html__( 'Active Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'font',
					'name'          => 'qodef_nav_1st_lvl_font_family',
					'title'         => esc_html__( 'Font Family', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_1st_lvl_font_size',
					'title'         => esc_html__( 'Font Size', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_1st_lvl_line_height',
					'title'         => esc_html__( 'Line Height', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_1st_lvl_letter_spacing',
					'title'         => esc_html__( 'Letter Spacing', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_1st_lvl_font_weight',
					'title'         => esc_html__( 'Font Weight', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_1st_lvl_text_transform',
					'title'         => esc_html__( 'Text Transform', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_1st_lvl_font_style',
					'title'         => esc_html__( 'Font Style', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_1st_lvl_margin',
					'title'         => esc_html__( 'Margin Left/Right', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$first_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_1st_lvl_padding',
					'title'         => esc_html__( 'Padding Left/Right', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);


			$second_level_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'       => 'qodef_second_level_typography_row',
					'title'      => esc_html__( 'Nav Second Level Typography', 'banquet-core' )
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_2nd_lvl_color',
					'title'         => esc_html__( 'Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_2nd_lvl_hover_color',
					'title'         => esc_html__( 'Hover Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_2nd_lvl_active_color',
					'title'         => esc_html__( 'Active Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'font',
					'name'          => 'qodef_nav_2nd_lvl_font_family',
					'title'         => esc_html__( 'Font Family', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_2nd_lvl_font_size',
					'title'         => esc_html__( 'Font Size', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_2nd_lvl_line_height',
					'title'         => esc_html__( 'Line Height', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_2nd_lvl_letter_spacing',
					'title'         => esc_html__( 'Letter Spacing', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_2nd_lvl_font_weight',
					'title'         => esc_html__( 'Font Weight', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_2nd_lvl_text_transform',
					'title'         => esc_html__( 'Text Transform', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$second_level_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_2nd_lvl_font_style',
					'title'         => esc_html__( 'Font Style', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_wide_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'       => 'qodef_second_level_wide_typography_row',
					'title'      => esc_html__( 'Nav Second Level Wide Typography', 'banquet-core' )
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_2nd_lvl_wide_color',
					'title'         => esc_html__( 'Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_2nd_lvl_wide_hover_color',
					'title'         => esc_html__( 'Hover Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_2nd_lvl_wide_active_color',
					'title'         => esc_html__( 'Active Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'font',
					'name'          => 'qodef_nav_2nd_lvl_wide_font_family',
					'title'         => esc_html__( 'Font Family', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_2nd_lvl_wide_font_size',
					'title'         => esc_html__( 'Font Size', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_2nd_lvl_wide_line_height',
					'title'         => esc_html__( 'Line Height', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_2nd_lvl_wide_letter_spacing',
					'title'         => esc_html__( 'Letter Spacing', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_2nd_lvl_wide_font_weight',
					'title'         => esc_html__( 'Font Weight', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_2nd_lvl_wide_text_transform',
					'title'         => esc_html__( 'Text Transform', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_2nd_lvl_wide_font_style',
					'title'         => esc_html__( 'Font Style', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$third_level_wide_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'       => 'qodef_third_level_wide_typography_row',
					'title'      => esc_html__( 'Nav Third Level Wide Typography', 'banquet-core' )
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_3rd_lvl_wide_color',
					'title'         => esc_html__( 'Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_3rd_lvl_wide_hover_color',
					'title'         => esc_html__( 'Hover Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => 'qodef_nav_3rd_lvl_wide_active_color',
					'title'         => esc_html__( 'Active Color', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'font',
					'name'          => 'qodef_nav_3rd_lvl_wide_font_family',
					'title'         => esc_html__( 'Font Family', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_3rd_lvl_wide_font_size',
					'title'         => esc_html__( 'Font Size', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_3rd_lvl_wide_line_height',
					'title'         => esc_html__( 'Line Height', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_nav_3rd_lvl_wide_letter_spacing',
					'title'         => esc_html__( 'Letter Spacing', 'banquet-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_3rd_lvl_wide_font_weight',
					'title'         => esc_html__( 'Font Weight', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_3rd_lvl_wide_text_transform',
					'title'         => esc_html__( 'Text Transform', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_nav_3rd_lvl_wide_font_style',
					'title'         => esc_html__( 'Font Style', 'banquet-core' ),
					'options'		=>  banquet_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
		}
	}
	
	add_action( 'banquet_core_action_after_header_options_map', 'banquet_core_nav_menu_options', 13 );
}