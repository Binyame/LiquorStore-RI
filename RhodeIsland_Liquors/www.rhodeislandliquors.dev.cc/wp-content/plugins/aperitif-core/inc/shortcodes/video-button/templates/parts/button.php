<?php if ( ! empty( $video_link ) ) { ?>
	<a itemprop="url"
	   class="qodef-m-play qodef-magnific-popup qodef-popup-item" <?php echo qode_framework_get_inline_style( $play_button_styles ); ?>
	   href="<?php echo esc_url( $video_link ); ?>" data-type="iframe">
		<span class="qodef-m-play-inner">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="125px" height="125px" viewBox="0 0 197 197" enable-background="new 0 0 197 197" xml:space="preserve">
				<circle class="video-button-stroke" stroke-linecap="round" cx="98.5" cy="98.6" r="97.5"></circle>
				<circle class="video-button-circle" stroke-linecap="round" cx="98.5" cy="98.6" r="95.5"></circle>
				<g><path fill="currentColor" d="M88.5,78.6l20,20l-20,20V78.6z"></path></g>
			</svg>
		</span>
		<?php if ( ! empty( $video_title ) || ! empty( $video_subtitle ) ) { ?>
			<div class="qodef-m-play-text">
			<span class="qodef-m-play-title">
				<?php echo esc_html( $video_title ); ?>
			</span>
				<span class="qodef-m-play-subtitle">
				<?php echo esc_html( $video_subtitle ); ?>
			</span>
			</div>
		<?php } ?>
	</a>
<?php } ?>