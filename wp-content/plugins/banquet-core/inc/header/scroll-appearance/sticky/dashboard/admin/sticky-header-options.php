<?php

if ( ! function_exists( 'banquet_core_add_sticky_header_options' ) ) {
	function banquet_core_add_sticky_header_options( $page ) {
		
		$page->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_sticky_header_scroll_amount',
				'title'       => esc_html__( 'Sticky Scroll Amount', 'banquet-core' ),
				'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'banquet-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'banquet-core' )
				),
				'dependency' => array(
					'show' => array(
						'qodef_header_scroll_appearance' => array(
							'values' => 'sticky',
							'default_value' => ''
						)
					)
				)
			)
		);
	}
	
	add_action( 'banquet_core_action_after_header_options_map', 'banquet_core_add_sticky_header_options', 9);
}