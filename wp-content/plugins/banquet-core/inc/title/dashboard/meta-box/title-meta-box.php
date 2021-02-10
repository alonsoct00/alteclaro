<?php

if ( ! function_exists( 'banquet_core_add_page_title_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_page_title_meta_box( $page ) {

		if ( $page ) {

			$title_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-title',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Title Settings', 'banquet-core' ),
					'description' => esc_html__( 'Title layout settings', 'banquet-core' )
				)
			);

			$title_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_title',
					'title'       => esc_html__( 'Enable Page Title', 'banquet-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page title', 'banquet-core' ),
					'options'     => banquet_core_get_select_type_options_pool( 'no_yes' )
				)
			);

			$page_title_section = $title_tab->add_section_element(
				array(
					'name'       => 'qodef_page_title_section',
					'title'      => esc_html__( 'Title Area', 'banquet-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_title' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_title_layout',
					'title'       => esc_html__( 'Title Layout', 'banquet-core' ),
					'description' => esc_html__( 'Choose title layout to set for your site', 'banquet-core' ),
					'options'     => apply_filters( 'banquet_core_filter_title_layout_options', $layouts = array( '' => esc_html__( 'Default', 'banquet-core' ) ) )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_page_title_area_in_grid',
					'title'       => esc_html__( 'Page Title In Grid', 'banquet-core' ),
					'description' => esc_html__( 'Enabling this option will set page title area to be in grid', 'banquet-core' ),
					'options'     => banquet_core_get_select_type_options_pool( 'no_yes' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height',
					'title'       => esc_html__( 'Height', 'banquet-core' ),
					'description' => esc_html__( 'Enter title height', 'banquet-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'banquet-core' )
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_title_background_color',
					'title'       => esc_html__( 'Background Color', 'banquet-core' ),
					'description' => esc_html__( 'Enter page title area background color', 'banquet-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_title_background_image',
					'title'       => esc_html__( 'Background Image', 'banquet-core' ),
					'description' => esc_html__( 'Enter page title area background image', 'banquet-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_page_title_background_image_behavior',
					'title'      => esc_html__( 'Background Image Behavior', 'banquet-core' ),
					'options'    => array(
						''           => esc_html__( 'Default', 'banquet-core' ),
						'responsive' => esc_html__( 'Set Responsive Image', 'banquet-core' ),
						'parallax'   => esc_html__( 'Set Parallax Image', 'banquet-core' )
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_color',
					'title'      => esc_html__( 'Title Color', 'banquet-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_tag',
					'title'         => esc_html__( 'Title Tag', 'banquet-core' ),
					'description'   => esc_html__( 'Enabling this option will set title tag', 'banquet-core' ),
					'options'       => banquet_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'qodef_title_layout' => array(
								'values'        => array( 'standard-with-breadcrumbs', 'standard' ),
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_text_alignment',
					'title'         => esc_html__( 'Text Alignment', 'banquet-core' ),
					'options'       => array(
						''       => esc_html__( 'Default', 'banquet-core' ),
						'left'   => esc_html__( 'Left', 'banquet-core' ),
						'center' => esc_html__( 'Center', 'banquet-core' ),
						'right'  => esc_html__( 'Right', 'banquet-core' )
					),
					'default_value' => ''
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_vertical_text_alignment',
					'title'         => esc_html__( 'Vertical Text Alignment', 'banquet-core' ),
					'options'       => array(
						''              => esc_html__( 'Default', 'banquet-core' ),
						'header-bottom' => esc_html__( 'From Bottom of Header', 'banquet-core' ),
						'window-top'    => esc_html__( 'From Window Top', 'banquet-core' )
					),
					'default_value' => ''
				)
			);

			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_page_title_meta_box_map', $page_title_section );
		}
	}

	add_action( 'banquet_core_action_after_general_meta_box_map', 'banquet_core_add_page_title_meta_box' );
	add_action( 'banquet_core_action_after_portfolio_meta_box_map', 'banquet_core_add_page_title_meta_box' );
}