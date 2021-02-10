<?php

if ( ! function_exists( 'banquet_core_add_team_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function banquet_core_add_team_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'BanquetCoreTeamListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'banquet_core_filter_register_shortcodes', 'banquet_core_add_team_list_shortcode' );
}

if ( class_exists( 'BanquetCoreListShortcode' ) ) {
	class BanquetCoreTeamListShortcode extends BanquetCoreListShortcode {
		
		public function __construct() {
			$this->set_post_type( 'team' );
			$this->set_post_type_additional_taxonomies( array( 'team-category' ) );
			$this->set_layouts( apply_filters( 'banquet_core_filter_team_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'banquet_core_filter_team_list_extra_options', array() ) );
		
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( BANQUET_CORE_CPT_URL_PATH . '/team/shortcodes/team-list' );
			$this->set_base( 'banquet_core_team_list' );
			$this->set_name( esc_html__( 'Team List', 'banquet-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of teams', 'banquet-core' ) );
			$this->set_category( esc_html__( 'Banquet Core', 'banquet-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'banquet-core' )
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'masonry', 'justified-gallery' )
			) );
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array( 'layouts' => $this->get_layouts()));

			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'info_below_content_margin_top',
				'title'      => esc_html__( 'Content Top Margin', 'banquet-core' ),
				'group'      => esc_html__( 'Layout', 'banquet-core' )
			) );
			$this->map_additional_options();
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'banquet_core_team_list', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['post_type'] = $this->get_post_type();
			
			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['query_result']   = new \WP_Query( banquet_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['data_attr']      = banquet_core_get_pagination_data( BANQUET_CORE_REL_PATH, 'post-types/team/shortcodes', 'team-list', 'team', $atts );
			$atts['has_single']     = banquet_core_team_has_single();
			
			$atts['this_shortcode'] = $this;
			
			return banquet_core_get_template_part( 'post-types/team/shortcodes/team-list', 'templates/content', $atts['behavior'], $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-team-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			
			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();
			
			$list_item_classes   = $this->get_list_item_classes( $atts );
			
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

		public function get_content_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['info_below_content_margin_top'] ) ) {
				$margin_top = qode_framework_string_ends_with_space_units( $atts['info_below_content_margin_top'] ) ? $atts['info_below_content_margin_top'] : intval( $atts['info_below_content_margin_top'] ) . 'px';
				$styles[] = 'margin-top:' . $margin_top;
			}

			return $styles;
		}
	}
}