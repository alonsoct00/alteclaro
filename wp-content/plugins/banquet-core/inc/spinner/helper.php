<?php

if ( ! function_exists( 'banquet_core_is_page_spinner_enabled' ) ) {
	function banquet_core_is_page_spinner_enabled() {
		return banquet_core_get_post_value_through_levels( 'qodef_enable_page_spinner' ) === 'yes';
	}
}

if ( ! function_exists( 'banquet_core_load_page_spinner' ) ) {
	/**
	 * Loads Spinners HTML
	 */
	function banquet_core_load_page_spinner() {
		
		if ( banquet_core_is_page_spinner_enabled() ) {
			$parameters = array();
			
			banquet_core_template_part( 'spinner', 'templates/spinner', '', $parameters );
		}
	}
	
	add_action( 'banquet_theme_action_after_body_tag_open', 'banquet_core_load_page_spinner' );
}

if ( ! function_exists( 'banquet_core_get_spinners_type' ) ) {
	function banquet_core_get_spinners_type() {
		$html = '';
		$type = banquet_core_get_post_value_through_levels( 'qodef_page_spinner_type' );
		
		if ( ! empty( $type ) ) {
			$html = banquet_core_get_template_part( 'spinner', 'layouts/' . $type . '/templates/' . $type );
		}
		
		echo wp_kses_post( $html );
	}
}

if ( ! function_exists( 'banquet_core_set_page_spinner_classes' ) ) {
	/**
	 * Function that return classes for page spinner area
	 *
	 * @param $classes array
	 *
	 * @return array
	 */
	function banquet_core_set_page_spinner_classes( $classes ) {
		$type = banquet_core_get_post_value_through_levels( 'qodef_page_spinner_type' );
		
		if ( ! empty( $type ) ) {
			$classes[] = 'qodef-layout--' . esc_attr( $type );
		}
		
		return $classes;
	}
	
	add_filter( 'banquet_theme_filter_page_spinner_classes', 'banquet_core_set_page_spinner_classes' );
}

if ( ! function_exists( 'banquet_core_set_page_spinner_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function banquet_core_set_page_spinner_styles( $style ) {
		$spinner_styles = array();
		
		$spinner_background_color = banquet_core_get_post_value_through_levels( 'qodef_page_spinner_background_color' );
		$spinner_color            = banquet_core_get_post_value_through_levels( 'qodef_page_spinner_color' );
		
		if ( ! empty( $spinner_background_color ) ) {
			$spinner_styles['background-color'] = $spinner_background_color;
		}
		
		if ( ! empty( $spinner_color ) ) {
			$spinner_styles['color'] = $spinner_color;
		}
		
		if ( ! empty( $spinner_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-spinner .qodef-m-inner', $spinner_styles );
		}
		
		return $style;
	}
	
	add_filter( 'banquet_filter_add_inline_style', 'banquet_core_set_page_spinner_styles' );
}