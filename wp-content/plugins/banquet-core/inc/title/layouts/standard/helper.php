<?php

if ( ! function_exists( 'banquet_core_register_standard_title_layout' ) ) {
	function banquet_core_register_standard_title_layout( $layouts ) {
		$layouts['standard'] = 'BanquetCoreStandardTitle';
		
		return $layouts;
	}
	
	add_filter( 'banquet_core_filter_register_title_layouts', 'banquet_core_register_standard_title_layout');
}

if ( ! function_exists( 'banquet_core_add_standard_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function banquet_core_add_standard_title_layout_option( $layouts ) {
		$layouts['standard'] = esc_html__( 'Standard', 'banquet-core' );
		
		return $layouts;
	}
	
	add_filter( 'banquet_core_filter_title_layout_options', 'banquet_core_add_standard_title_layout_option' );
}

if ( ! function_exists( 'banquet_core_get_standard_title_layout_subtitle_text' ) ) {
	/**
	 * Function that render current page subtitle text
	 */
	function banquet_core_get_standard_title_layout_subtitle_text() {
		$subtitle_meta = banquet_core_get_post_value_through_levels( 'qodef_page_title_subtitle' );
		$subtitle      = array( 'subtitle' => ! empty( $subtitle_meta ) ? $subtitle_meta : '' );
		
		return apply_filters( 'banquet_core_filter_standard_title_layout_subtitle_text', $subtitle );
	}
}
