<?php

if ( ! function_exists( 'banquet_core_add_nav_menu_options' ) ) {
	function banquet_core_add_nav_menu_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'nav_menu_item' ),
				'type'  => 'nav-menu'
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-mega-menu',
					'title'      => esc_html__( 'Enable mega menu', 'banquet-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'banquet-core' )
					),
					'args'       => array(
						'depth' => 0
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef-menu-item-appearance',
					'title'      => esc_html__( 'Menu Item Appearance', 'banquet-core' ),
					'options'    => array(
						'none'      => esc_html__( 'None', 'banquet-core' ),
						'hide-item' => esc_html__( 'Hide Item', 'banquet-core' ),
						'hide-link' => esc_html__( 'Hide Link', 'banquet-core' )
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef-menu-item-icon-pack',
					'title'      => esc_html__( 'Icon Pack', 'banquet-core' ),
					'args'       => array(
						'width' => 'thin'
					)
				)
			);
		}
	}
	
	add_action( 'qode_framework_action_custom_nav_menu_fields', 'banquet_core_add_nav_menu_options' );
}