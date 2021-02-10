<?php

if ( ! function_exists( 'banquet_core_add_performance_panel_into_customizer' ) ) {
	function banquet_core_add_performance_panel_into_customizer( $panels ) {
		$panels[] = 'banquet_core_performance_panel';
		
		return $panels;
	}
	
	add_filter( 'qode_framework_filter_customizer_panels', 'banquet_core_add_performance_panel_into_customizer' );
}

if ( ! function_exists( 'banquet_core_performance_get_option_value' ) ) {
	/**
	 * Function check is item enabled throw customizer options
	 *
	 * @param $item string - module path
	 * @param $option string - customizer option name
	 *
	 * @return bool
	 */
	function banquet_core_performance_get_option_value( $item, $option ) {
		$value = false;
		
		if ( ! empty( $item ) && ! empty( $option ) ) {
			$option_name = $option . str_replace( '-', '_', basename( $item ) );
			$value       = qode_framework_get_option_value( '', 'customizer', $option_name );
		}
		
		return $value;
	}
}