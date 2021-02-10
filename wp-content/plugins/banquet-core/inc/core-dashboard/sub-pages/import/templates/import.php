<div class="wrap about-wrap qodef-core-dashboard">
	<h1 class="qodef-cd-title"><?php esc_html_e('Import', 'banquet-core'); ?></h1>
	<h4 class="qodef-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'banquet-core'); ?></h4>
	<div class="qodef-core-dashboard-inner">
		<div class="qodef-core-dashboard-column">
			<div class="qodef-core-dashboard-box qodef-cd-import-box">
				<?php
				if(!empty(BanquetCoreDashboard::get_instance()->get_purchased_code())) {?>
				<div class="qodef-cd-box-title-holder">
					<h3><?php esc_html_e('Import demo content', 'banquet-core'); ?></h3>
					<p><?php esc_html_e('Start the demo import process by choosing which content you wish to import. ', 'banquet-core'); ?></p>
				</div>
				<div class="qodef-cd-box-inner">
					<form method="post" class="qodef-cd-import-form" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'banquet-core'); ?>">
						<div class="qodef-cd-box-form-section">
							<?php echo banquet_core_get_template_part('core-dashboard/sub-pages/import/templates', 'notice', ''); ?>
							<label class="qodef-cd-label"><?php esc_html_e('Select Demo to import', 'banquet-core'); ?></label>
							<select name="demo" class="qodef-import-demo">
								<option value="banquet" data-thumb="<?php echo BANQUET_CORE_INC_URL_PATH . '/core-dashboard/assets/img/demo.png'; ?>"><?php esc_html_e('Banquet', 'banquet-core'); ?></option>
							</select>
						</div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-columns">
							<div class="qodef-cd-box-form-section-column">
								<label class="qodef-cd-label"><?php esc_html_e('Select Import Option', 'banquet-core'); ?></label>
								<select name="import_option" class="qodef-cd-import-option" data-option-name="import_option" data-option-type="selectbox">
									<option value="none"><?php esc_html_e('Please Select', 'banquet-core'); ?></option>
									<option value="complete"><?php esc_html_e('All', 'banquet-core'); ?></option>
									<option value="content"><?php esc_html_e('Content', 'banquet-core'); ?></option>
									<option value="widgets"><?php esc_html_e('Widgets', 'banquet-core'); ?></option>
									<option value="options"><?php esc_html_e('Options', 'banquet-core'); ?></option>
									<option value="single-page"><?php esc_html_e('Single Page', 'banquet-core'); ?></option>
								</select>
							</div>
							<div class="qodef-cd-box-form-section-column">
								<label class="qodef-cd-label"><?php esc_html_e('Import Attachments', 'banquet-core'); ?></label>
								<div class="qodef-cd-switch">
									<label class="qodef-cd-cb-enable selected"><span><?php esc_html_e('Yes', 'banquet-core'); ?></span></label>
									<label class="qodef-cd-cb-disable"><span><?php esc_html_e('No', 'banquet-core'); ?></span></label>
									<input type="checkbox" class="qodef-cd-import-attachments checkbox" name="import_attachments" value="1" checked="checked">
								</div>
							</div>
						</div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-dependency"></div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-progress">
							<span><?php esc_html_e('The import process may take some time. Please be patient.', 'banquet-core') ?></span>
							<progress id="qodef-progress-bar" value="0" max="100"></progress>
							<span class="qodef-cd-progress-percent"><?php esc_attr_e('0%', 'banquet-core'); ?></span>
						</div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-last-section">
							<span class="qodef-cd-import-is-completed"><?php esc_html_e('Import is completed', 'banquet-core') ?></span>
							<input type="submit" class="qodef-cd-button" value="<?php esc_attr_e('Import', 'banquet-core'); ?>" name="import" id="qodef-<?php echo esc_attr($submit); ?>" />
						</div>
						<?php wp_nonce_field("qodef_cd_import_nonce","qodef_cd_import_nonce") ?>
					</form>
				</div>
				<?php } else { ?>
					<div class="qodef-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'banquet-core'); ?></h3>
						<p><?php esc_html_e('Please activate your copy of the theme by registering the theme so you could proceed with the demo import process. ', 'banquet-core'); ?></p>
					</div>
					<div class="qodef-cd-box-inner">
						<div class="qodef-cd-box-section">
							<div class="qodef-cd-field-holder">
								<a href="<?php echo admin_url('admin.php?page=banquet_core_dashboard'); ?>" class="qodef-cd-button"><?php esc_attr_e('Activate your theme copy', 'banquet-core'); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>