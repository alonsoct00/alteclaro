<?php
if ( ! function_exists( 'banquet_core_dependency_for_top_area_options' ) ) {
	function banquet_core_dependency_for_top_area_options() {
		$dependency_options = apply_filters( 'banquet_core_filter_top_area_hide_option', $hide_dep_options = array() );

		return $dependency_options;
	}
}

if ( ! function_exists( 'banquet_core_register_top_area_header_areas' ) ) {
	function banquet_core_register_top_area_header_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-top-area-left',
				'name'          => esc_html__( 'Header Top Area - Left', 'banquet-core' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left side in top header area', 'banquet-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'qodef-top-area-right',
				'name'          => esc_html__( 'Header Top Area - Right', 'banquet-core' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right side in top header area', 'banquet-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
	}

	add_action( 'banquet_core_action_additional_header_widgets_area', 'banquet_core_register_top_area_header_areas' );
}

if ( ! function_exists( 'banquet_core_set_top_area_header_widget_area' ) ) {
	function banquet_core_set_top_area_header_widget_area( $widget_area_map ) {
		
		if ( $widget_area_map['header_layout'] === 'top-area-left' ) {
			$widget_area_map['is_enabled']          = true;
			$widget_area_map['default_widget_area'] = 'qodef-top-area-left';
			$widget_area_map['custom_widget_area']  = '';
		} else if ( $widget_area_map['header_layout'] === 'top-area-right' ) {
			$widget_area_map['is_enabled']          = true;
			$widget_area_map['default_widget_area'] = 'qodef-top-area-right';
			$widget_area_map['custom_widget_area']  = '';
		}
		
		return $widget_area_map;
	}
	
	add_filter( 'banquet_core_filter_header_widget_area', 'banquet_core_set_top_area_header_widget_area' );
}