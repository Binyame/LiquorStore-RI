(function ($) {
	"use strict";
	
	$(window).load(function () {
		qodefSubscribeModal.init();
	});
	
	var qodefSubscribeModal = {
		init: function () {
			this.holder = $('#qodef-subscribe-popup-modal');
			
			if (this.holder.length) {
				var $preventHolder = this.holder.find('.qodef-sp-prevent'),
					$modalClose = $('.qodef-sp-close'),
					disabledPopup = 'no';
				
				if ($preventHolder.length) {
					var isLocalStorage = this.holder.hasClass('qodef-sp-prevent-cookies'),
						$preventInput = $preventHolder.find('.qodef-sp-prevent-input'),
						preventValue = $preventInput.data('value');
					
					if (isLocalStorage) {
						disabledPopup = localStorage.getItem('disabledPopup');
						sessionStorage.removeItem('disabledPopup');
					} else {
						disabledPopup = sessionStorage.getItem('disabledPopup');
						localStorage.removeItem('disabledPopup');
					}
					
					$preventHolder.children().on('click', function (e) {
						if (preventValue !== 'yes') {
							preventValue = 'yes';
							$preventInput.addClass('qodef-sp-prevent-clicked').data('value', 'yes');
						} else {
							preventValue = 'no';
							$preventInput.removeClass('qodef-sp-prevent-clicked').data('value', 'no');
						}
						
						if (preventValue === 'yes') {
							if (isLocalStorage) {
								localStorage.setItem('disabledPopup', 'yes');
							} else {
								sessionStorage.setItem('disabledPopup', 'yes');
							}
						} else {
							if (isLocalStorage) {
								localStorage.setItem('disabledPopup', 'no');
							} else {
								sessionStorage.setItem('disabledPopup', 'no');
							}
						}
					});
				}
				
				if (disabledPopup !== 'yes') {
					if (qodef.body.hasClass('qodef-sp-opened')) {
						qodefSubscribeModal.handleClassAndScroll('remove');
					} else {
						qodefSubscribeModal.handleClassAndScroll('add');
					}
					
					$modalClose.on('click', function (e) {
						e.preventDefault();
						
						qodefSubscribeModal.handleClassAndScroll('remove');
					});
					
					// Close on escape
					$(document).keyup(function (e) {
						if (e.keyCode === 27) { // KeyCode for ESC button is 27
							qodefSubscribeModal.handleClassAndScroll('remove');
						}
					});
				}
			}
		},
		
		handleClassAndScroll: function (option) {
			if (option === 'remove') {
				qodef.body.removeClass('qodef-sp-opened');
				qodefCore.qodefScroll.enable();
			}
			if (option === 'add') {
				qodef.body.addClass('qodef-sp-opened');
				qodefCore.qodefScroll.disable();
			}
		},
	};
	
})(jQuery);