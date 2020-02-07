(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSearchCoversHeader.init();
	});
	
	var qodefSearchCoversHeader = {
		init: function () {
			var $searchOpener = $('a.qodef-search-opener'),
				$searchForm = $('form.qodef-search-cover'),
				$searchClose = $('.qodef-search-close');
			
			if ($searchOpener.length && $searchForm.length) {
				$searchOpener.on('click', function (e) {
					e.preventDefault();
					qodefSearchCoversHeader.openCoversHeader($searchForm);
					
				});
				$searchClose.on('click', function (e) {
					e.preventDefault();
					qodefSearchCoversHeader.closeCoversHeader($searchForm);
				});
			}
		},
		openCoversHeader: function ($searchForm) {
			qodef.body.addClass('qodef-covers-search--opened qodef-covers-search--fadein');
			qodef.body.removeClass('qodef-covers-search--fadeout');
			
			setTimeout(function () {
				$searchForm.find('.qodef-search-field').focus();
			}, 600);
		},
		closeCoversHeader: function ($searchForm) {
			qodef.body.removeClass('qodef-covers-search--opened qodef-covers-search--fadein');
			qodef.body.addClass('qodef-covers-search--fadeout');
			
			setTimeout(function () {
				$searchForm.find('.qodef-search-field').val('');
				$searchForm.find('.qodef-search-field').blur();
				qodef.body.removeClass('qodef-covers-search--fadeout');
			}, 300);
		}
	};
	
})(jQuery);
