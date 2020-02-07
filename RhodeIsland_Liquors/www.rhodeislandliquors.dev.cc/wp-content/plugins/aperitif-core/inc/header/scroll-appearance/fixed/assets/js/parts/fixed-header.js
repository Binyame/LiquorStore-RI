(function ($) {
	"use strict";
	
	var fixedHeaderAppearance = {
		showHideHeader: function ($pageOuter, $header) {
			if (qodef.windowWidth > 1024) {
				if (qodef.scroll <= 0) {
					qodef.body.removeClass('qodef-header--fixed-display');
					$pageOuter.css('padding-top', '0');
					$header.css('margin-top', '0');
				} else {
					qodef.body.addClass('qodef-header--fixed-display');
					$pageOuter.css('padding-top', parseInt(qodefGlobal.vars.headerHeight + qodefGlobal.vars.topAreaHeight) + 'px');
					$header.css('margin-top', parseInt(qodefGlobal.vars.topAreaHeight) + 'px');
				}
			}
		},
		init: function () {
			var $pageOuter = $('#qodef-page-outer'),
				$header = $('#qodef-page-header');
			fixedHeaderAppearance.showHideHeader($pageOuter, $header);
			$(window).scroll(function () {
				fixedHeaderAppearance.showHideHeader($pageOuter, $header);
			});
			$(window).resize(function () {
				$pageOuter.css('padding-top', '0');
				fixedHeaderAppearance.showHideHeader($pageOuter, $header);
			});
		}
	};
	
	qodef.fixedHeaderAppearance = fixedHeaderAppearance.init;
	
})(jQuery);