<?php banquet_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/opener' ); ?>
<div class="qodef-m-dropdown">
	<div class="qodef-m-dropdown-inner">
		<?php if ( ! WC()->cart->is_empty() ) {
			banquet_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/loop' );
			
			banquet_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/order-details' );
			
			banquet_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/button' );
		} else {
			banquet_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/posts-not-found' );
		} ?>
	</div>
</div>