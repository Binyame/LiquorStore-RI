(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefButton.init();
	});
	
	var qodefButton = {
		init: function () {
			this.buttons = $('.qodef-button');
			
			if (this.buttons.length) {
				this.buttons.each(function () {
					var $thisButton = $(this);
					
					qodefButton.buttonHoverColor($thisButton);
					qodefButton.buttonHoverBgColor($thisButton);
					qodefButton.buttonHoverBorderColor($thisButton);
				});
			}
		},
		buttonHoverColor: function (button) {
			if (typeof button.data('hover-color') !== 'undefined') {
				var hoverColor = button.data('hover-color');
				var originalColor = button.css('color');
				
				button.on('mouseenter', function () {
					qodefButton.changeColor(button, 'color', hoverColor);
				});
				button.on('mouseleave', function () {
					qodefButton.changeColor(button, 'color', originalColor);
				});
			}
		},
		buttonHoverBgColor: function (button) {
			if (typeof button.data('hover-background-color') !== 'undefined') {
				var hoverBackgroundColor = button.data('hover-background-color');
				var originalBackgroundColor = button.css('background-color');
				
				button.on('mouseenter', function () {
					qodefButton.changeColor(button, 'background-color', hoverBackgroundColor);
				});
				button.on('mouseleave', function () {
					qodefButton.changeColor(button, 'background-color', originalBackgroundColor);
				});
			}
		},
		buttonHoverBorderColor: function (button) {
			if (typeof button.data('hover-border-color') !== 'undefined') {
				var hoverBorderColor = button.data('hover-border-color');
				var originalBorderColor = button.css('borderTopColor');
				
				button.on('mouseenter', function () {
					qodefButton.changeColor(button, 'border-color', hoverBorderColor);
				});
				button.on('mouseleave', function () {
					qodefButton.changeColor(button, 'border-color', originalBorderColor);
				});
			}
		},
		changeColor: function (button, cssProperty, color) {
			button.css(cssProperty, color);
		}
	};
	
})(jQuery);