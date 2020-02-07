<?php

if ( ! function_exists( 'aperitif_core_add_author_info_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_author_info_widget( $widgets ) {
		$widgets[] = 'AperitifCoreAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_author_info_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreAuthorInfoWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'aperitif_core_author_info' );
			$this->set_name( esc_html__( 'Aperitif Author Info', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Add author info element into widget areas', 'aperitif-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'author_username',
					'title'      => esc_html__( 'Author Username', 'aperitif-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$author_id = 1;
			if ( ! empty( $atts['author_username'] ) ) {
				$author = get_user_by( 'login', $atts['author_username'] );
				
				if ( ! empty( $author ) ) {
					$author_id = $author->ID;
				}
			}
			
			$author_link     = get_author_posts_url( $author_id );
			$author_bio      = get_the_author_meta( 'description', $author_id );
			$author_country  = get_the_author_meta( 'country', $author_id );
			$author_dob      = get_the_author_meta( 'dob', $author_id );
			$author_position = get_the_author_meta( 'position', $author_id );
			$user_socials    = aperitif_core_get_author_social_networks( $author_id );
			
			?>
			<div class="widget qodef-author-info">
				<a itemprop="url" class="qodef-author-info-image" href="<?php echo esc_url( $author_link ); ?>">
					<?php echo get_avatar( $author_id, 240 ); ?>
				</a>
				<?php if ( ! empty( $author_bio ) ) { ?>
					<h5 class="qodef-author-info-name vcard author">
						<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>"
						   title="<?php the_title_attribute(); ?>">
							<span class="fn"><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></span>
						</a>
					</h5>
					
					<?php if ( $author_position !== "" ) { ?>
						<p class="qodef-m-position"><?php echo wp_kses_post( $author_position ); ?></p>
					<?php } ?>
					<?php if ( $author_country !== "" ) { ?>
						<p class="qodef-m-country"><?php echo wp_kses_post( $author_country ); ?></p>
					<?php } ?>
					<?php if ( $author_dob !== "" ) { ?>
						<p class="qodef-m-dob"><?php echo wp_kses_post( $author_dob ); ?></p>
					<?php } ?>
					<p itemprop="description"
					   class="qodef-author-info-description"><?php echo esc_html( $author_bio ); ?></p>
				<?php } ?>
				<?php if ( ! empty( $user_socials ) ) { ?>
					<div class="qodef-m-social-icons">
						<?php foreach ( $user_socials as $social ) { ?>
							<a itemprop="url" class="<?php echo esc_attr( $social['class'] ) ?>"
							   href="<?php echo esc_url( $social['url'] ) ?>" target="_blank">
								<?php echo qode_framework_icons()->render_icon( $social['icon'], 'elegant-icons' ); ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<?php
		}
	}
}
