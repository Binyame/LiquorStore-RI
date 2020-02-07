(function($){
	"use strict";
	
	$(document).ready(function () {
		qodefFrontEndSave.init();
	});
	
	var qodefFrontEndSave = {
		init: function () {
			this.holder = $('.qodef-front-end-form');
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefFrontEndSave.triggerFormSubmit($(this));
				});
			}
		},
		triggerFormSubmit: function ($holder) {
			$holder.on('submit', function (e) {
				e.preventDefault();
				
				qodefFrontEndSave.triggerRequest($holder);
			});
		},
		triggerRequest: function ($holder) {
			$holder.addClass('qodef--loading');
			
			var $btnText = $holder.find('button.qodef-front-end-submit'),
				updatingBtnText = $btnText.data('updating-text'),
				updatedBtnText = $btnText.data('updated-text'),
				prevBtnText = $btnText.html(),
				$gallery = $holder.find('.qodef-form-gallery-upload-hidden'),
				$responseHolder = $holder.find('.qodef-front-end-response');
			
			$btnText.html(updatingBtnText);
			$responseHolder.removeClass('qodef--success qodef--error qodef--undefined').empty();
			
			//get data
			var ajaxData = new FormData();
			
			//get files
			$gallery.each(function () {
				var $thisGallery = $(this),
					thisName = $thisGallery.attr('name'),
					thisRepeaterID = $thisGallery.attr('id'),
					thisFiles = $thisGallery[0].files,
					newName;
				
				//this part is needed for repeater with image uploads
				//adding specific names so they can be sorted in regular files and files in repeater
				if (thisName.indexOf("[") > -1) {
					newName = thisName.substring(0, thisName.indexOf("[")) + '_qodef_regarray_';
					
					var firstIndex = thisRepeaterID.indexOf('['),
						lastIndex = thisRepeaterID.indexOf(']'),
						index = thisRepeaterID.substring(firstIndex + 1, lastIndex);
					
					newName = newName + index + '_';
				} else {
					newName = thisName + '_qodef_reg_';
				}
				
				//if file not sent, send dummy file - so repeater fields are sent
				if (thisFiles.length === 0) {
					ajaxData.append(newName, new File([""], "qodef-dummy-file.txt", {
						type: "text/plain"
					}));
				}
				
				for (var i = 0; i < thisFiles.length; i++) {
					var allowedTypes = ['image/png','image/jpg','image/jpeg','application/pdf'];
					//security purposed - check if there is more than one dot in file name, also check whether the file type is in allowed types
					if (thisFiles[i].name.match(/\./g).length === 1 && $.inArray(thisFiles[i].type, allowedTypes) !== -1) {
						ajaxData.append(newName + i, thisFiles[i]);
					}
				}
			});
			
			ajaxData.append('action', $holder.data('action'));
			ajaxData.append('options', $holder.serialize());
			ajaxData.append('nonce', $holder.find('input[name*="qode-framework-nonce-"]').val());
			
			$.ajax({
				type: 'POST',
				data: ajaxData,
				contentType: false,
				processData: false,
				url: ajaxurl,
				success: function (data) {
					var response = JSON.parse(data);
					
					$responseHolder.addClass('qodef--' + response.status).html(response.message);
					
					if (response.status === 'success') {
						$btnText.html(updatedBtnText);
						
						if (response.redirect !== '') {
							window.location = response.redirect;
						}
					} else {
						$btnText.html(prevBtnText);
					}
				},
				complete: function () {
					$holder.removeClass('qodef--loading');
				}
			});
			
			return false;
		}
	};
	
})(jQuery);