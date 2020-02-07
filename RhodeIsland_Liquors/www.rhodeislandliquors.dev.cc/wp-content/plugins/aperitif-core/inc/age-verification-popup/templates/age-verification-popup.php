<div id="qodef-age-verification-popup-modal" class="qodef-avp-holder <?php echo esc_attr( $holder_classes ); ?>" <?php qode_framework_inline_style( $content_style ); ?>>
	
	<div class="qodef-avp-logo">
		<?php aperitif_core_get_header_logo_image(); ?>
	</div>
	
	<div class="qodef-avp-inner">
		
		<div class="qodef-avp-content-container">
			
			<?php if ( ! empty( $title ) ) : ?>
				<h2 class="qodef-avp-title">
					<?php echo esc_html( $title ); ?>
				</h2>
			<?php endif; ?>
			
			<?php if ( ! empty( $subtitle ) ): ?>
				<div class="qodef-avp-subtitle">
					<?php echo esc_html( $subtitle ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( ! empty( $note ) ): ?>
				<div class="qodef-avp-note">
					<?php echo esc_html( $note ); ?>
				</div>
			<?php endif; ?>
			
			<div class="qodef-avp-prevent">
				<?php
				$button_params = array(
					'link'             => '#',
					'text'             => esc_html__( 'Yes I am', 'aperitif-core' ),
					'size'             => 'normal',
					'button_layout'    => 'filled',
					'custom_class'     => 'qodef-avp-prevent-yes',
				);
				echo AperitifCoreButtonShortcode::call_shortcode( $button_params ); ?>
				
				<?php
				$button_params = array(
					'link'             => esc_url( $params['link'] ),
					'text'             => esc_html__( 'No I am not', 'aperitif-core' ),
					'size'             => 'normal',
					'button_layout'    => 'outlined',
					'custom_class'     => 'qodef-avp-prevent-no',
				);
				echo AperitifCoreButtonShortcode::call_shortcode( $button_params ); ?>
				
			</div>
		</div>
	</div>
</div>
