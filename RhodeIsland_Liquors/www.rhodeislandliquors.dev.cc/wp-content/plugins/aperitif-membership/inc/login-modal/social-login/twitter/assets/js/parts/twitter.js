(function ($) {
	"use strict";
	
	$(document).on('aperitif_membership_social_login_is_triggered', function (e, $modal, $form, social) {
		if (social === 'twitter') {
			qodefTwitterLogin.triggerRequest($modal, $form, social);
		}
	});
	
	var qodefTwitterLogin = {
		triggerRequest: function ($modal, $form, social) {
			
			if (!$form.hasClass('qodef--loading')) {
				$modal.triggerRequest($form, social);
			}
		}
	};
	
})(jQuery);