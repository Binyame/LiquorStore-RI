(function ($) {
	"use strict";
	
	$(window).load(function () {
		qodefEvents.init();
	});
	
	$(window).resize(function () {
		// qodefEvents.init();
	});
	
	var qodefEvents = {
		init: function () {
			this.holder = $('#tribe-events');
			
			qodefEvents.mapSize();
			qodefEvents.viewSize();
			qodefEvents.tooltipPosition();
		},
		mapSize: function () {
			var imageHolder = $('.qodef-events-single-featured-image .tribe-events-event-image');
			var mapHolder = $('.qodef-events-single-map .tribe-events-venue-map div');
			
			var imageHolderSize = imageHolder.outerHeight();
			
			mapHolder.css("height", imageHolderSize);
		},
		viewSize: function () {
			var viewButtonHolder = $('.tribe-bar-views-toggle');
			var viewListHolder = $('.tribe-bar-views-list');
			
			var viewButtonSize = viewButtonHolder.outerWidth();
			
			viewListHolder.css("width", viewButtonSize);
		},
		tooltipPosition: function () {
			var tableCellHolder = $('.tribe-events-calendar td').first();
			var tableCellSize = tableCellHolder.outerWidth() + 40;
			
			var css = '.tribe-events-tooltip { ' +
				'width: ' + tableCellSize + 'px !important; ' +
				'left: -20px !important; ' +
				'bottom: 100% !important;' +
				'}',
				head = document.head || document.getElementsByTagName('head')[0],
				style = document.createElement('style');
			
			head.appendChild(style);
			
			style.type = 'text/css';
			if (style.styleSheet) {
				// This is required for IE8 and below.
				style.styleSheet.cssText = css;
			} else {
				style.appendChild(document.createTextNode(css));
			}
		}
	};
	
})(jQuery);