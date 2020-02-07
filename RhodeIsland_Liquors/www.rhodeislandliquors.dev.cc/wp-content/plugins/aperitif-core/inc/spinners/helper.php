<?php

if ( ! function_exists( 'aperitif_core_load_spinners' ) ) {
	/**
	 * Loads Spinners HTML
	 */
	function aperitif_core_load_spinners() {
		$id = qode_framework_get_page_id();

		if ( aperitif_core_get_post_value_through_levels( 'qodef_page_enable_loader', $id ) === 'yes' ) { ?>
            <div class="qodef-smooth-transition-loader">
                <div class="qodef-st-loader">
                    <div class="qodef-st-loader-inner">
						<?php aperitif_core_loading_spinners(); ?>
                    </div>
                </div>
            </div>
		<?php }
	}

	function aperitif_core_loading_spinners() {
		$id           = qode_framework_get_page_id();
		$spinner_type = aperitif_core_get_post_value_through_levels( 'qodef_page_spinners', $id );

		$spinner_html = '';
		if ( ! empty( $spinner_type ) ) {
			switch ( $spinner_type ) {
				case 'aperitif_spinner':
					$spinner_html = aperitif_core_loading_spinner_aperitif_spinner();
					break;
				case 'rotate_circles':
					$spinner_html = aperitif_core_loading_spinner_rotate_circles();
					break;
				case 'pulse':
					$spinner_html = aperitif_core_loading_spinner_pulse();
					break;
				case 'double_pulse':
					$spinner_html = aperitif_core_loading_spinner_double_pulse();
					break;
				case 'cube':
					$spinner_html = aperitif_core_loading_spinner_cube();
					break;
				case 'rotating_cubes':
					$spinner_html = aperitif_core_loading_spinner_rotating_cubes();
					break;
				case 'stripes':
					$spinner_html = aperitif_core_loading_spinner_stripes();
					break;
				case 'wave':
					$spinner_html = aperitif_core_loading_spinner_wave();
					break;
				case 'two_rotating_circles':
					$spinner_html = aperitif_core_loading_spinner_two_rotating_circles();
					break;
				case 'five_rotating_circles':
					$spinner_html = aperitif_core_loading_spinner_five_rotating_circles();
					break;
				case 'atom':
					$spinner_html = aperitif_core_loading_spinner_atom();
					break;
				case 'clock':
					$spinner_html = aperitif_core_loading_spinner_clock();
					break;
				case 'mitosis':
					$spinner_html = aperitif_core_loading_spinner_mitosis();
					break;
				case 'lines':
					$spinner_html = aperitif_core_loading_spinner_lines();
					break;
				case 'fussion':
					$spinner_html = aperitif_core_loading_spinner_fussion();
					break;
				case 'wave_circles':
					$spinner_html = aperitif_core_loading_spinner_wave_circles();
					break;
				case 'pulse_circles':
					$spinner_html = aperitif_core_loading_spinner_pulse_circles();
					break;
				default:
					$spinner_html = aperitif_core_loading_spinner_pulse();
			}
		}

		echo wp_kses( $spinner_html, array(
			'div'  => array(
				'class' => true,
				'style' => true,
				'id'    => true
			),
			'span' => array(
				'class' => true,
				'style' => true,
				'id'    => true
			)
		) );
	}

	function aperitif_core_loading_spinner_aperitif_spinner() {
		$html = '';
		$html .= '<div class="qodef-aperitif-spinner-bg-holder"></div>';
		$html .= '<div class="qodef-aperitif-spinner-holder">';
		$html .= '<span class="qodef-aperitif-spinner-text">Loading</span>';
		$html .= '<span class="qodef-aperitif-spinner-line"><span class="qodef-aperitif-spinner-line-front"></span></span>';
		$html .= '<div class="qodef-aperitif-spinner-number-holder">';
		$html .= '<span class="qodef-aperitif-spinner-number">0</span><span class="qodef-aperitif-spinner-percent">%</span>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_rotate_circles() {
		$html = '';
		$html .= '<div class="qodef-rotate-circles">';
		$html .= '<div></div>';
		$html .= '<div></div>';
		$html .= '<div></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_pulse() {
		$html = '<div class="pulse"></div>';

		return $html;
	}

	function aperitif_core_loading_spinner_double_pulse() {
		$html = '';
		$html .= '<div class="double_pulse">';
		$html .= '<div class="double-bounce1"></div>';
		$html .= '<div class="double-bounce2"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_cube() {
		$html = '<div class="cube"></div>';

		return $html;
	}

	function aperitif_core_loading_spinner_rotating_cubes() {
		$html = '';
		$html .= '<div class="rotating_cubes">';
		$html .= '<div class="cube1"></div>';
		$html .= '<div class="cube2"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_stripes() {
		$html = '';
		$html .= '<div class="stripes">';
		$html .= '<div class="rect1"></div>';
		$html .= '<div class="rect2"></div>';
		$html .= '<div class="rect3"></div>';
		$html .= '<div class="rect4"></div>';
		$html .= '<div class="rect5"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_wave() {
		$html = '';
		$html .= '<div class="wave">';
		$html .= '<div class="bounce1"></div>';
		$html .= '<div class="bounce2"></div>';
		$html .= '<div class="bounce3"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_two_rotating_circles() {
		$html = '';
		$html .= '<div class="two_rotating_circles">';
		$html .= '<div class="dot1"></div>';
		$html .= '<div class="dot2"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_five_rotating_circles() {
		$html = '';
		$html .= '<div class="five_rotating_circles">';
		$html .= '<div class="spinner-container container1">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container2">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container3">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_atom() {
		$html = '';
		$html .= '<div class="atom">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_clock() {
		$html = '';
		$html .= '<div class="clock">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_mitosis() {
		$html = '';
		$html .= '<div class="mitosis">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_lines() {
		$html = '';
		$html .= '<div class="lines">';
		$html .= '<div class="line1"></div>';
		$html .= '<div class="line2"></div>';
		$html .= '<div class="line3"></div>';
		$html .= '<div class="line4"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_fussion() {
		$html = '';
		$html .= '<div class="fussion">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_wave_circles() {
		$html = '';
		$html .= '<div class="wave_circles">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}

	function aperitif_core_loading_spinner_pulse_circles() {
		$html = '';
		$html .= '<div class="pulse_circles">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}

	// aperitif_action_after_body_tag_open

	add_action( 'aperitif_action_before_wrapper_close_tag', 'aperitif_core_load_spinners' );
}

if ( ! function_exists( 'aperitif_core_set_spinners_styles' ) ) {
	/**
	 * Function that generates spinners inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_spinners_styles( $style ) {
		$spinner_styles = array();

		$spinner_background_color = aperitif_core_get_post_value_through_levels( 'qodef_page_spinner_background_color' );
		$spinner_color            = aperitif_core_get_post_value_through_levels( 'qodef_page_spinner_color' );

		if ( ! empty( $spinner_background_color ) ) {
			$spinner_styles['background-color'] = $spinner_background_color;
		}

		if ( ! empty( $spinner_color ) ) {
			$spinner_styles['color'] = $spinner_color;
		}

		if ( ! empty( $spinner_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-smooth-transition-loader .qodef-st-loader .qodef-st-loader-inner', $spinner_styles );
		}

		return $style;
	}

	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_set_spinners_styles' );
}