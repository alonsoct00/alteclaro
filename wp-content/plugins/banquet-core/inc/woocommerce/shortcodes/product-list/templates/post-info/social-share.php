<?php if ( class_exists( 'BanquetCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-woo-product-social-share">
		<?php
		$params = array();
		$params['title'] = esc_html__( 'Share:', 'banquet-core' );
		
		echo BanquetCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>