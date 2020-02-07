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