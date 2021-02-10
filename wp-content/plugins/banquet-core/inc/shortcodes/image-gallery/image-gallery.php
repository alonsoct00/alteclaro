<?php

if ( ! function_exists( 'banquet_core_add_image_gallery_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function banquet_core_add_image_gallery_shortcode( $shortcodes ) {
		$shortcodes[] = 'BanquetCoreImageGalleryShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'banquet_core_filter_register_shortcodes', 'banquet_core_add_image_gallery_shortcode' );
}

if ( class_exists( 'BanquetCoreListShortcode' ) ) {
	class BanquetCoreImageGalleryShortcode extends BanquetCoreListShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( BANQUET_CORE_SHORTCODES_URL_PATH . '/image-gallery' );
			$this->set_base( 'banquet_core_image_gallery' );
			$this->set_name( esc_html__( 'Image Gallery', 'banquet-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image gallery element', 'banquet-core' ) );
			$this->set_category( esc_html__( 'Banquet Core', 'banquet-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'images',
				'multiple'   => 'yes',
				'title'      => esc_html__( 'Images', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'image_size',
				'title'      => esc_html__( 'Image Size', 'banquet-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_action',
				'title'      => esc_html__( 'Image Action', 'banquet-core' ),
				'options'    => array(
					''            => esc_html__( 'No Action', 'banquet-core' ),
					'open-popup'  => esc_html__( 'Open Popup', 'banquet-core' ),
					'custom-link' => esc_html__( 'Custom Link', 'banquet-core' )
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Custom Link Target', 'banquet-core' ),
				'options'       => banquet_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self',
				'dependency'    => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'justified-gallery' ),
				'exclude_option'   => array( 'images_proportion' ),
				'group'            => esc_html__( 'Gallery Settings', 'banquet-core' )
			) );

			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'center_slides',
				'title'         => esc_html__( 'Center Slides', 'banquet-core' ),
				'options'       => banquet_core_get_select_type_options_pool('no_yes'),
				'default_value' => 'no',
				'dependency'    => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
							'default_value' => 'columns'
						)
					)
				),
				'group'            => esc_html__( 'Gallery Settings', 'banquet-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts, $this->get_additional_slider_data($atts) );
			$atts['images']         = $this->generate_images_params( $atts );
			
			return banquet_core_get_template_part( 'shortcodes/image-gallery', 'templates/image-gallery', $atts['behavior'], $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-image-gallery';
			$holder_classes[] = ! empty( $atts['image_action'] ) && $atts['image_action'] == 'open-popup' ? 'qodef-magnific-popup qodef-popup-gallery' : '';
			
			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_item_classes( $atts ) {
			$item_classes   = $this->init_item_classes();
			$item_classes[] = 'qodef-image-wrapper';
			
			$list_item_classes = $this->get_list_item_classes( $atts );
			
			$item_classes = array_merge( $item_classes, $list_item_classes );
			
			return implode( ' ', $item_classes );
		}
		
		private function generate_images_params( $atts ) {
			$image_ids = array();
			$images    = array();
			$i         = 0;
			
			if ( $atts['images'] !== '' ) {
				$image_ids = explode( ',', $atts['images'] );
			}
			
			$image_size = $this->generate_image_size( $atts );
			
			foreach ( $image_ids as $id ) {
				
				$image['image_id']   = intval( $id );
				$image_original      = wp_get_attachment_image_src( $id, 'full' );
				$image['url']        = $this->generate_image_url( $id, $atts, $image_original[0] );
				$image['alt']        = get_post_meta( $id, '_wp_attachment_image_alt', true );
				$image['image_size'] = $image_size;
				
				$images[ $i ] = $image;
				$i ++;
			}
			
			return $images;
		}
		
		private function generate_image_size( $atts ) {
			$image_size = trim( $atts['image_size'] );
			preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
			if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
				return $image_size;
			} elseif ( ! empty( $matches[0] ) ) {
				return array(
					$matches[0][0],
					$matches[0][1]
				);
			} else {
				return 'full';
			}
		}
		
		private function generate_image_url( $id, $atts, $default ) {
			if ( $atts['image_action'] == 'custom-link' ) {
				$url = get_post_meta( $id, 'qodef_image_custom_link', true );
				if ( empty( $url ) ) {
					$url = $default;
				}
			} else {
				$url = $default;
			}
			
			return $url;
		}

		private function get_additional_slider_data( $atts ) {
			$data = array();

			if ( $atts['center_slides'] == 'yes' ) {
				$data['centeredSlides'] = true;
			}

			return $data;
		}
	}
}