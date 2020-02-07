(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefCounter.init();
	});
	
	var qodefCounter = {
		init: function () {
			this.counters = $('.qodef-counter');
			
			if (this.counters.length) {
				this.counters.each(function () {
					var $thisCounter = $(this),
						counterElement = $thisCounter.find('.qodef-m-digit'),
						options = qodefCounter.generateOptions($thisCounter);
					qodefCounter.counterScript(counterElement, options);
				});
			}
		},
		generateOptions: function (counter) {
			var options = {};
			options.start = counter.data('start-digit') !== undefined ? counter.data('start-digit') : 0;
			options.end = counter.data('end-digit') !== undefined ? counter.data('end-digit') : null;
			options.step = counter.data('step-digit') !== undefined ? counter.data('step-digit') : 1;
			options.delay = counter.data('step-delay') !== undefined ? counter.data('step-delay') : 100;
			options.txt = counter.data('digit-label') !== undefined ? counter.data('digit-label') : '';
			
			return options;
		},
		counterScript: function (counterElement, options) {
			var defaults = {
				start: 0,
				end: null,
				step: 1,
				delay: 100,
				txt: ""
			};
			
			var settings = $.extend(defaults, options || {});
			var nb_start = settings.start;
			var nb_end = settings.end;
			
			counterElement.text(nb_start + settings.txt);
			
			var counter = function () {
				// Definition of conditions of arrest
				if (nb_end !== null && nb_start >= nb_end) {
					return;
				}
				// incrementation
				nb_start = nb_start + settings.step;
				
				if (nb_start >= nb_end) {
					nb_start = nb_end;
				}
				// display
				counterElement.text(nb_start + settings.txt);
			};
			
			// Timer
			// Launches every "settings.delay"
			setInterval(counter, settings.delay);
		}
	};
	
})(jQuery);