<div <?php wc_product_class( $item_classes ); ?>>
    <div class="qodef-woo-product-inner">
		<?php if ( has_post_thumbnail() ) { ?>
            <div class="qodef-woo-product-image">
				<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/on-sale' ); ?>
				<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
                <div class="qodef-woo-product-image-inner">
					<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
					<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params ); ?>
					<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
					<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
                </div>
            </div>
		<?php } ?>
		<?php banquet_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
    </div>
</div>