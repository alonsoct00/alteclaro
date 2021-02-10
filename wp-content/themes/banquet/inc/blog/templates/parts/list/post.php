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
				
				$value = banquet_is_installed( 'core' ) ? banquet_core_get_post_value_through_levels( 'qodef_blog_list_hide_category_tag' ) : '';
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
				banquet_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h3' ) );
				
				// Include post excerpt
				banquet_template_part( 'blog', 'templates/parts/post-info/excerpt' );
				
				// Hook to include additional content after blog single content
				do_action( 'banquet_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-right">
					<?php
					// Include post read more
					banquet_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>