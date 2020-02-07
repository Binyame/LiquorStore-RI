(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefBackToTop.init();
	});
	
	var qodefBackToTop = {
		init: function () {
			this.holder = $('#qodef-back-to-top');
			
			// Scroll To Top
			this.holder.on('click', function (e) {
				e.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, $(window).scrollTop() / 5, 'swing');
			});
			
			qodefBackToTop.showHideBackToTop();
		},
		showHideBackToTop: function () {
			$(window).scroll(function () {
				var b = $(this).scrollTop(),
					c = $(this).height(),
					d;
				
				if (b > 0) {
					d = b + c / 2;
				} else {
					d = 1;
				}
				
				if (d < 1e3) {
					qodefBackToTop.addClass('off');
				} else {
					qodefBackToTop.addClass('on');
				}
			});
		},
		addClass: function (a) {
			this.holder.removeClass('qodef-back-to-top--off qodef-back-to-top--on');
			
			if (a === 'on') {
				this.holder.addClass('qodef-back-to-top--on');
			} else {
				this.holder.addClass('qodef-back-to-top--off');
			}
		}
	};
	
})(jQuery);
