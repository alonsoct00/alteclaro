<?php

if ( ! function_exists( 'banquet_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_general_page_meta_box( $page ) {
		
		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'banquet-core' ),
				'description' => esc_html__( 'General page layout settings', 'banquet-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'banquet-core' ),
				'description' => esc_html__( 'Set Background Color for Website', 'banquet-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'banquet-core' ),
				'description' => esc_html__( 'Set Background Image for Website', 'banquet-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Repeat', 'banquet-core' ),
				'description' => esc_html__( 'Set Background Repeat for Website', 'banquet-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'banquet-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'banquet-core' ),
					'repeat'    => esc_html__( 'Repeat', 'banquet-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'banquet-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'banquet-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Size', 'banquet-core' ),
				'description' => esc_html__( 'Set Background Size for Website', 'banquet-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'banquet-core' ),
					'contain' => esc_html__( 'Contain', 'banquet-core' ),
					'cover'   => esc_html__( 'Cover', 'banquet-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Attachment', 'banquet-core' ),
				'description' => esc_html__( 'Set Background Attachment for Website', 'banquet-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'banquet-core' ),
					'fixed'  => esc_html__( 'Fixed', 'banquet-core' ),
					'scroll' => esc_html__( 'Scroll', 'banquet-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'banquet-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'banquet-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'banquet-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'banquet-core' )
			)
		);


		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_page_borders',
				'title'         => esc_html__( 'Page Left/Right Borders', 'banquet-core' ),
				'description'   => esc_html__( 'Enabling this option will display left and right borders for Website', 'banquet-core' ),
				'default_value' => '',
				'options'       => banquet_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$left_right_borders_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_left_right_borders_section',
				'title'      => esc_html__( 'Borders Section', 'banquet-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_page_borders' => array(
							'values'        => 'yes',
							'default_value' => ''
						)
					)
				)
			)
		);

		$left_right_borders_section->add_field_element(
			array(
				'field_type'    => 'color',
				'name'          => 'qodef_page_borders_color',
				'title'         => esc_html__( 'Page Borders Color', 'banquet-core' ),
				'description'   => esc_html__( 'Set borders color', 'banquet-core' )
			)
		);

		$left_right_borders_section->add_field_element(
			array(
				'field_type'    => 'text',
				'name'          => 'qodef_page_borders_offset',
				'title'         => esc_html__( 'Page Border Offset', 'banquet-core' ),
				'description'   => esc_html__( 'Set border offset for left/right border', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'banquet-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'banquet-core' ),
				'description'   => esc_html__( 'Set Boxed Layout', 'banquet-core' ),
				'default_value' => 'no'
			)
		);
		
		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'banquet-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'banquet-core' ),
				'description' => esc_html__( 'Set Boxed Background Color', 'banquet-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'banquet-core' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'banquet-core' ),
				'default_value' => '',
				'options'       => banquet_core_get_select_type_options_pool( 'yes_no' )
			)
		);
		
		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'hide' => array(
						'qodef_passepartout' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'banquet-core' ),
				'description' => esc_html__( 'Choose background color for passepartout', 'banquet-core' )
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'banquet-core' ),
				'description' => esc_html__( 'Set background image for passepartout', 'banquet-core' )
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'banquet-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'banquet-core' )
				)
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'banquet-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'banquet-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'banquet-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'banquet-core' ),
				'options'     => banquet_core_get_select_type_options_pool( 'content_width' )
			)
		);
		
		$general_tab->add_field_element( array(
			'field_type'    => 'yesno',
			'default_value' => 'no',
			'name'          => 'qodef_content_behind_header',
			'title'         => esc_html__( 'Always put content behind header', 'banquet-core' ),
			'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'banquet-core' ),
		) );

		$general_tab->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_show_content_side_widget_areas',
				'title'         => esc_html__( 'Show Content Side Widget Areas', 'banquet-core' ),
				'description'   => esc_html__( 'Choose if you want to show or hide content side widget areas', 'banquet-core' ),
				'default_value' => 'yes'
			)
		);
		$custom_sidebars = banquet_core_get_custom_sidebars();
		if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {

			$section = $general_tab->add_section_element(
				array(
					'name'       => 'qodef_content_custom_widget_area_section',
					'dependency' => array(
						'show' => array(
							'qodef_show_content_side_widget_areas' => array(
								'values'        => 'yes',
								'default_value' => 'yes'
							)
						)
					)
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_content_custom_widget_area_left',
					'title'       => esc_html__( 'Choose Custom Content Widget Area Left', 'banquet-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in content widget area left', 'banquet-core' ),
					'options'     => $custom_sidebars
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_content_custom_widget_area_right',
					'title'       => esc_html__( 'Choose Custom Content Widget Area Right', 'banquet-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in content widget area right', 'banquet-core' ),
					'options'     => $custom_sidebars
				)
			);
		}
		
		// Hook to include additional options after module options
		do_action( 'banquet_core_action_after_general_page_meta_box_map', $general_tab );
	}
	
	add_action( 'banquet_core_action_after_general_meta_box_map', 'banquet_core_add_general_page_meta_box', 9 );
	add_action( 'banquet_core_action_after_portfolio_meta_box_map', 'banquet_core_add_general_page_meta_box' );
}