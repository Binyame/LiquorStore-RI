(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefIcon.init();
	});
	
	var qodefIcon = {
		init: function () {
			this.icons = $('.qodef-icon-holder');
			
			if (this.icons.length) {
				this.icons.each(function () {
					var $thisIcon = $(this);
					
					qodefIcon.iconHoverColor($thisIcon);
					qodefIcon.iconHoverBgColor($thisIcon);
					qodefIcon.iconHoverBorderColor($thisIcon);
				});
			}
		},
		iconHoverColor: function (iconHolder) {
			if (typeof iconHolder.data('hover-color') !== 'undefined') {
				var originalColor = iconHolder.css('color');
				var hoverColor = iconHolder.data('hover-color');
				
				iconHolder.on('mouseenter', function () {
					qodefIcon.changeColor(iconHolder, 'color', hoverColor);
				});
				iconHolder.on('mouseleave', function () {
					qodefIcon.changeColor(iconHolder, 'color', originalColor);
				});
			}
		},
		iconHoverBgColor: function (iconHolder) {
			if (typeof iconHolder.data('hover-background-color') !== 'undefined') {
				var hoverBackgroundColor = iconHolder.data('hover-background-color');
				var originalBackgroundColor = iconHolder.css('background-color');
				
				iconHolder.on('mouseenter', function () {
					qodefIcon.changeColor(iconHolder, 'background-color', hoverBackgroundColor);
				});
				iconHolder.on('mouseleave', function () {
					qodefIcon.changeColor(iconHolder, 'background-color', originalBackgroundColor);
				});
			}
		},
		iconHoverBorderColor: function (iconHolder) {
			if (typeof iconHolder.data('hover-border-color') !== 'undefined') {
				var hoverBorderColor = iconHolder.data('hover-border-color');
				var originalBorderColor = iconHolder.css('borderTopColor');
				
				iconHolder.on('mouseenter', function () {
					qodefIcon.changeColor(iconHolder, 'border-color', hoverBorderColor);
				});
				iconHolder.on('mouseleave', function () {
					qodefIcon.changeColor(iconHolder, 'border-color', originalBorderColor);
				});
			}
		},
		changeColor: function (iconElement, cssProperty, color) {
			iconElement.css(cssProperty, color);
		}
	};
	
	qodefCore.qodefIcon = qodefIcon;
	
})(jQuery);