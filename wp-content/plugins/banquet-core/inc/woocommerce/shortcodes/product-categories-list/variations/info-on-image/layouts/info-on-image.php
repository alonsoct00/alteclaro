<div <?php wc_product_cat_class( $item_classes ); ?>>
    <a href="<?php echo get_term_link( $category_slug, 'product_cat' ) ?>">
		<?php banquet_core_template_part( 'woocommerce/shortcodes/product-categories-list', 'templates/post-info/image', '', $params ); ?>
		<?php banquet_core_template_part( 'woocommerce/shortcodes/product-categories-list', 'templates/post-info/title', '', $params ); ?>
    </a>
</div>