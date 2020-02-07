(function ($) {
	"use strict";
	
	$(document).ready(function () {
		spinners.init();
	});
	
	var spinners = {
		init: function () {
			
			if ($('.qodef-smooth-transition-loader').length) {
				spinners.animateSpinners();
			}
			
		},
		animateSpinners: function () {
			//check for preload animation
			var loader = $('.qodef-smooth-transition-loader'),
				aperitifSpinner = $('.qodef-aperitif-spinner-holder');

			if (aperitifSpinner.length) {
				// elements to appear
				var firstStamp = $('.qodef-stamp').first(),
					iwtLanding = $('.qodef-itw-landing'),
					iwtItems = iwtLanding.find('.qodef-image-with-text'),
					topLandingText = $('.qodef-top-landing-text').find('.qodef-custom-font'),
					topLandingElements = $('.qodef-top-landing-single-image img, .qodef-top-landing-elements'),
					iwtTimeout = 0;

				loader.addClass('qodef-aperitif-loader');

				setTimeout(function() {
					loader.addClass('qodef-aperitif-loader--ready');
				}, 400);

				var numberHolder = aperitifSpinner.find('.qodef-aperitif-spinner-number'),
					spinnerLine = aperitifSpinner.find('.qodef-aperitif-spinner-line-front'),
					percentNumber = 0,
					numberIntervalFastest,
					windowLoaded = false;

				spinnerLine.animate({'width': '100%'}, 10000, 'linear');

				var animatePercent = function() {
					if(percentNumber < 100) {
						percentNumber+=1;
						numberHolder.text(percentNumber);
					}
				}
					
				var numberInterval = setInterval(function() {
					animatePercent();
					if(windowLoaded) {
						clearInterval(numberInterval);
					}
				}, 100);

				$(window).on('load', function() {
					firstStamp.removeClass('qodef--init');
					windowLoaded = true;
					numberIntervalFastest = setInterval(function() {
						if(percentNumber >= 100) {
							clearInterval(numberIntervalFastest);
							spinnerLine.stop().animate({'width': '100%'}, 500);
							setTimeout(function(){
								loader.addClass('qodef-aperitif-loader--finished');
								setTimeout(function() {
									fadeOutLoader();
								}, 900);
								setTimeout(function() {
									setTimeout(function() {
										firstStamp.addClass('qodef--init');
										topLandingElements.addClass('qodef--appear');
									}, 300);
									
									topLandingText.each(function() {
										var thisItem = $(this);
										setTimeout(function() {
											thisItem.addClass('qodef--appear');
										}, iwtTimeout);
										iwtTimeout += 200;
									});

									setTimeout(function() {
										iwtItems.each(function() {
											var thisItem = $(this);
											setTimeout(function() {
												thisItem.addClass('qodef--appear');
											}, iwtTimeout);
											iwtTimeout += 200;
										});
									}, 100);
								}, 1000)
							}, 700);
						} else {
							animatePercent();
						}
					}, 6);
				});
			} else {
				$(window).on('load', function() {
					fadeOutLoader();
				});
			}

			/**
			 * Loader Fade Out function
			 *
			 * @param {number} speed - fade out duration
			 * @param {number} delay - fade out delay
			 * @param {string} easing - fade out easing function
			 */
			var fadeOutLoader = function(speed, delay, easing) {
				speed = speed ? speed : 600;
				delay = delay ? delay : 0;
				easing = easing ? easing : 'swing';

				loader.delay(delay).fadeOut(speed, easing);
				$(window).on('bind', 'pageshow', function (event) {
					if (event.originalEvent.persisted) {
						loader.fadeOut(speed, easing);
					}
				});
			};
		},
	};
	
})(jQuery);
