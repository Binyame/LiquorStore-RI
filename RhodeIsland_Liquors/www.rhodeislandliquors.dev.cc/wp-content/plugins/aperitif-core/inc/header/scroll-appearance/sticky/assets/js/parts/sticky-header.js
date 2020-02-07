(function ($) {
	"use strict";
	
	var stickyHeaderAppearance = {
		displayAmount: function () {
			if (qodefGlobal.vars.qodefStickyHeaderScrollAmount !== 0) {
				return parseInt(qodefGlobal.vars.qodefStickyHeaderScrollAmount);
			} else {
				return parseInt(qodefGlobal.vars.headerHeight + qodefGlobal.vars.adminBarHeight);
			}
		},
		showHideHeader: function (displayAmount) {
			
			if (qodef.scroll < displayAmount) {
				qodef.body.removeClass('qodef-header--sticky-display');
			} else {
				qodef.body.addClass('qodef-header--sticky-display');
			}
		},
		init: function () {
			var displayAmount = stickyHeaderAppearance.displayAmount();
			
			stickyHeaderAppearance.showHideHeader(displayAmount);
			$(window).scroll(function () {
				stickyHeaderAppearance.showHideHeader(displayAmount);
			});
		}
	};
	
	qodef.stickyHeaderAppearance = stickyHeaderAppearance.init;
	
})(jQuery);