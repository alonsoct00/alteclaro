<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		banquet_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				banquet_template_part( 'blog', 'templates/parts/post-info/date' );
				
				$value = banquet_is_installed( 'core' ) ? banquet_core_get_post_value_through_levels( 'qodef_blog_single_hide_category_tag' ) : '';
				if ( $value !== 'no') {
					// Include post category info
					banquet_template_part( 'blog', 'templates/parts/post-info/category' );
					
					// Include post tags info
					banquet_template_part( 'blog', 'templates/parts/post-info/tags' );
				}

				?>
			</div>
			<div class="qodef-e-text">
				
				<?php
				// Include post title
				banquet_template_part( 'blog', 'templates/parts/post-info/title' );
				?>
				<!--ACF Variables-->
				<?php if( get_field('fecha_taller') ): ?>
					<p class="workshop-date date-acf">Fecha: <?php the_field('fecha_taller'); ?></p>
				<?php endif; ?>
				<?php if( get_field('costo_taller') ): ?>
				<p class="workshop-price currency-acf">Costo: $ <?php the_field('costo_taller'); ?> MXN</p>
				<?php endif; ?>
				<!--End ACF Variables-->
				<?php
				// Include post content
				the_content();
				?>
				<?php if( get_field('wa_link') ): ?>
				<div class="wp-block-button">
				<a href="<?php the_field('wa_link'); ?>" class="wp-block-button__link">Informes &gt;</a>
				</div>
				<?php endif; ?>
				
				<?php
				// Hook to include additional content after blog single content
				do_action( 'banquet_action_after_blog_single_content' );
				?>
				
			</div>
			
		</div>
	</div>
</article>