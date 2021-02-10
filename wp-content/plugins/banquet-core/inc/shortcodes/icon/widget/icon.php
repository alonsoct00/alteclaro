<?php

if ( ! function_exists( 'banquet_core_add_icon_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function banquet_core_add_icon_widget( $widgets ) {
		$widgets[] = 'BanquetCoreIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'banquet_core_filter_register_widgets', 'banquet_core_add_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class BanquetCoreIconWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'banquet_core_icon'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'banquet_core_icon' );
				$this->set_name( esc_html__( 'Banquet Icon', 'banquet-core' ) );
				$this->set_description( esc_html__( 'Add a icon element into widget areas', 'banquet-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[banquet_core_icon $params]" ); // XSS OK
		}
	}
}
