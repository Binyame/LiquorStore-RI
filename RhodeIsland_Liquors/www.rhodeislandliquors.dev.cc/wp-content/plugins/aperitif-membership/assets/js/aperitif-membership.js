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
// Load the SDK asynchronously
(function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {
		return;
	}
	js = d.createElement(s);
	js.id = id;
	js.src = "https://connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefFacebookLogin.init();
	});
	
	$(document).on('aperitif_membership_social_login_is_triggered', function (e, $modal, $form, social) {
		if (qodefFacebookLogin.fbIsAppIdSet() && social === 'facebook') {
			qodefFacebookLogin.fbLogin($modal, $form, social);
		}
	});
	
	var qodefFacebookLogin = {
		init: function () {
			
			if (qodefFacebookLogin.fbIsAppIdSet()) {
				qodefFacebookLogin.fbAsyncInit(aperitifMembershipGlobal.facebookAppId);
			}
		},
		fbIsAppIdSet: function () {
			return typeof aperitifMembershipGlobal.facebookAppId !== 'undefined' && aperitifMembershipGlobal.facebookAppId !== '';
		},
		fbAsyncInit: function (appID) {
			
			if (appID !== '') {
				window.fbAsyncInit = function () {
					FB.init({
						appId: appID, // - test app ID
						autoLogAppEvents: true,
						cookie: true,  // enable cookies to allow the server to access
						xfbml: true,  // parse social plugins on this page
						version: 'v3.3' // use version 3.3
					});
					
					window.FB = FB;
				};
			}
		},
		fbLogin: function ($modal, $form, social) {
			window.FB.login(function (response) {
				qodefFacebookLogin.fbCheckStatus(response, $modal, $form, social);
			}, {scope: 'email, public_profile'});
		},
		fbCheckStatus: function (response, $modal, $form, social) {
			if (response.status === 'connected') {
				// Logged into your app and Facebook.
				qodefFacebookLogin.fbGetUserData($modal, $form, social);
			} else if (response.status === 'not_authorized') {
				// The person is logged into Facebook, but not your app.
				console.log('Please log into this app');
			} else {
				// The person is not logged into Facebook, so we're not sure if
				// they are logged into this app or not.
				console.log('Please log into Facebook');
			}
		},
		fbGetUserData: function ($modal, $form, social) {
			FB.api('/me', 'GET', {'fields': 'id, name, email, link, picture'}, function (response) {
				response.image = response.picture.data.url;
			
				if (!$form.hasClass('qodef--loading')) {
					$modal.triggerRequest($form, social, response);
				}
			});
		}
	};
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefGoogleLogin.init();
	});
	
	$(document).on('aperitif_membership_social_login_is_triggered', function (e, $modal, $form, social) {
		if (qodefGoogleLogin.isAppIdSet() && social === 'google') {
			qodefGoogleLogin.login($modal, $form, social);
		}
	});
	
	var qodefGoogleLogin = {
		init: function () {
			
			if (qodefGoogleLogin.isAppIdSet()) {
				qodefGoogleLogin.asyncInit(aperitifMembershipGlobal.googleAppId);
			}
		},
		isAppIdSet: function () {
			return typeof aperitifMembershipGlobal.googleAppId !== 'undefined' && aperitifMembershipGlobal.googleAppId !== '';
		},
		asyncInit: function (appID) {
			
			if (appID !== '') {
				gapi.load('auth2', function () {
					window.auth2 = gapi.auth2.init({
						client_id: appID
					});
				});
			}
		},
		login: function ($modal, $form, social) {
			
			window.auth2.signIn().then(qodefGoogleLogin.signIn($modal, $form, social), function (e) {
				console.log(e);
			});
		},
		signIn: function ($modal, $form, social) {
			var signedIn = window.auth2.isSignedIn.get();
	
			if (signedIn) {
				qodefGoogleLogin.getUserData($modal, $form, social);
			} else {
				window.gapi.auth2.getAuthInstance().isSignedIn.listen(function (signedIn) {
					if (signedIn) {
						qodefGoogleLogin.getUserData($modal, $form, social);
					}
				});
			}
		},
		getUserData: function ($modal, $form, social) {
			var currentUser = window.auth2.currentUser.get(),
				profile = currentUser.getBasicProfile(),
				response = {
					id: profile.getId(),
					name: profile.getName(),
					email: profile.getEmail(),
					image: profile.getImageUrl()
				};
			
			if (!$form.hasClass('qodef--loading')) {
				$modal.triggerRequest($form, social, response);
			}
		}
	};
	
})(jQuery);
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