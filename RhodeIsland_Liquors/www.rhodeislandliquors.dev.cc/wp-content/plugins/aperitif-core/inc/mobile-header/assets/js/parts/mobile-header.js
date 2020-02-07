(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefMobileHeaderAppearance.init();
	});
	
	/*
	 **	Init mobile header functionality
	 */
	var qodefMobileHeaderAppearance = {
		init: function () {
			if (qodef.body.hasClass('qodef-mobile-header-appearance--sticky')) {
				
				var docYScroll1 = qodef.scroll,
					displayAmount = qodefGlobal.vars.mobileHeaderHeight + qodefGlobal.vars.adminBarHeight,
					$pageOuter = $('#qodef-page-outer');
				
				qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
				$(window).scroll(function () {
					qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
					docYScroll1 = qodef.scroll;
				});
				
				$(window).resize(function () {
					$pageOuter.css('padding-top', 0);
					qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
				});
			}
		},
		showHideMobileHeader: function (docYScroll1, displayAmount, $pageOuter) {
			if (qodef.windowWidth <= 1024) {
				if (qodef.scroll > displayAmount * 2) {
					//set header to be fixed
					qodef.body.addClass('qodef-mobile-header--sticky');
					
					//add transition to it
					setTimeout(function () {
						qodef.body.addClass('qodef-mobile-header--sticky-animation');
					}, 300); //300 is duration of sticky header animation
					
					//add padding to content so there is no 'jumping'
					$pageOuter.css('padding-top', qodefGlobal.vars.mobileHeaderHeight);
				} else {
					//unset fixed header
					qodef.body.removeClass('qodef-mobile-header--sticky');
					
					//remove transition
					setTimeout(function () {
						qodef.body.removeClass('qodef-mobile-header--sticky-animation');
					}, 300); //300 is duration of sticky header animation
					
					//remove padding from content since header is not fixed anymore
					$pageOuter.css('padding-top', 0);
				}
				
				if ((qodef.scroll > docYScroll1 && qodef.scroll > displayAmount) || (qodef.scroll < displayAmount * 3)) {
					//show sticky header
					qodef.body.removeClass('qodef-mobile-header--sticky-display');
				} else {
					//hide sticky header
					qodef.body.addClass('qodef-mobile-header--sticky-display');
				}
			}
		}
	};
	
})(jQuery);