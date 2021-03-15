<?php if ( banquet_is_footer_top_area_enabled() ) { ?>
	<div id="qodef-page-footer-top-area">
		<div id="qodef-page-footer-top-area-inner" class="<?php echo esc_attr( banquet_get_footer_top_area_classes() ); ?>">
			<div class="<?php echo esc_attr( banquet_get_footer_top_area_columns_classes() ); ?>">
				<div class="qodef-grid-inner clear top-footer-grid">
					<?php for ( $i = 1; $i <= intval( banquet_get_page_footer_sidebars_config_by_key( 'footer_top_sidebars_number' ) ); $i ++ ) { ?>
						<div class="qodef-grid-item">
							<?php if ( is_active_sidebar( 'footer_top_area_column_' . $i ) ) {
								dynamic_sidebar( 'footer_top_area_column_' . $i );
							} ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!--<div class="qodef-content-grid">
		<div id="footer-images-area" class="qodef-grid qodef-layout--columns qodef-responsive--custom qodef-col-num--3">
			<div class="qodef-grid-inner clear">
				<div class="qodef-grid-item item-footer-img">
				    <img src="/wp-content/uploads/2021/02/Logo-La-Solariega-negro-1.png" alt="La Solariega" style="width:100%; height: auto;" />
					<img src="/wp-content/uploads/2021/02/Distintivo-H.png" alt="Distintivo H" style="width:100%; height: auto;" />
					<img src="/wp-content/uploads/2021/02/Zankyou-1.png" alt="Zankyou" style="width:100%; height: auto;" />
				</div>
			</div>
		</div>
		</div>-->
	</div>
<?php } ?>

