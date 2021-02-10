<?php

if ( ! function_exists( 'banquet_core_add_twitter_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function banquet_core_add_twitter_list_widget( $widgets ) {
		$widgets[] = 'BanquetCoreTwitterListWidget';
		
		return $widgets;
	}
	
	add_filter( 'banquet_core_filter_register_widgets', 'banquet_core_add_twitter_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class BanquetCoreTwitterListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'name'       => 'widget_title',
					'field_type' => 'text',
					'title'      => esc_html__( 'Title', 'banquet-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'banquet_core_twitter_list'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'banquet_core_twitter_list' );
				$this->set_name( esc_html__( 'Banquet Twitter List', 'banquet-core' ) );
				$this->set_description( esc_html__( 'Add a twitter list element into widget areas', 'banquet-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[banquet_core_twitter_list $params]" ); // XSS OK
		}
	}
}