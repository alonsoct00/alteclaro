<?php

if ( ! function_exists( 'banquet_core_get_header_logo_image' ) ) {
	function banquet_core_get_header_logo_image() {
		$logo_height         = banquet_core_get_post_value_through_levels( 'qodef_logo_height' );
		$logo_main_image_id  = banquet_core_get_post_value_through_levels( 'qodef_logo_main' );
		$logo_dark_image_id  = banquet_core_get_post_value_through_levels( 'qodef_logo_dark' );
		$logo_light_image_id = banquet_core_get_post_value_through_levels( 'qodef_logo_light' );
		$customizer_logo     = banquet_core_get_customizer_logo();
		
		$parameters = array(
			'logo_classes'     => ! empty( $logo_height ) ? 'qodef-height--set' : 'qodef-height--not-set',
			'logo_height'      => ! empty( $logo_height ) ? 'height:' . intval( $logo_height ) . 'px' : '',
			'logo_main_image'  => '',
			'logo_dark_image'  => '',
			'logo_light_image' => '',
		);
		
		if ( ! empty( $logo_main_image_id ) ) {
			$logo_main_image_attr = array(
				'class'    => 'qodef-header-logo-image qodef--main',
				'itemprop' => 'image',
				'alt'      => esc_attr__( 'logo main', 'banquet-core' )
			);
			
			$image      = wp_get_attachment_image( $logo_main_image_id, 'full', false, $logo_main_image_attr );
			$image_html = ! empty( $image ) ? $image : qode_framework_get_image_html_from_src( $logo_main_image_id, $logo_main_image_attr );
			
			$parameters['logo_main_image'] = $image_html;
		}
		
		if ( ! empty( $logo_dark_image_id ) ) {
			$logo_dark_image_attr = array(
				'class'    => 'qodef-header-logo-image qodef--dark',
				'itemprop' => 'image',
				'alt'      => esc_attr__( 'logo dark', 'banquet-core' )
			);
			
			$parameters['logo_dark_image'] = wp_get_attachment_image( $logo_dark_image_id, 'full', false, $logo_dark_image_attr );
		}
		
		if ( ! empty( $logo_light_image_id ) ) {
			$logo_light_image_attr = array(
				'class'    => 'qodef-header-logo-image qodef--light',
				'itemprop' => 'image',
				'alt'      => esc_attr__( 'logo main', 'banquet-core' )
			);
			
			$parameters['logo_light_image'] = wp_get_attachment_image( $logo_light_image_id, 'full', false, $logo_light_image_attr );
		}
		
		if ( ! empty( $logo_main_image_id ) || ! empty( $logo_dark_image_id ) || ! empty( $logo_light_image_id ) ) {
			banquet_core_template_part( 'header/templates', 'parts/logo', '', $parameters );
		} else if ( ! empty( $customizer_logo ) ) {
			echo qode_framework_wp_kses_html( 'html', $customizer_logo );
		}
	}
}

if ( ! function_exists( 'banquet_core_get_header_widget_area' ) ) {
	function banquet_core_get_header_widget_area( $header_layout = '', $widget_area = 'one' ) {
		$page_id = qode_framework_get_page_id();
		
		$widget_area_map = apply_filters( 'banquet_core_filter_header_widget_area', array(
			'page_id'             => $page_id,
			'header_layout'       => $header_layout,
			'is_enabled'          => get_post_meta( $page_id, 'qodef_show_header_widget_areas', true ) !== 'no',
			'default_widget_area' => 'qodef-header-widget-area-' . esc_attr( $widget_area ),
			'custom_widget_area'  => get_post_meta( $page_id, 'qodef_header_custom_widget_area_' . esc_attr( $widget_area ), true )
		) );
		
		extract( $widget_area_map );
		
		if ( $is_enabled ) {
			if ( is_active_sidebar( $default_widget_area ) && empty( $custom_widget_area ) ) {
				dynamic_sidebar( $default_widget_area );
			} else if ( ! empty( $custom_widget_area ) && is_active_sidebar( $custom_widget_area ) ) {
				dynamic_sidebar( $custom_widget_area );
			}
		}
	}
}