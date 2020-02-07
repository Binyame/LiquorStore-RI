(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefWooSelect2.init();
		qodefWooQuantityButtons.init();
		qodefWooReviewsPlaceholder.init();
	});
	
	var qodefWooSelect2 = {
		init: function (settings) {
			this.holder = [];
			this.holder.push({
				holder: $('#qodef-woo-page .woocommerce-ordering select'),
				option: {minimumResultsForSearch: Infinity}
			});
			this.holder.push({holder: $('#qodef-woo-page .variations select'), option: {}});
			this.holder.push({holder: $('#qodef-woo-page #calc_shipping_country'), option: {}});
			this.holder.push({holder: $('#qodef-woo-page .shipping select#calc_shipping_state'), option: {}});
			this.holder.push({holder: $('.widget.widget_archive select'), option: {}});
			this.holder.push({holder: $('.widget.widget_categories select'), option: {}});
			this.holder.push({holder: $('.widget.widget_text select'), option: {}});
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (typeof this.holder === 'object') {
				$.each(this.holder, function (key, value) {
					qodefWooSelect2.createSelect2(value.holder, value.options);
				});
			}
		},
		createSelect2: function (holder, options) {
			if (typeof holder.select2 === 'function') {
				holder.select2(options);
			}
		}
	};
	
	var qodefWooQuantityButtons = {
		init: function () {
			$(document).on('click', '.qodef-quantity-minus, .qodef-quantity-plus', function (e) {
				e.stopPropagation();
				
				var button = $(this),
					inputField = button.siblings('.qodef-quantity-input'),
					step = parseFloat(inputField.data('step')),
					max = parseFloat(inputField.data('max')),
					minus = false,
					inputValue = parseFloat(inputField.val()),
					newInputValue;
				
				if (button.hasClass('qodef-quantity-minus')) {
					minus = true;
				}
				
				if (minus) {
					newInputValue = inputValue - step;
					if (newInputValue >= 1) {
						inputField.val(newInputValue);
					} else {
						inputField.val(0);
					}
				} else {
					newInputValue = inputValue + step;
					if (max === undefined) {
						inputField.val(newInputValue);
					} else {
						if (newInputValue >= max) {
							inputField.val(max);
						} else {
							inputField.val(newInputValue);
						}
					}
				}
				
				inputField.trigger('change');
			});
		}
	};
	
	var qodefWooReviewsPlaceholder = {
		init: function () {
			var comment = $('div#qodef-woo-page.qodef--single .woocommerce-tabs #reviews .comment-respond #comment');
			var author = $('div#qodef-woo-page.qodef--single .woocommerce-tabs #reviews .comment-respond #author');
			var email = $('div#qodef-woo-page.qodef--single .woocommerce-tabs #reviews .comment-respond #email');
			
			comment.attr("placeholder", "Type your review here");
			author.attr("placeholder", "Type your name here");
			email.attr("placeholder", "Type your email here");
		}
	}
	
})(jQuery);
