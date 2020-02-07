(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefLoginOpener.init();
	});
	
	var qodefLoginOpener = {
		init: function () {
			this.holder = $('.qodef-login-opener-widget');
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefLoginOpener.triggerClick($(this));
				});
			}
		},
		triggerClick: function ($holder) {
			var $openerLogin = $holder.find('.qodef-login-opener.qodef-login');
			
			$openerLogin.on('click', function (e) {
				e.preventDefault();
				
				$(document.body).trigger('aperitif_membership_trigger_login_modal');
				$(document.body).trigger('aperitif_membership_trigger_login_modal_login_tab');
			});

			var $openerRegister = $holder.find('.qodef-login-opener.qodef-register');

			$openerRegister.on('click', function (e) {
				e.preventDefault();

				$(document.body).trigger('aperitif_membership_trigger_login_modal');
				$(document.body).trigger('aperitif_membership_trigger_login_modal_register_tab');
			});
		}
	};
	
})(jQuery);