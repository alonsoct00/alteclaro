<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-images">
		<div class="qodef-e-main-image-holder">
			<div class="qodef-e-main-image-zoom-holder">
			<?php if ( ! empty( $main_image ) ) : ?>
				<?php echo wp_get_attachment_image( $main_image, 'full', false, array( 'class' => 'qodef-e-main-image' ) ); ?>
			<?php endif; ?>
			</div>
		</div>
		<?php if ( ! empty( $stacked_image ) ): ?>
			<?php echo wp_get_attachment_image( $stacked_image, 'full', false, array( 'class' => 'qodef-e-stack-image' ) ); ?>
		<?php endif; ?>
	
	</div>
</div>