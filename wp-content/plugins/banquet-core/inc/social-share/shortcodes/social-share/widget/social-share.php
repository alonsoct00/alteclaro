<?php

if ( ! function_exists( 'banquet_core_add_social_share_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function banquet_core_add_social_share_widget( $widgets ) {
		$widgets[] = 'BanquetCoreSocialShareWidget';
		
		return $widgets;
	}
	
	add_filter( 'banquet_core_filter_register_widgets', 'banquet_core_add_social_share_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class BanquetCoreSocialShareWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'banquet_core_social_share'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'banquet_core_social_share' );
				$this->set_name( esc_html__( 'Banquet Social Share', 'banquet-core' ) );
				$this->set_description( esc_html__( 'Add a social share element into widget areas', 'banquet-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[banquet_core_social_share $params]" ); // XSS OK
		}
	}
}