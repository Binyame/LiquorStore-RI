(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSideArea.init();
	});
	
	var qodefSideArea = {
		init: function () {
			var $sideAreaOpener = $('a.qodef-side-area-opener'),
				$sideAreaClose = $('#qodef-side-area-close'),
				$sideArea = $('#qodef-side-area');
			qodefSideArea.openerHoverColor($sideAreaOpener);

			qodef.body.prepend('<div class="qodef-side-area-cover"/>');

            // Open Side Area
            $sideAreaOpener.on('click', function (e) {
                e.preventDefault();

                if (!qodef.body.hasClass('qodef-side-area--opened')) {
                    qodefSideArea.openSideArea();

                    $(document).keyup(function (e) {
                        if (e.keyCode === 27) {
                            qodefSideArea.closeSideArea();
                        }
                    });
                } else {
                    qodefSideArea.closeSideArea();
                }
            });

            $sideAreaClose.on('click', function (e) {
                e.preventDefault();
                qodefSideArea.closeSideArea();
            });

            if ($sideArea.length && typeof window.qodefCore.qodefPerfectScrollbar === 'object') {
                window.qodefCore.qodefPerfectScrollbar.init($sideArea);
            }
		},
		openSideArea: function () {
            var $wrapper = $('#qodef-page-wrapper'),
                currentScroll = $(window).scrollTop();
            
            qodef.body.removeClass('qodef-side-area-animate--out').addClass('qodef-side-area--opened qodef-side-area-animate--in');

            $('.qodef-side-area-cover').on('click', function (e) {
                e.preventDefault();
                qodefSideArea.closeSideArea();
            });

            $(window).scroll(function () {
                if (Math.abs(qodef.scroll - currentScroll) > 400) {
                    qodefSideArea.closeSideArea();
                }
            });

        },
        closeSideArea: function () {
            qodef.body.removeClass('qodef-side-area--opened qodef-side-area-animate--in').addClass('qodef-side-area-animate--out');
        },
		openerHoverColor: function (opener) {
			if (typeof opener.data('hover-color') !== 'undefined') {
				var hoverColor = opener.data('hover-color');
				var originalColor = opener.css('color');
				
				opener.on('mouseenter', function () {
					opener.css('color', hoverColor);
				});
				opener.on('mouseleave', function () {
					opener.css('color', originalColor);
				});
			}
		},
	};
	
})(jQuery);
