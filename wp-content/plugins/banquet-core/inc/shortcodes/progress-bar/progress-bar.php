<?php

if ( ! function_exists( 'banquet_core_add_progress_bar_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function banquet_core_add_progress_bar_shortcode( $shortcodes ) {
		$shortcodes[] = 'BanquetCoreProgressBarShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'banquet_core_filter_register_shortcodes', 'banquet_core_add_progress_bar_shortcode' );
}

if ( class_exists( 'BanquetCoreShortcode' ) ) {
	class BanquetCoreProgressBarShortcode extends BanquetCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( BANQUET_CORE_SHORTCODES_URL_PATH . '/progress-bar' );
			$this->set_base( 'banquet_core_progress_bar' );
			$this->set_name( esc_html__( 'Progress Bar', 'banquet-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays progress bar with provided parameters', 'banquet-core' ) );
			$this->set_category( esc_html__( 'Banquet Core', 'banquet-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'banquet-core' ),
				'options'       => array(
					'circle'      => esc_html__( 'Circle', 'banquet-core' ),
					'semi-circle' => esc_html__( 'Semi Circle', 'banquet-core' ),
					'line'        => esc_html__( 'Line', 'banquet-core' ),
					'custom'      => esc_html__( 'Custom', 'banquet-core' )
				),
				'default_value' => 'circle'
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'custom_shape',
				'title'      => esc_html__( 'Custom Shape (SVG code)', 'banquet-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'custom',
							'default_value' => '_self'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_shape_id',
				'title'      => esc_html__( 'Custom Shape ID', 'banquet-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'custom',
							'default_value' => 'circle'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'active_line_color',
				'title'      => esc_html__( 'Active Line Color', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'active_line_width',
				'title'       => esc_html__( 'Active Line Width', 'banquet-core' ),
				'description' => esc_html__( 'Enter width for active line without unit. Default value is 4 (1 is equal 3.59px for circle and custom type)', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'inactive_line_color',
				'title'      => esc_html__( 'Inactive Color', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'inactive_line_width',
				'title'       => esc_html__( 'Inactive Line Width', 'banquet-core' ),
				'description' => esc_html__( 'Enter width for inactive line without unit. Default value is 4 (1 is equal 3.59px for circle and custom type)', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'number',
				'title'       => esc_html__( 'Percentage Number', 'banquet-core' ),
				'description' => esc_html__( 'Enter percentage number for progress bar', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'number_color',
				'title'      => esc_html__( 'Number Color', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'banquet-core' ),
				'options'       => banquet_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h5'
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'banquet-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_top',
				'title'      => esc_html__( 'Title Margin Top', 'banquet-core' )
			) );
		}
		
		public function load_assets() {
			$atts = $this->get_atts();
			if( $atts['layout'] == 'line' ) {
				wp_enqueue_script( 'progress-bar-line', BANQUET_CORE_INC_URL_PATH . '/shortcodes/progress-bar/assets/js/plugins/jquery.lineProgressbar.js', array( 'jquery' ), true );
			} else {
				wp_enqueue_script( 'progress-bar-circle', BANQUET_CORE_INC_URL_PATH . '/shortcodes/progress-bar/assets/js/plugins/progressbar.min.js', array( 'jquery' ), true );
			}
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['rand_number']    = rand( 0, 1000 );
			$atts['data_attrs']     = $this->get_data_attrs( $atts );
			
			return banquet_core_get_template_part( 'shortcodes/progress-bar', 'templates/progress-bar', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-progress-bar';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_data_attrs( $atts ) {
			$data = array();
			
			if ( ! empty( $atts['layout'] ) ) {
				$data['data-layout'] = $atts['layout'];
			}
			
			$data['data-active-line-color'] = ! empty( $atts['active_line_color'] ) ? $atts['active_line_color'] : '#000';
			$data['data-active-line-width'] = ! empty( $atts['active_line_width'] ) ? $atts['active_line_width'] : 4;
			
			$data['data-inactive-line-color'] = ! empty( $atts['inactive_line_color'] ) ? $atts['inactive_line_color'] : '#fff';
			$data['data-inactive-line-width'] = ! empty( $atts['inactive_line_width'] ) ? $atts['inactive_line_width'] : 4;
			
			$data['data-text-color'] = ! empty( $atts['number_color'] ) ? $atts['number_color'] : '#000';
			
			$data['data-number']          = ! empty( $atts['number'] ) ? $atts['number'] : '';
			$data['data-rand-number']     = ! empty( $atts['rand_number'] ) ? $atts['rand_number'] : 100;
			$data['data-custom-shape-id'] = ! empty( $atts['custom_shape_id'] ) ? $atts['custom_shape_id'] : '';
			
			return $data;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( $atts['title_margin_top'] !== '' ) {
				if ( $atts['layout'] === 'line' ) {
					$styles[] = 'margin-bottom: ' . intval( $atts['title_margin_top'] ) . 'px';
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
	}
}