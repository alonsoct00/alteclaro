<?php if ( is_active_sidebar( banquet_get_sidebar_name() ) ) { ?>
	<aside id="qodef-page-sidebar">
		<?php dynamic_sidebar( banquet_get_sidebar_name() ); ?>
	</aside>
<?php } ?>