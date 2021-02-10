<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		banquet_core_theme_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post category info
				banquet_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
				
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				banquet_core_theme_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => $title_tag ) );
				
				// Hook to include additional content after blog single content
				do_action( 'banquet_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post read more
					banquet_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>