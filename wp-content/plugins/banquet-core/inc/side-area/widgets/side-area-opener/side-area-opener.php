<?php

if ( ! function_exists( 'banquet_core_add_side_area_opener_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function banquet_core_add_side_area_opener_widget( $widgets ) {
		$widgets[] = 'BanquetCoreSideAreaOpenerWidget';
		
		return $widgets;
	}
	
	add_filter( 'banquet_core_filter_register_widgets', 'banquet_core_add_side_area_opener_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class BanquetCoreSideAreaOpenerWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'banquet_core_side_area_opener' );
			$this->set_name( esc_html__( 'Banquet Side Area Opener', 'banquet-core' ) );
			$this->set_description( esc_html__( 'Display a "hamburger" icon that opens the side area', 'banquet-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'sidea_area_opener_margin',
					'title'       => esc_html__( 'Opener Margin', 'banquet-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'banquet-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'side_area_opener_color',
					'title'      => esc_html__( 'Opener Color', 'banquet-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'side_area_opener_hover_color',
					'title'      => esc_html__( 'Opener Hover Color', 'banquet-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['side_area_opener_color'] ) ) {
				$styles[] = 'color: ' . $atts['side_area_opener_color'] . ';';
			}
			
			if ( ! empty( $atts['sidea_area_opener_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['sidea_area_opener_margin'];
			}
			?>
			<a itemprop="url" class="qodef-side-area-opener <?php echo banquet_core_get_open_close_icon_class( 'qodef_side_area_icon_source', 'qodef-side-area-opener' ); ?>" <?php qode_framework_inline_attr( $atts['side_area_opener_hover_color'], 'data-hover-color' ); ?> <?php qode_framework_inline_style( $styles ); ?> href="#">
				<?php echo banquet_core_get_side_area_icon_html(); ?>
			</a>
			<?php
		}
	}
}