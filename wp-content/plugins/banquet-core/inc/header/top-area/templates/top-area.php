<?php if ( $show_header_area ) { ?>
	<div id="qodef-top-area">
		<div class="qodef-top-area-left">
			<?php banquet_core_get_header_widget_area( 'top-area-left' ); ?>
		</div>
		<div class="qodef-top-area-right">
			<?php banquet_core_get_header_widget_area( 'top-area-right' ); ?>
		</div>
		<?php do_action( 'banquet_core_action_after_top_area' ); ?>
	</div>
<?php } ?>