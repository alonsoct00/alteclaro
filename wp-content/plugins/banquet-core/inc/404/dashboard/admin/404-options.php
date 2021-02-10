<?php

if ( ! function_exists( 'banquet_core_add_404_page_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_404_page_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => BANQUET_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => '404',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( '404', 'banquet-core' ),
				'description' => esc_html__( 'Global settings related to 404 page', 'banquet-core' )
			)
		);
		
		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'color',
					'name'          => '404_menu_area_background_color_header',
					'title'         => esc_html__( 'Background Color', 'banquet-core' ),
					'description'   => esc_html__( 'Choose a background color for header area', 'banquet-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => '404_menu_area_header_height',
					'title'       => esc_html__( 'Header Height', 'banquet-core' ),
					'description' => esc_html__( 'Enter header height', 'banquet-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'banquet-core' )
					)
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_404_page_title',
					'title'         => esc_html__( 'Enable Page Title', 'banquet-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page title on 404 page', 'banquet-core' ),
					'default_value' => 'no'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_404_page_footer',
					'title'         => esc_html__( 'Enable Page Footer', 'banquet-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page footer on 404 page', 'banquet-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_404_page_background_color',
					'title'       => esc_html__( 'Background Color', 'banquet-core' ),
					'description' => esc_html__( 'Enter 404 page area background color', 'banquet-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_404_page_background_image',
					'title'       => esc_html__( 'Background Image', 'banquet-core' ),
					'description' => esc_html__( 'Enter 404 page area background image', 'banquet-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_404_page_title',
					'title'      => esc_html__( 'Title Label', 'banquet-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_404_page_title_color',
					'title'      => esc_html__( 'Title Color', 'banquet-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_404_page_text',
					'title'      => esc_html__( 'Text Label', 'banquet-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_404_page_text_color',
					'title'      => esc_html__( 'Text Color', 'banquet-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_404_page_button_text',
					'title'      => esc_html__( 'Button Text', 'banquet-core' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_404_page_options_map', $page );
		}
	}
	
	add_action( 'banquet_core_action_default_options_init', 'banquet_core_add_404_page_options', banquet_core_get_admin_options_map_position( '404' ) );
}