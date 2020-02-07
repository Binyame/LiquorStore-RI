(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefLoginModal.init();
	});
	
	var qodefLoginModal = {
		init: function () {
			this.holder = $('#qodef-membership-login-modal');
			
			if (this.holder.length) {
				qodefLoginModal.triggerShowModal(this.holder);
				qodefLoginModal.initTabs(this.holder);
				qodefLoginModal.triggerResetPasswordLink(this.holder);
				qodefLoginModal.triggerLoginLink(this.holder);
				qodefLoginModal.triggerRegisterLink(this.holder);
				qodefLoginModal.triggerFormSubmit(this.holder);
				qodefLoginModal.triggerFormSocialSubmit(this.holder);
			}
		},
		triggerShowModal: function ($holder) {
			$holder.children('.qodef-membership-login-modal-overlay').on('click', function () {
				qodefLoginModal.hideModal($holder);
				$('.qodef-svg-close-cursor').css('opacity', 0);
			});
			
			// Esc press
			$(window).on('keyup', function (e) {
				if (e.keyCode === 27) {
					qodefLoginModal.hideModal($holder);
				}
			});
			
			$(document.body).on('aperitif_membership_trigger_login_modal', function () {
				qodefLoginModal.showModal($holder);
			});
		},
		showModal: function ($holder) {
			if (!$holder.hasClass('qodef--opened')) {
				$holder.addClass('qodef--opened');
			}
		},
		hideModal: function ($holder) {
			if ($holder.hasClass('qodef--opened')) {
				$holder.removeClass('qodef--opened');
			}
		},
		initTabs: function ($holder) {
			$holder.children('.qodef-membership-login-modal-content').tabs();
		},
		triggerLoginLink: function ($holder) {
			$(document.body).on('aperitif_membership_trigger_login_modal_login_tab', function () {
				var $navigationItem = $holder.find('.qodef-membership-login-modal-navigation .qodef-m-navigation-item.qodef--login');

				if ($navigationItem.length) {
					$navigationItem.find('.qodef-e-link').trigger('click');
				}
			});
		},
		triggerRegisterLink: function ($holder) {
			$(document.body).on('aperitif_membership_trigger_login_modal_register_tab', function () {
				var $navigationItem = $holder.find('.qodef-membership-login-modal-navigation .qodef-m-navigation-item.qodef--register');

				if ($navigationItem.length) {
					$navigationItem.find('.qodef-e-link').trigger('click');
				}
			});

			$holder.find('#qodef-membership-login-modal-part .qodef-m-links-register').on('click', function (e) {
				e.preventDefault();

				var $navigationItem = $holder.find('.qodef-membership-login-modal-navigation .qodef-m-navigation-item.qodef--register');

				if ($navigationItem.length) {
					$navigationItem.find('.qodef-e-link').trigger('click');
				}
			});
		},
		triggerResetPasswordLink: function ($holder) {
			$holder.find('#qodef-membership-login-modal-part .qodef-m-links-reset-password').on('click', function (e) {
				e.preventDefault();
				
				var $navigationItem = $holder.find('.qodef-membership-login-modal-navigation .qodef-m-navigation-item.qodef--reset-password');
				
				if ($navigationItem.length) {
					$navigationItem.find('.qodef-e-link').trigger('click');
				}
			});
		},
		triggerFormSubmit: function ($holder) {
			var $forms = $holder.find('form');
			
			if ($forms.length) {
				$forms.each(function () {
					var $thisForm = $(this);
					
					$thisForm.on('submit', function (e) {
						e.preventDefault();
						
						if (!$thisForm.hasClass('qodef--loading')) {
							qodefLoginModal.triggerRequest($thisForm);
						}
					});
				});
			}
		},
		triggerFormSocialSubmit: function ($holder) {
			var $form = $holder.find('form[id*="qodef-membership-login"]');
			
			if ($form.length) {
				var $socialButton = $form.find('.qodef-m-social-login');
				
				$socialButton.find('.qodef-m-social-login-btn').on('click', function (e) {
					e.preventDefault();
					
					$(document).trigger('aperitif_membership_social_login_is_triggered', [qodefLoginModal, $form, $(this).data('social')]);
				});
			}
		},
		triggerRequest: function ($holder, socialNetwork, socialResponse) {
			$holder.addClass('qodef--loading');
			
			var $responseHolder = $holder.find('.qodef-m-response'),
				$requestType = $holder.find('.qodef-m-request-type').val();
			
			$responseHolder.removeClass('qodef--success qodef--error qodef--undefined').empty();
			
			var ajaxData = {
				options: {
					request_type: $requestType,
					redirect: $holder.find('.qodef-m-redirect').val(),
					private_key: 'false'
				},
				nonce: $holder.find('#aperitif-membership-ajax-' + $requestType + '-nonce').val()
			};
			
			var httpType = "POST";
			var restRoute = qodefGlobal.vars.loginModalRestRoute;
			
			switch ($requestType) {
				case 'login':
					httpType = "GET";
					restRoute = qodefGlobal.vars.loginModalGetRestRoute;
					
					ajaxData.options.user_login = $holder.find('.qodef-m-user-name').val();
					ajaxData.options.user_password = $holder.find('.qodef-m-user-password').val();
					ajaxData.options.remember = $holder.find('.qodef-m-links-remember:checked').length;
					
					if (typeof socialNetwork !== 'undefined' && socialNetwork !== null) {
						ajaxData.options.social_login = socialNetwork;
						
						if (typeof socialResponse !== 'undefined' && socialResponse !== null) {
							ajaxData.options.social_response = socialResponse;
						}
					}
					break;
				case 'register':
					ajaxData.options.user_login = $holder.find('.qodef-m-user-name').val();
					ajaxData.options.user_email = $holder.find('.qodef-m-user-email').val();
					ajaxData.options.user_password = $holder.find('.qodef-m-user-password').val();
					ajaxData.options.user_confirm_password = $holder.find('.qodef-m-user-confirm-password').val();
					break;
				case 'reset-password':
					ajaxData.options.user_login = $holder.find('.qodef-m-user-login').val();
					break;
			}
			
			$.ajax({
				type: httpType,
				url: qodefGlobal.vars.restUrl + restRoute,
				data: ajaxData,
				success: function (response) {
					$responseHolder.addClass('qodef--' + response.status).html(response.message);
					
					if (response.status === 'success') {
						if ($requestType === 'register' && !ajaxData.options.hasOwnProperty('social_login')) {
							qodefLoginModal.triggerForceLogin($holder, ajaxData, response.redirect);
						} else {
							qodefLoginModal.triggerRedirection(response.redirect);
						}
					}
				},
				complete: function () {
					$holder.removeClass('qodef--loading');
				}
			});
			
			return false;
		},
		triggerRedirection: function (url) {
			if (url !== '' && url !== window.location) {
				window.location = url;
			}
		},
		triggerForceLogin: function ($holder, ajaxData, redirect) {
			ajaxData.options.request_type = 'login';
			ajaxData.nonce = $holder.parent().find('#aperitif-membership-ajax-login-nonce').val();
	
			$.ajax({
				type: "GET",
				url: qodefGlobal.vars.restUrl + qodefGlobal.vars.loginModalGetRestRoute,
				data: ajaxData,
                dataType: 'json',
				success: function (response) {
					
					if (response.status === 'success') {
						qodefLoginModal.triggerRedirection(redirect);
					}
				}
			});
		}
	};
	
})(jQuery);