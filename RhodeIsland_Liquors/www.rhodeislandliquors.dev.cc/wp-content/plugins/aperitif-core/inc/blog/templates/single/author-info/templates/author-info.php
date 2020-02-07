<?php
$is_enabled = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_enable_author_info' );

if ( $is_enabled === 'yes' && get_the_author_meta( 'description' ) !== '' ) {
	$author_id       = get_the_author_meta( 'ID' );
	$author_link     = get_author_posts_url( $author_id );
	$email_enabled   = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_enable_author_info_email' ) === 'yes';
	$user_socials    = aperitif_core_get_author_social_networks( $author_id );
	$author_country  = get_the_author_meta( 'country', $author_id );
	$author_dob      = get_the_author_meta( 'dob', $author_id );
	$author_position = get_the_author_meta( 'position', $author_id );
	
	?>
	<div id="qodef-author-info" class="qodef-m">
		<div class="qodef-m-inner">
			<div class="qodef-m-image">
				<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 240 ); ?>
				</a>
			</div>
			<div class="qodef-m-content">
				<h5 class="qodef-m-author vcard author">
					
					<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>"
					   title="<?php the_title_attribute(); ?>">
						<span class="fn"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></span>
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
				
				<?php if ( $email_enabled && is_email( get_the_author_meta( 'email' ) ) ) { ?>
					<p itemprop="email"
					   class="qodef-m-email"><?php echo sanitize_email( get_the_author_meta( 'email' ) ); ?></p>
				<?php } ?>
				<p itemprop="description"
				   class="qodef-m-description"><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
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
		</div>
	</div>
<?php } ?>