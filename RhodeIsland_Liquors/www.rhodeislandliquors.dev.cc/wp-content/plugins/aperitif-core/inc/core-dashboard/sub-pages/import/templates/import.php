<div class="wrap about-wrap qodef-core-dashboard">
	<h1 class="qodef-cd-title"><?php esc_html_e('Import', 'aperitif-core'); ?></h1>
	<h4 class="qodef-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'aperitif-core'); ?></h4>
	<div class="qodef-core-dashboard-inner">
		<div class="qodef-core-dashboard-column">
			<div class="qodef-core-dashboard-box qodef-cd-import-box">
				<?php
				if(!empty(AperitifCoreDashboard::get_instance()->get_purchased_code())) {?>
				<div class="qodef-cd-box-title-holder">
					<h3><?php esc_html_e('Import demo content', 'aperitif-core'); ?></h3>
					<p><?php esc_html_e('Start the demo import process by choosing which content you wish to import. ', 'aperitif-core'); ?></p>
				</div>
				<div class="qodef-cd-box-inner">
					<form method="post" class="qodef-cd-import-form" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'aperitif-core'); ?>">
						<div class="qodef-cd-box-form-section">
							<?php echo aperitif_core_get_template_part('core-dashboard/sub-pages/import/templates', 'notice', ''); ?>
							<label class="qodef-cd-label"><?php esc_html_e('Select Demo to import', 'aperitif-core'); ?></label>
							<select name="demo" class="qodef-import-demo">
								<option value="aperitif" data-thumb="<?php echo APERITIF_CORE_INC_URL_PATH . '/core-dashboard/assets/img/demo.png'; ?>"><?php esc_html_e('Aperitif', 'aperitif-core'); ?></option>
							</select>
						</div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-columns">
							<div class="qodef-cd-box-form-section-column">
								<label class="qodef-cd-label"><?php esc_html_e('Select Import Option', 'aperitif-core'); ?></label>
								<select name="import_option" class="qodef-cd-import-option" data-option-name="import_option" data-option-type="selectbox">
									<option value="none"><?php esc_html_e('Please Select', 'aperitif-core'); ?></option>
									<option value="complete"><?php esc_html_e('All', 'aperitif-core'); ?></option>
									<option value="content"><?php esc_html_e('Content', 'aperitif-core'); ?></option>
									<option value="widgets"><?php esc_html_e('Widgets', 'aperitif-core'); ?></option>
									<option value="options"><?php esc_html_e('Options', 'aperitif-core'); ?></option>
									<option value="single-page"><?php esc_html_e('Single Page', 'aperitif-core'); ?></option>
								</select>
							</div>
							<div class="qodef-cd-box-form-section-column">
								<label class="qodef-cd-label"><?php esc_html_e('Import Attachments', 'aperitif-core'); ?></label>
								<div class="qode-cd-switch">
									<label class="qode-cd-cb-enable selected"><span><?php esc_html_e('Yes', 'aperitif-core'); ?></span></label>
									<label class="qode-cd-cb-disable"><span><?php esc_html_e('No', 'aperitif-core'); ?></span></label>
									<input type="checkbox" class="qodef-cd-import-attachments checkbox" name="import_attachments" value="1" checked="checked">
								</div>
							</div>
						</div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-dependency"></div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-progress">
							<span><?php esc_html_e('The import process may take some time. Please be patient.', 'aperitif-core') ?></span>
							<progress id="qodef-progress-bar" value="0" max="100"></progress>
							<span class="qodef-cd-progress-percent"><?php esc_attr_e('0%', 'aperitif-core'); ?></span>
						</div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-last-section">
							<span class="qodef-cd-import-is-completed"><?php esc_html_e('Import is completed', 'aperitif-core') ?></span>
							<input type="submit" class="qodef-cd-button" value="<?php esc_attr_e('Import', 'aperitif-core'); ?>" name="import" id="qodef-<?php echo esc_attr($submit); ?>" />
						</div>
						<?php wp_nonce_field("qodef_cd_import_nonce","qodef_cd_import_nonce") ?>
					</form>
				</div>
				<?php } else { ?>
					<div class="qodef-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'aperitif-core'); ?></h3>
						<p><?php esc_html_e('Please activate your copy of the theme by registering the theme so you could proceed with the demo import process. ', 'aperitif-core'); ?></p>
					</div>
					<div class="qodef-cd-box-inner">
						<div class="qodef-cd-box-section">
							<div class="qodef-cd-field-holder">
								<a href="<?php echo admin_url('admin.php?page=aperitif_core_dashboard'); ?>" class="qodef-cd-button"><?php esc_attr_e('Activate your theme copy', 'aperitif-core'); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>