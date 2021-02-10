<?php

if ( ! function_exists( 'banquet_core_add_page_header_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_page_header_meta_box( $page ) {

		if ( $page ) {

			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Settings', 'banquet-core' ),
					'description' => esc_html__( 'Header layout settings', 'banquet-core' )
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_layout',
					'title'       => esc_html__( 'Header Layout', 'banquet-core' ),
					'description' => esc_html__( 'Choose header layout to set for your site', 'banquet-core' ),
					'args'        => array( 'images' => true ),
					'options'     => banquet_core_header_radio_to_select_options( apply_filters( 'banquet_core_filter_header_layout_option', $header_layout_options = array() ) )
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_skin',
					'title'       => esc_html__( 'Header Skin', 'banquet-core' ),
					'description' => esc_html__( 'Choose a predefined header style for header elements', 'banquet-core' ),
					'options'     => array(
						''      => esc_html__( 'Default', 'banquet-core' ),
						'none'  => esc_html__( 'None', 'banquet-core' ),
						'light' => esc_html__( 'Light', 'banquet-core' ),
						'dark'  => esc_html__( 'Dark', 'banquet-core' )
					)
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_scroll_appearance',
					'title'       => esc_html__( 'Header Scroll Appearance', 'banquet-core' ),
					'description' => esc_html__( 'Choose how header will act on scroll', 'banquet-core' ),
					'options'     => apply_filters( 'banquet_core_filter_header_scroll_appearance_option', $header_scroll_appearance_options = array( ''     => esc_html__( 'Default', 'banquet-core' ),
					                                                                                                                                   'none' => esc_html__( 'None', 'banquet-core' )
					) )
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_show_header_widget_areas',
					'title'         => esc_html__( 'Show Header Widget Areas', 'banquet-core' ),
					'description'   => esc_html__( 'Choose if you want to show or hide header widget areas', 'banquet-core' ),
					'default_value' => 'yes'
				)
			);

			$custom_sidebars = banquet_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {

				$section = $header_tab->add_section_element(
					array(
						'name'       => 'qodef_header_custom_widget_area_section',
						'dependency' => array(
							'show' => array(
								'qodef_show_header_widget_areas' => array(
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
						'name'        => 'qodef_header_custom_widget_area_one',
						'title'       => esc_html__( 'Choose Custom Header Widget Area One', 'banquet-core' ),
						'description' => esc_html__( 'Choose custom widget area to display in header widget area one', 'banquet-core' ),
						'options'     => $custom_sidebars
					)
				);
				$section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_header_custom_widget_area_two',
						'title'       => esc_html__( 'Choose Custom Header Widget Area Two', 'banquet-core' ),
						'description' => esc_html__( 'Choose custom widget area to display in header widget area two', 'banquet-core' ),
						'options'     => $custom_sidebars
					)
				);

				// Hook to include additional options after module options
				do_action( 'banquet_core_action_after_custom_widget_area_header_meta_map', $section, $custom_sidebars );
			}

			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_page_header_meta_map', $header_tab );
		}
	}

	add_action( 'banquet_core_action_after_general_meta_box_map', 'banquet_core_add_page_header_meta_box' );
	add_action( 'banquet_core_action_after_portfolio_meta_box_map', 'banquet_core_add_page_header_meta_box' );
}