<?php

if ( ! function_exists( 'banquet_core_add_custom_font_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function banquet_core_add_custom_font_widget( $widgets ) {
		$widgets[] = 'BanquetCoreCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'banquet_core_filter_register_widgets', 'banquet_core_add_custom_font_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class BanquetCoreCustomFontWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'banquet_core_custom_font'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'banquet_core_custom_font' );
				$this->set_name( esc_html__( 'Banquet Custom Font', 'banquet-core' ) );
				$this->set_description( esc_html__( 'Add a custom font element into widget areas', 'banquet-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[banquet_core_custom_font $params]" ); // XSS OK
		}
	}
}