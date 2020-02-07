(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSwappingImageGallery.init();
	});
	
	var qodefSwappingImageGallery = {
		init: function () {
			this.holder = $('.qodef-swapping-image-gallery');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);
					qodefSwappingImageGallery.createSlider($thisHolder);
				});
			}
		},
		createSlider: function (holder) {
			var swiperHolder = holder.find('.qodef-m-image-holder');
			var paginationHolder = holder.find('.qodef-m-thumbnails-holder .qodef-grid-inner');
			var spaceBetween = 0;
			var slidesPerView = 1;
			var centeredSlides = false;
			var loop = false;
			var autoplay = false;
			var speed = 500;
			
			var $swiper = new Swiper(swiperHolder, {
				slidesPerView: slidesPerView,
				centeredSlides: centeredSlides,
				spaceBetween: spaceBetween,
				autoplay: autoplay,
				loop: loop,
				effect: 'fade',
				speed: speed,
				pagination: {
					el: paginationHolder,
					type: 'custom',
					clickable: true,
					bulletClass: 'qodef-m-thumbnail'
				},
				on: {
					init: function () {
						swiperHolder.addClass('qodef-swiper--initialized');
						paginationHolder.find('.qodef-m-thumbnail').eq(0).addClass('qodef--active');
					},
					slideChange: function slideChange() {
						var swiper = this;
						var activeIndex = swiper.activeIndex;
						paginationHolder.find('.qodef--active').removeClass('qodef--active');
						paginationHolder.find('.qodef-m-thumbnail').eq(activeIndex).addClass('qodef--active');
					}
				}
			});
		}
	};
	
})(jQuery);