<?php

if ( is_user_logged_in() ) {
	aperitif_membership_template_part( 'widgets/login-opener', 'templates/logged-in-content' );
} else {
	aperitif_membership_template_part( 'widgets/login-opener', 'templates/logged-out-content' );
}