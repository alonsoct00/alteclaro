<?php

if ( ! function_exists( 'banquet_core_add_google_map_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function banquet_core_add_google_map_shortcode( $shortcodes ) {
		$shortcodes[] = 'BanquetCoreGoogleMapShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'banquet_core_filter_register_shortcodes', 'banquet_core_add_google_map_shortcode' );
}

if ( class_exists( 'BanquetCoreShortcode' ) ) {
	class BanquetCoreGoogleMapShortcode extends BanquetCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( BANQUET_CORE_SHORTCODES_URL_PATH . '/google-map' );
			$this->set_base( 'banquet_core_google_map' );
			$this->set_name( esc_html__( 'Google Map', 'banquet-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays google map with provided parameters', 'banquet-core' ) );
			$this->set_category( esc_html__( 'Banquet Core', 'banquet-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'address1',
				'title'      => esc_html__( 'Address 1', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'address2',
				'title'      => esc_html__( 'Address 2', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'address3',
				'title'      => esc_html__( 'Address 3', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'address4',
				'title'      => esc_html__( 'Address 4', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'pin',
				'title'      => esc_html__( 'Pin Icon', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'map_height',
				'title'      => esc_html__( 'Map Height', 'banquet-core' ),
			) );
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'banquet_core_google_map', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function load_assets() {
			wp_enqueue_script( 'google-map-api' );
			wp_enqueue_script( 'banquet-core-google-map' );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$rand_number            = rand( 0, 1000 );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['rand_number']    = $rand_number;
			$atts['holder_id']      = 'qodef-map-id--' . $rand_number;
			$atts['map_data']       = $this->get_map_data( $atts );
			
			return banquet_core_get_template_part( 'shortcodes/google-map', 'templates/google-map', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-google-map';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_map_data( $atts ) {
			$map_data = array();
			
			$addresses_array = array();
			if ( $atts['address1'] != '' ) {
				array_push( $addresses_array, esc_attr( $atts['address1'] ) );
			}
			if ( $atts['address2'] != '' ) {
				array_push( $addresses_array, esc_attr( $atts['address2'] ) );
			}
			if ( $atts['address3'] != '' ) {
				array_push( $addresses_array, esc_attr( $atts['address3'] ) );
			}
			if ( $atts['address4'] != '' ) {
				array_push( $addresses_array, esc_attr( $atts['address4'] ) );
			}
			
			if ( $atts['pin'] != "" ) {
				$map_pin = wp_get_attachment_image_src( $atts['pin'], 'full', true );
				$map_pin = $map_pin[0];
			} else {
				$map_pin = BANQUET_CORE_INC_URL_PATH . "/maps/assets/img/pin.png";
			}
			
			$map_data[] = "data-addresses='[\"" . implode( '","', $addresses_array ) . "\"]'";
			$map_data[] = 'data-pin=' . $map_pin;
			$map_data[] = 'data-unique-id=' . $atts['rand_number'];
			$map_data[] = 'data-height=' . $atts['map_height'];
			
			return implode( ' ', $map_data );
		}
	}
}