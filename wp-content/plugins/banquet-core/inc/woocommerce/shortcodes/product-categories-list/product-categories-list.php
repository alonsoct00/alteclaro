<?php

if ( ! function_exists( 'banquet_core_add_product_categories_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function banquet_core_add_product_categories_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'BanquetCoreProductCategoriesListShortcode';

		return $shortcodes;
	}

	add_filter( 'banquet_core_filter_register_shortcodes', 'banquet_core_add_product_categories_list_shortcode' );
}

if ( class_exists( 'BanquetCoreListShortcode' ) ) {
	class BanquetCoreProductCategoriesListShortcode extends BanquetCoreListShortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_layouts( apply_filters( 'banquet_core_filter_product_categories_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'banquet_core_filter_product_categories_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( BANQUET_CORE_INC_URL_PATH . '/woocommerce/shortcodes/product-list' );
			$this->set_base( 'banquet_core_product_categories_list' );
			$this->set_name( esc_html__( 'Product Categories List', 'banquet-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of product categories', 'banquet-core' ) );
			$this->set_category( esc_html__( 'Banquet Core', 'banquet-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'banquet-core' )
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'justified-gallery' ),
			) );
			$this->map_tax_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'banquet_core_product_categories_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']      = $this->get_post_type();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['categories']     = $this->get_categories( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts );

			$atts['this_shortcode'] = $this;

			return banquet_core_get_template_part( 'woocommerce/shortcodes/product-categories-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-categories-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}

		private function get_categories( $atts ) {
			$number  = ! empty ( $atts['posts_per_page'] ) ? $atts['posts_per_page'] : '';
			$orderby = ! empty( $atts['orderby'] ) ? $atts['orderby'] : '';
			$order   = ! empty( $atts['order'] ) ? $atts['order'] : '';
			$slugs   = ! empty( $atts['category_slugs'] ) ? explode( ',', $atts['category_slugs'] ) : '';

			$args = array(
				'taxonomy'     => $this->get_post_type_taxonomy(),
				'number'       => $number,
				'orderby'      => $orderby,
				'oder'         => $order,
				'slug'         => $slugs,
				'hide_empty'   => false,
				'hierarchical' => false,
			);

			return get_terms( $args );
		}

		public function map_tax_query_options( $params = array() ) {
			$group = isset( $params['group'] ) ? $params['group'] : esc_html__( 'Query', 'banquet-core' );

			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'posts_per_page',
				'title'      => esc_html__( 'Posts per Page', 'banquet-core' ),
				'default'    => '-1',
				'group'      => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'orderby',
				'title'         => esc_html__( 'Order By', 'banquet-core' ),
				'options'       => array(
					''     => esc_html__( 'Default', 'banquet-core' ),
					'name' => esc_html__( 'Name', 'banquet-core' ),
					'slug' => esc_html__( 'Slug', 'banquet-core' ),
					'id'   => esc_html__( 'ID', 'banquet-core' ),
				),
				'default_value' => 'name',
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'order',
				'title'         => esc_html__( 'Order', 'banquet-core' ),
				'options'       => banquet_core_get_select_type_options_pool( 'order' ),
				'default_value' => 'DESC',
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'additional_params',
				'title'      => esc_html__( 'Additional Params', 'banquet-core' ),
				'options'    => array(
					''              => esc_html__( 'No', 'banquet-core' ),
					'category_slug' => esc_html__( 'Category Slug', 'banquet-core' ),
				),
				'group'      => $group
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'category_slugs',
				'title'       => esc_html__( 'Category Slugs', 'banquet-core' ),
				'description' => esc_html__( 'Separate category slugs with commas', 'banquet-core' ),
				'group'       => $group,
				'dependency'  => array(
					'show' => array(
						'additional_params' => array(
							'values'        => 'category_slug',
							'default_value' => ''
						)
					)
				)
			) );
		}

		public function get_image_dimension( $atts ) {
			$image_dimension = array();

			if ( ! empty( $atts['behavior'] ) && $atts['behavior'] == 'masonry' && ! empty( $atts['masonry_images_proportion'] ) && $atts['masonry_images_proportion'] == 'fixed' ) {
				$image_dimension = banquet_core_get_custom_image_size_meta( 'taxonomy', 'qodef_product_category_masonry_size', $atts['category_id'] );
			}

			if ( ! empty( $atts['behavior'] ) && in_array( $atts['behavior'], array( 'columns', 'slider' ) ) ) {
				$image_dimension = array(
					'size'  => $atts['images_proportion'],
					'class' => banquet_core_get_custom_image_size_class_name( $atts['images_proportion'] )
				);
			}

			return $image_dimension;
		}
	}
}