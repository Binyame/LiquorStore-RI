(function ($) {
	"use strict";
	
	$(window).load(function () {
		qodefAgeVerificationModal.init();
	});
	
	var qodefAgeVerificationModal = {
		init: function () {
			this.holder = $('#qodef-age-verification-popup-modal');
			
			if (this.holder.length) {
				var $preventHolder = this.holder.find('.qodef-avp-prevent'),
					disabledPopup = 'no';
				
				if ($preventHolder.length) {
					var isLocalStorage = this.holder.hasClass('qodef-avp-prevent-cookies'),
						$preventYesButton = $preventHolder.find('.qodef-avp-prevent-yes');
					
					if (isLocalStorage) {
						disabledPopup = localStorage.getItem('disabledPopup');
						sessionStorage.removeItem('disabledPopup');
					} else {
						disabledPopup = sessionStorage.getItem('disabledPopup');
						localStorage.removeItem('disabledPopup');
					}
					
					$preventYesButton.on('click', function () {
						if (isLocalStorage) {
							localStorage.setItem('disabledPopup', 'yes');
						} else {
							sessionStorage.setItem('disabledPopup', 'yes');
						}
						
						qodefAgeVerificationModal.handleClassAndScroll('remove');
					});
				}
				
				if (disabledPopup !== 'yes') {
					if (qodef.body.hasClass('qodef-avp-opened')) {
						qodefAgeVerificationModal.handleClassAndScroll('remove');
					} else {
						qodefAgeVerificationModal.handleClassAndScroll('add');
					}
				}
			}
		},
		
		handleClassAndScroll: function (option) {
			if (option === 'remove') {
				qodef.body.removeClass('qodef-avp-opened');
				qodefCore.qodefScroll.enable();
			}
			if (option === 'add') {
				qodef.body.addClass('qodef-avp-opened');
				qodefCore.qodefScroll.disable();
			}
		},
	};
	
})(jQuery);