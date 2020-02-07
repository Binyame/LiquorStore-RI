<div id="qodef-subscribe-popup-modal" class="qodef-sp-holder <?php echo esc_attr( $holder_classes ); ?>">
	
	<div class="qodef-sp-inner">
		
		<a class="qodef-sp-close" href="javascript:void(0)">
			<svg x="0px" y="0px" width="18.991px" height="18.886px" viewBox="0.726 0.094 18.991 18.886"
			     enable-background="new 0.726 0.094 18.991 18.886" xml:space="preserve">
				<rect x="-1.846" y="8.3" transform="matrix(-0.7074 -0.7068 0.7068 -0.7074 10.8031 23.5363)"
				      width="24.239" height="2.463"/>
				<rect x="-1.956" y="8.306" transform="matrix(0.7068 -0.7074 0.7074 0.7068 -3.7672 9.985)" width="24.237"
				      height="2.463"/>
			</svg>
		</a>
		
		<div class="qodef-sp-content-container" <?php qode_framework_inline_style( $content_style ); ?>>
			
			<?php if ( ! empty( $title ) ) : ?>
				<h3 class="qodef-sp-title">
					<?php echo esc_html( $title ); ?>
				</h3>
			<?php endif; ?>
			<?php if ( ! empty( $subtitle ) ): ?>
				<div class="qodef-sp-subtitle">
					<?php echo esc_html( $subtitle ); ?>
				</div>
			<?php endif; ?>
			
			<?php echo do_shortcode( '[contact-form-7 id="' . $contact_form . '"]' ); ?>
			
			<?php if ( $enable_prevent === 'yes' ) : ?>
				<div class="qodef-sp-prevent">
					<div class="qodef-sp-prevent-inner">
                        <span class="qodef-sp-prevent-input" data-value="no">
                            <svg x="0px" y="0px" width="10.656px" height="10.692px" viewBox="0 0 10.656 10.692"
                                 enable-background="new 0 0 10.656 10.692" xml:space="preserve">
                                <path d="M10.415,9.752c0.252,0.254,0.303,0.611,0.114,0.8l0,0c-0.188,0.188-0.545,0.136-0.798-0.118L0.242,0.913 C-0.011,0.658-0.062,0.3,0.127,0.111l0,0C0.316-0.075,0.673-0.023,0.926,0.23L10.415,9.752z"/>
                                <path d="M0.229,9.779c-0.253,0.253-0.305,0.609-0.117,0.799l0,0c0.188,0.189,0.545,0.138,0.799-0.115l9.515-9.495 c0.253-0.254,0.305-0.611,0.117-0.801l0,0C10.355-0.021,9.998,0.03,9.744,0.283L0.229,9.779z"/>
                            </svg>
                        </span>
						<label class="qodef-sp-prevent-label"><?php esc_html_e( 'Prevent This Pop-up', 'aperitif-core' ); ?></label>
					</div>
				</div>
			<?php endif; ?>
		
		</div>
	
	
	</div>


</div>
