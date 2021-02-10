<?php

if ( ! function_exists( 'banquet_core_register_standard_with_breadcrumbs_title_layout' ) ) {
	function banquet_core_register_standard_with_breadcrumbs_title_layout( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = 'BanquetCoreStandardWithBreadcrumbsTitle';
		
		return $layouts;
	}
	
	add_filter( 'banquet_core_filter_register_title_layouts', 'banquet_core_register_standard_with_breadcrumbs_title_layout');
}

if ( ! function_exists( 'banquet_core_add_standard_with_breadcrumbs_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function banquet_core_add_standard_with_breadcrumbs_title_layout_option( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrums', 'banquet-core' );
		
		return $layouts;
	}
	
	add_filter( 'banquet_core_filter_title_layout_options', 'banquet_core_add_standard_with_breadcrumbs_title_layout_option' );
}

