<?php

if ( ! function_exists( 'banquet_core_add_logo_options' ) ) {
	function banquet_core_add_logo_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => BANQUET_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'logo',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Logo', 'banquet-core' ),
				'description' => esc_html__( 'Logo Settings', 'banquet-core' ),
				'layout'      => 'tabbed'
			)
		);
		
		if ( $page ) {
			
			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Logo Options', 'banquet-core' ),
					'description' => esc_html__( 'Set options for initial headers', 'banquet-core' )
				)
			);
			
			$header_tab->add_field_element(
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
			
			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_main',
					'title'         => esc_html__( 'Logo - Main', 'banquet-core' ),
					'description'   => esc_html__( 'Choose main logo image', 'banquet-core' ),
					'default_value' => defined( 'BANQUET_ASSETS_ROOT' ) ? BANQUET_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no'
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'banquet-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'banquet-core' ),
					'default_value' => defined( 'BANQUET_ASSETS_ROOT' ) ? BANQUET_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'    => 'no'
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'banquet-core' ),
					'description' => esc_html__( 'Choose light logo image', 'banquet-core' ),
					'default_value' => defined( 'BANQUET_ASSETS_ROOT' ) ? BANQUET_ASSETS_ROOT . '/img/logo_light.png' : '',
					'multiple'    => 'no'
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_header_logo_options_map', $page, $header_tab );
		}
	}
	
	add_action( 'banquet_core_action_default_options_init', 'banquet_core_add_logo_options', banquet_core_get_admin_options_map_position( 'logo' ) );
}