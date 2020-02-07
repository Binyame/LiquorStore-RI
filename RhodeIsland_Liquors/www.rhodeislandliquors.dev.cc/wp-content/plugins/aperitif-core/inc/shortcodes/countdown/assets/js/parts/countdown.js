(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefCountdown.init();
	});
	
	var qodefCountdown = {
		init: function () {
			this.countdowns = $('.qodef-countdown');
			
			if (this.countdowns.length) {
				this.countdowns.each(function () {
					var $thisCountdown = $(this),
						countdownElement = $thisCountdown.find('.qodef-m-date'),
						options = qodefCountdown.generateOptions($thisCountdown);
					qodefCountdown.initCountdown(countdownElement, options);
				});
			}
		},
		generateOptions: function (countdown) {
			var options = {};
			options.date = countdown.data('date') !== undefined ? countdown.data('date') : null;
			
			options.weekLabel = countdown.data('week-label') !== undefined ? countdown.data('week-label') : '';
			options.weekLabelPlural = countdown.data('week-label-plural') !== undefined ? countdown.data('week-label-plural') : '';
			
			options.dayLabel = countdown.data('day-label') !== undefined ? countdown.data('day-label') : '';
			options.dayLabelPlural = countdown.data('day-label-plural') !== undefined ? countdown.data('day-label-plural') : '';
			
			options.hourLabel = countdown.data('hour-label') !== undefined ? countdown.data('hour-label') : '';
			options.hourLabelPlural = countdown.data('hour-label-plural') !== undefined ? countdown.data('hour-label-plural') : '';
			
			options.minuteLabel = countdown.data('minute-label') !== undefined ? countdown.data('minute-label') : '';
			options.minuteLabelPlural = countdown.data('minute-label-plural') !== undefined ? countdown.data('minute-label-plural') : '';
			
			options.secondLabel = countdown.data('second-label') !== undefined ? countdown.data('second-label') : '';
			options.secondLabelPlural = countdown.data('second-label-plural') !== undefined ? countdown.data('second-label-plural') : '';
			
			return options;
			
		},
		initCountdown: function (countdownElement, options) {
			var $weekHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%w</span><span class="qodef-label">' + '%!w:' + options.weekLabel + ',' + options.weekLabelPlural + ';</span></span>';
			var $dayHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%d</span><span class="qodef-label">' + '%!d:' + options.dayLabel + ',' + options.dayLabelPlural + ';</span></span>';
			var $hourHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%H</span><span class="qodef-label">' + '%!H:' + options.hourLabel + ',' + options.hourLabelPlural + ';</span></span>';
			var $minuteHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%M</span><span class="qodef-label">' + '%!M:' + options.minuteLabel + ',' + options.minuteLabelPlural + ';</span></span>';
			var $secondHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit">%S</span><span class="qodef-label">' + '%!S:' + options.secondLabel + ',' + options.secondLabelPlural + ';</span></span>';
			
			countdownElement.countdown(options.date, function (event) {
				$(this).html(event.strftime($weekHTML + $dayHTML + $hourHTML + $minuteHTML + $secondHTML));
			});
		}
	};
	
})(jQuery);