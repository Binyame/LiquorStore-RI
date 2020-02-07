(function ($) {
	"use strict";
	
	window.qodef = {};
	
	qodef.windowWidth = $(window).width();
	qodef.windowHeight = $(window).height();
	qodef.body = $('body');
	qodef.html = $('html');
	qodef.scroll = 0;
	
	$(document).ready(function () {
		qodef.scroll = $(window).scrollTop();
		qodefBrowserDetection.init();
		qodefSwiper.init();
		qodefMagnificPopup.init();
		qodefAnchor.init();
		qodefAppear.init();
	});
	
	$(window).load(function () {
		qodefCloseCursor.init();
	});
	
	$(window).resize(function () {
		qodef.windowWidth = $(window).width();
		qodef.windowHeight = $(window).height();
	});
	
	$(window).scroll(function () {
		qodef.scroll = $(window).scrollTop();
	});
	
	$(document).on('aperitif_trigger_get_new_posts', function () {
		qodefSwiper.init();
		qodefMagnificPopup.init();
	});
	
	/*
     * Browser detection functionality
     */
	var qodefBrowserDetection = {
		init: function () {
			qodefBrowserDetection.addBodyClassName();
		},
		isBrowser: function (name) {
			var isBrowser = false;
			
			switch (name) {
				case 'chrome':
					isBrowser = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
					break;
				case 'safari':
					isBrowser = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
					break;
				case 'firefox':
					isBrowser = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
					break;
				case 'ie':
					isBrowser = window.navigator.userAgent.indexOf("MSIE ") > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./);
					break;
				case 'edge':
					isBrowser = /Edge\/\d./i.test(navigator.userAgent);
					break;
			}
			
			return isBrowser;
		},
		addBodyClassName: function () {
			if (qodefBrowserDetection.isBrowser('chrome')) {
				qodef.body.addClass('qodef-browser--chrome');
			}
			
			if (qodefBrowserDetection.isBrowser('safari')) {
				qodef.body.addClass('qodef-browser--safari');
			}
			
			if (qodefBrowserDetection.isBrowser('firefox')) {
				qodef.body.addClass('qodef-browser--firefox');
			}
			
			if (qodefBrowserDetection.isBrowser('ie')) {
				qodef.body.addClass('qodef-browser--ms-explorer');
			}
			
			if (qodefBrowserDetection.isBrowser('edge')) {
				qodef.body.addClass('qodef-browser--edge');
			}
		}
	};
	
	/**
	 * Init swiper slider
	 */
	var qodefSwiper = {
		init: function (settings) {
			this.holder = $('.qodef-swiper-container');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefSwiper.createSlider($(this));
				});
			}
		},
		createSlider: function ($holder) {
			var $progressBar = $holder.find(".swiper-progress .swiper-progress-progressbar-fill");
			var sliderOptions = typeof $holder.data('options') !== 'undefined' ? $holder.data('options') : {};
			var spaceBetween = sliderOptions.spaceBetween !== undefined && sliderOptions.spaceBetween !== '' ? sliderOptions.spaceBetween : 0;
			var slidesPerView = sliderOptions.slidesPerView !== undefined && sliderOptions.slidesPerView !== '' ? sliderOptions.slidesPerView : 1;
			var centeredSlides = sliderOptions.centeredSlides !== undefined && sliderOptions.centeredSlides !== '' ? sliderOptions.centeredSlides : false;
			var loop = sliderOptions.loop !== undefined && sliderOptions.loop !== '' ? sliderOptions.loop : true;
			var autoplay = sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== '' ? sliderOptions.autoplay : 4000;
			var speed = sliderOptions.speed !== undefined && sliderOptions.speed !== '' ? sliderOptions.speed : 800;
			var customStages = sliderOptions.customStages !== undefined && sliderOptions.customStages !== '' ? sliderOptions.customStages : false;
			var outsideNavigation = sliderOptions.outsideNavigation !== undefined && sliderOptions.outsideNavigation === 'yes';
			var nextNavigation = outsideNavigation ? '.swiper-button-next-' + sliderOptions.unique : $holder.find('.swiper-button-next');
			var prevNavigation = outsideNavigation ? '.swiper-button-prev-' + sliderOptions.unique : $holder.find('.swiper-button-prev');
			var pagination = $holder.find('.swiper-pagination');
			
			var slidesPerView1440 = sliderOptions.slidesPerView1440 !== undefined && sliderOptions.slidesPerView1440 !== '' ? sliderOptions.slidesPerView1440 : 5;
			var slidesPerView1366 = sliderOptions.slidesPerView1366 !== undefined && sliderOptions.slidesPerView1366 !== '' ? sliderOptions.slidesPerView1366 : 4;
			var slidesPerView1024 = sliderOptions.slidesPerView1024 !== undefined && sliderOptions.slidesPerView1024 !== '' ? sliderOptions.slidesPerView1024 : 3;
			var slidesPerView768 = sliderOptions.slidesPerView768 !== undefined && sliderOptions.slidesPerView768 !== '' ? sliderOptions.slidesPerView768 : 2;
			var slidesPerView680 = sliderOptions.slidesPerView680 !== undefined && sliderOptions.slidesPerView680 !== '' ? sliderOptions.slidesPerView680 : 1;
			var slidesPerView480 = sliderOptions.slidesPerView480 !== undefined && sliderOptions.slidesPerView480 !== '' ? sliderOptions.slidesPerView480 : 1;
			
			if (!customStages) {
				if (slidesPerView < 2) {
					slidesPerView1440 = slidesPerView;
					slidesPerView1366 = slidesPerView;
					slidesPerView1024 = slidesPerView;
					slidesPerView768 = slidesPerView;
				} else if (slidesPerView < 3) {
					slidesPerView1440 = slidesPerView;
					slidesPerView1366 = slidesPerView;
					slidesPerView1024 = slidesPerView;
				} else if (slidesPerView < 4) {
					slidesPerView1440 = slidesPerView;
					slidesPerView1366 = slidesPerView;
				} else if (slidesPerView < 5) {
					slidesPerView1440 = slidesPerView;
				}
			}
			
			var $swiper = new Swiper($holder, {
				slidesPerView: slidesPerView,
				centeredSlides: centeredSlides,
				spaceBetween: spaceBetween,
				autoplay: autoplay,
				loop: loop,
				speed: speed,
				autoplayDisableOnInteraction: false,
				navigation: {nextEl: nextNavigation, prevEl: prevNavigation},
				pagination: {el: pagination, type: 'bullets', clickable: true},
				breakpoints: {
					// when window width is <= 480px
					480: {
						slidesPerView: slidesPerView480
					},
					// when window width is <= 680px
					680: {
						slidesPerView: slidesPerView680
					},
					// when window width is <= 768px
					768: {
						slidesPerView: slidesPerView768
					},
					// when window width is <= 1024px
					1024: {
						slidesPerView: slidesPerView1024
					},
					// when window width is <= 1366px
					1366: {
						slidesPerView: slidesPerView1366
					},
					// when window width is <= 1440px
					1440: {
						slidesPerView: slidesPerView1440
					}
				},
				on: {
					init: function () {
						$holder.addClass('qodef-swiper--initialized');
					},
					transitionEnd: function () {
						$progressBar.css({"width": "0", "transition": "none"});
						var width = 1;
						var autoplayTime = 4000 / 100;
						var id = setInterval(frame, autoplayTime);
						
						function frame() {
							$progressBar.css({"width": "100%", "transition": "4s ease"});
							width++;
							
							if (width >= 100) {
								$progressBar.css({"width": "0", "transition": "none"});
								clearInterval(id);
							}
						}
					}
				}
			});
		}
	};
	
	/**
	 * Init magnific popup galleries
	 */
	var qodefMagnificPopup = {
		init: function (settings) {
			this.holder = $('.qodef-magnific-popup');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisPopup = $(this);
					
					if ($thisPopup.hasClass('qodef-popup-item')) {
						qodefMagnificPopup.initSingleImagePopup($thisPopup);
					} else if ($thisPopup.hasClass('qodef-popup-gallery')) {
						qodefMagnificPopup.initGalleryPopup($thisPopup);
					}
				});
			}
		},
		initSingleImagePopup: function (popup) {
			var type = popup.data('type');
			
			popup.magnificPopup({
				type: type,
				titleSrc: 'title',
				image: {
					cursor: null
				}
			});
		},
		initGalleryPopup: function (popup) {
			var $items = popup.find('.qodef-popup-item'),
				itemsFormatted = qodefMagnificPopup.generateGalleryItems($items);
			
			$items.each(function (index) {
				var $this = $(this);
				$this.magnificPopup({
					items: itemsFormatted,
					gallery: {
						enabled: true,
					},
					index: index,
					type: 'image',
					image: {
						cursor: null
					}
				});
			});
		},
		generateGalleryItems: function (items) {
			var itemsFormatted = [];
			
			if (items.length) {
				items.each(function () {
					var $thisItem = $(this);
					var itemFormatted = {
						src: $thisItem.attr('href'),
						title: $thisItem.attr('title'),
						type: $thisItem.data('type')
					};
					itemsFormatted.push(itemFormatted);
				});
			}
			
			return itemsFormatted;
		}
	};

	var qodefAppear = {
		init: function() {
			var customElements = $('.qodef-custom-row-harvest, .qodef-custom-image-events img');

			customElements.each(function() {
				$(this).appear(function () {
					$(this).addClass('qodef--appear');
				}, {accX: 0, accY: 0});
			});

			var customNewsletter = $('.qodef-custom-newsletter');

			customNewsletter.each(function() {
				$(this).appear(function () {
					$(this).addClass('qodef--appear');
				}, {accX: 0, accY: 300});
			});

			var customImageLayout = $('.qodef-custom-image-layout img');

			customImageLayout.appear(function () {
				$('.qodef-custom-image-layout').addClass('qodef--appear');
			}, {accX: 0, accY: 0});

			var workflowsHolder = $('.qodef-workflows-holder'),
				workflowItems = workflowsHolder.find('.qodef-workflow'),
				workflowTimeout = 0;

			workflowsHolder.appear(function () {
				workflowItems.each(function() {
					var thisWorkflowItem = $(this);
					setTimeout(function() {
						thisWorkflowItem.addClass('qodef--appear');
					}, workflowTimeout);
					workflowTimeout += 500;
				});
			}, {accX: 0, accY: 0});

			var iconsHolder = $('.qodef-custom-icon-row'),
				icons = iconsHolder.find('.qodef-icon-with-text'),
				iconsTimeout = 0;

			iconsHolder.appear(function () {
				icons.each(function() {
					var thisIcon = $(this);
					setTimeout(function() {
						thisIcon.addClass('qodef--appear');
					}, iconsTimeout);
					iconsTimeout += 200;
				});
			}, {accX: 0, accY: 0});

			var customBlogList = $('.qodef-custom-blog-list '),
				blogItems = customBlogList.find('.wpb_column'),
				blogTimeout = 0;

			customBlogList.appear(function () {
				blogItems.each(function() {
					var thisItem = $(this);
					setTimeout(function() {
						thisItem.addClass('qodef--appear');
					}, blogTimeout);
					blogTimeout += 400;
				});
			}, {accX: 0, accY: 0});

			var teamHolder = $('.qodef-team-holder-row'),
				teamItems = teamHolder.find('.qodef-team.qodef-layout--info-below'),
				teamTimeout = 0;

			teamHolder.appear(function () {
				teamItems.each(function() {
					var thisItem = $(this);
					setTimeout(function() {
						thisItem.addClass('qodef--appear');
					}, teamTimeout);
					teamTimeout += 200;
				});
			}, {accX: 0, accY: 0});
		}
	}

	var qodefCloseCursor = {
		init: function() {
			qodefCloseCursor.closeCursor();
		},
		closeCursor: function() {
			var sideAreas = $('.qodef-membership-login-modal-overlay, .yith-quick-view-overlay');

			if (sideAreas.length) {
				var posX, posY;
				qodef.body.append('<div class="qodef-svg-close-cursor"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="17px" viewBox="0 0 17 17" enable-background="new 0 0 17 17" xml:space="preserve"><g><line fill="none" stroke="#FFFFFF" stroke-miterlimit="10" x1="0.403" y1="16.597" x2="16.597" y2="0.403"/><line fill="none" stroke="#FFFFFF" stroke-miterlimit="10" x1="0.403" y1="0.403" x2="16.597" y2="16.597"/></g></svg></div>');
				var svgCloseCursor = $('.qodef-svg-close-cursor');
				$(window).on('mousemove', function(e) {
					posX = e.pageX;
					posY = e.pageY - qodef.scroll;
	
					svgCloseCursor.css({
						'top': posY,
						'left': posX
					});
				});
	
				sideAreas.on('mouseenter', function() {
					svgCloseCursor.css('opacity', 1);
				}).on('mouseout', function() {
					svgCloseCursor.css('opacity', 0);
				});
			}
		}
	}
	
	/**
	 * Init magnific popup galleries
	 */
	var qodefAnchor = {

		anchorClicked: false,
		
		setActiveState: function (anchor) {
			var headers = $('.qodef-header-navigation, #qodef-mobile-header-navigation, .qodef-fullscreen-menu, .qodef-header-vertical-navigation');

			var anchorData = anchor.data('qodef-anchor');

			var activeItem = headers.find('a[href*="'+ anchorData +'"]');

			if (activeItem.length) {
				headers.find('.menu-item').removeClass('qodef-active-item');
				activeItem.parent().addClass('qodef-active-item');
			}
		},
		
		anchorClick: function () {
			var stickyHeader = $('.qodef-header-sticky'),
				stickyHeaderHeight = 0;

			if (stickyHeader.length) {
				stickyHeaderHeight = stickyHeader.outerHeight();
			}

			$(document).on('click', '.qodef-header-navigation a, #qodef-mobile-header-navigation a, .qodef-fullscreen-menu a, .qodef-header-vertical-navigation a', function (e) {
				var anchor = $(this),
					hash = anchor.prop("hash").split('#')[1];

				if ($(this).prop("hash").split('#')[1] !== undefined && $(this).prop("hash").split('#')[1].length > 1) {
					var anchorElement = $('[data-qodef-anchor="#' + $(this).prop("hash").split('#')[1] + '"]')
					if (anchorElement.length) {
						e.preventDefault();
						qodefAnchor.setActiveState(anchorElement);
						qodefAnchor.anchorClicked = true;
						qodef.html.stop().animate({
							scrollTop: Math.round(anchorElement.offset().top - stickyHeaderHeight)
						}, 1000, function () {
							//change hash tag in url
							if (history.pushState) {
								history.pushState(null, '', '#' + hash);
							}
							qodefAnchor.anchorClicked = false;
						});
					}
				}
			});
		},

		checkDataAnchors: function () {
			// check if there are ID anchors on the page
			var headerLinks = $('.qodef-header-navigation a, #qodef-mobile-header-navigation a, .qodef-fullscreen-menu a, .qodef-header-vertical-navigation a');
			var anchorsExist = false;

			headerLinks.each(function() {
				if ($(this).prop("hash").split('#')[1] !== undefined && $(this).prop("hash").split('#')[1].length > 1) {
					anchorsExist = true;
					return false;
				}
			});

			return anchorsExist;
		},

		addDataAnchorElements: function () {
			// check if there are ID anchors on the page
			var headerLinks = $('.qodef-header-navigation a, #qodef-mobile-header-navigation a, .qodef-fullscreen-menu a, .qodef-header-vertical-navigation a');

			headerLinks.each(function() {
				if ($(this).prop("hash").split('#')[1] !== undefined && $(this).prop("hash").split('#')[1].length > 1) {
					var anchorValue = $(this).prop("hash").split('#')[1];

					$(document).find('#' + anchorValue).data('qodef-anchor', '#' + anchorValue);
					$(document).find('#' + anchorValue).attr('data-qodef-anchor', '#' + anchorValue);
				}
			});
		},

		anchorInView: function(element) {
			var toggleClasses = function () {
				if (qodef.scroll > element.offset().top - 500 &&
					qodef.scroll < element.offset().top + element.height() && !qodefAnchor.anchorClicked) {
					!element.hasClass('qodef-in-view') && element.addClass('qodef-in-view');
					qodefAnchor.setActiveState(element);
				}
			}

			$(window).scroll(function () {
				toggleClasses();
			});

			toggleClasses();
		},
		
		init: function () {
			if (qodefAnchor.checkDataAnchors()) {
				qodefAnchor.addDataAnchorElements();

				setTimeout(function() {
					var dataAnchors = $('[data-qodef-anchor]');
					if (dataAnchors.length) {

						dataAnchors.each(function() {
							qodefAnchor.anchorInView($(this));
						})

						qodefAnchor.anchorClick();
					}
				}, 100);
			}
		}
	};
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefResizeIframes.init();
	});
	
	$(window).on('resize', function () {
		qodefResizeIframes.init();
	});
	
	$(document).on('aperitif_trigger_get_new_posts', function (e, holder) {
		if (holder.hasClass('qodef-blog')) {
			qodefReInitMediaElementPostFormats.init(holder);
			qodefResizeIframes.resize(holder);
		}
	});
	
	/**
	 * Re init media element post formats (audio, video)
	 */
	var qodefReInitMediaElementPostFormats = {
		init: function (holder) {
			var $mediaElement = holder.find('.wp-video-shortcode, .wp-audio-shortcode').not('.mejs-container');
			
			if ($mediaElement.length) {
				$mediaElement.each(function () {
					var $thisMediaElement = $(this);
					
					if (typeof $thisMediaElement.mediaelementplayer === 'function') {
						$thisMediaElement.mediaelementplayer();
					}
				});
			}
		}
	};
	
	/**
	 * Resize oembed iframes
	 */
	var qodefResizeIframes = {
		init: function () {
			var $holder = $('.qodef-blog');
			
			if ($holder.length) {
				qodefResizeIframes.resize($holder);
			}
		},
		
		resize: function (holder) {
			var $iframe = holder.find('.qodef-e-media iframe');
			
			if ($iframe.length) {
				$iframe.each(function () {
					var $thisIframe = $(this),
						width = $thisIframe.attr('width'),
						height = $thisIframe.attr('height'),
						newHeight = $thisIframe.width() / width * height;  // rendered width divided by aspect ratio
					
					$thisIframe.css('height', newHeight);
				});
			}
		}
	}
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefFilter.init();
	});
	
	$(document).on('aperitif_trigger_get_new_posts', function (e, holder) {
		if (holder.hasClass('qodef-filter--on')) {
			qodefFilter.setVisibility(holder, holder.find('.qodef-m-filter-item.qodef--active'), true);
		}
	});
	
	/*
	 **	Init filter functionality
	 */
	var qodefFilter = {
		init: function (settings) {
			this.holder = $('.qodef-filter--on');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $holder = $(this),
						$filterItems = $holder.find('.qodef-m-filter-item');
					
					qodefFilter.extendListHTML($holder);
					qodefFilter.clickEvent($holder, $filterItems);
				});
			}
		},
		extendListHTML: function (holder) {
			if (!holder.children('.qodef-hidden-filter-items').length && !qodefFilter.isMasonryLayout(holder)) {
				holder.append('<div class="qodef-hidden-filter-items"></div>');
			}
		},
		clickEvent: function (holder, filterItems) {
			filterItems.on('click', function (e) {
				e.preventDefault();
				
				var $thisItem = $(this);
				
				if (!$thisItem.hasClass('qodef--active')) {
					holder.addClass('qodef--filter-loading');
					
					filterItems.removeClass('qodef--active');
					$thisItem.addClass('qodef--active');
					
					qodefFilter.setVisibility(holder, $thisItem);
				}
			});
		},
		setVisibility: function (holder, item, triggerEvent) {
			var $hiddenHolder = holder.children('.qodef-hidden-filter-items'),
				hiddenHolderExist = $hiddenHolder.length,
				$hiddenItems = hiddenHolderExist ? $hiddenHolder.children('.qodef-grid-item') : '',
				$itemsHolder = holder.find('.qodef-grid-inner'),
				$items = $itemsHolder.children('.qodef-grid-item'),
				filterTaxonomy = item.data('taxonomy'),
				filterValue = item.data('filter'),
				isShowAllFilter = filterValue === '*',
				filterClass = isShowAllFilter ? filterValue : filterTaxonomy + '-' + filterValue,
				listHasVisibleItems = $items.hasClass(filterClass);
			
			// Additional conditional for gallery layout to check is items exists inside hidden holder
			if (hiddenHolderExist && !listHasVisibleItems && $hiddenItems.hasClass(filterClass)) {
				listHasVisibleItems = true;
			}
			
			// Prevent filtering when show all is active and load more is trigger
			if (triggerEvent && isShowAllFilter) {
				return;
			}
			
			// If items doesn't exist by default trigger load more to load new page
			if (!isShowAllFilter && !listHasVisibleItems && qodefFilter.hasLoadMore(holder)) {
				qodef.body.trigger('aperitif_trigger_load_more', [holder]);
			} else {
				if (qodefFilter.isMasonryLayout(holder)) {
					$itemsHolder.isotope({filter: isShowAllFilter ? '' : '.' + filterClass});
				} else {
					if (!isShowAllFilter) {
						$items.each(function () {
							var $listItem = $(this),
								listItemClasses = $listItem.attr('class');
							
							if (listItemClasses.indexOf(filterClass) === -1) {
								$listItem.hide(300, 'linear', function () {
									$listItem.appendTo($hiddenHolder);
								});
							}
						});
					}
					
					if ($hiddenItems.length) {
						$hiddenItems.each(function () {
							var $hiddenListItem = $(this),
								hiddenListItemClasses = $hiddenListItem.attr('class');
							
							if (isShowAllFilter) {
								$hiddenListItem.appendTo($itemsHolder).show(300, 'linear');
							} else if (hiddenListItemClasses.indexOf(filterClass) !== -1) {
								$hiddenListItem.appendTo($itemsHolder).show(300, 'linear');
							}
						});
					}
				}
				
				holder.removeClass('qodef--filter-loading');
			}
		},
		isMasonryLayout: function (holder) {
			return holder.hasClass('qodef-layout--masonry');
		},
		hasLoadMore: function (holder) {
			return holder.hasClass('qodef-pagination-type--load-more');
		}
	};
	
})(jQuery);
(function ($) {
	'use strict';
	
	$(document).ready(function () {
		qodefJustifiedGallery.init();
	});
	
	$(document).on('aperitif_trigger_get_new_posts', function () {
		qodefJustifiedGallery.init();
	});
	
	/**
	 * Init justified gallery functionality
	 */
	var qodefJustifiedGallery = {
		init: function () {
			var justifiedGallery = $('.qodef-layout--justified-gallery');
			if (justifiedGallery.length) {
				justifiedGallery.each(function () {
					var $gallery = $(this),
						galleryOptions = $gallery.data('options'),
						$galleryInner = $gallery.children('.qodef-grid-inner'),
						rowHeight = typeof galleryOptions.justified_gallery_row_height !== 'undefined' && galleryOptions.justified_gallery_row_height !== '' ? galleryOptions.justified_gallery_row_height : 150,
						margin = galleryOptions.space_value * 2;
					
					$galleryInner.waitForImages(function () {
						if (typeof $galleryInner.justifiedGallery === 'function') {
							$galleryInner.justifiedGallery({
								captions: false,
								rowHeight: rowHeight,
								margins: margin,
								border: 0,
								lastRow: 'nojustify',
								justifyThreshold: 0.75,
								selector: '.qodef-grid-item'
							}).on('jg.complete jg.rowflush', function () {
								var $gal = $(this),
									deducted = false;
								
								$gal.find('.qodef-grid-item').addClass('show').each(function () {
									var $thisItem = $(this);
									
									$thisItem.height(Math.round($thisItem.height()));
									
									if (!deducted && $thisItem.width() === 0) {
										$gal.height($gal.height() - $thisItem.height() - margin);
										
										deducted = true;
									}
								});
							});
						}
						
						$gallery.addClass('qodef--justified-gallery-init');
					});
				});
			}
		}
	};
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefMasonryLayout.init();
	});
	
	$(document).on('aperitif_trigger_get_new_posts', function (e, holder) {
		if (holder.hasClass('qodef-layout--masonry')) {
			qodefMasonryLayout.init();
		}
	});
	
	/**
	 * Init masonry layout
	 */
	var qodefMasonryLayout = {
		init: function (settings) {
			this.holder = $('.qodef-layout--masonry');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefMasonryLayout.createMasonry($(this));
				});
			}
		},
		createMasonry: function (holder) {
			var $masonry = holder.find('.qodef-grid-inner'),
				$masonryItem = $masonry.find('.qodef-grid-item'),
				size = $masonry.find('.qodef-grid-masonry-sizer').width();
			
			$masonry.waitForImages(function () {
				if (typeof $masonry.isotope === 'function') {
					$masonry.isotope({
						layoutMode: 'packery',
						itemSelector: '.qodef-grid-item',
						percentPosition: true,
						masonry: {
							columnWidth: '.qodef-grid-masonry-sizer',
							gutter: '.qodef-grid-masonry-gutter'
						}
					});
					
					if (holder.hasClass('qodef-items--fixed')) {
						qodefMasonryLayout.setFixedImageProportionSize($masonry, $masonryItem, size);
					}
					
					$masonry.isotope('layout');
				}
				
				$masonry.addClass('qodef--masonry-init');
			});
		},
		setFixedImageProportionSize: function (holder, item, size) {
			var padding = parseInt(item.css('paddingLeft'), 10),
				newSize = size - 2 * padding,
				$squareItem = holder.find('.qodef-item--square'),
				$landscapeItem = holder.find('.qodef-item--landscape'),
				$portraitItem = holder.find('.qodef-item--portrait'),
				$hugeSquareItem = holder.find('.qodef-item--huge-square');
			
			$squareItem.css('height', newSize);
			$portraitItem.css('height', Math.round(2 * (newSize + padding)));
			
			if (qodef.windowWidth > 680) {
				$landscapeItem.css('height', newSize);
				$hugeSquareItem.css('height', Math.round(2 * (newSize + padding)));
			} else {
				$landscapeItem.css('height', Math.round(newSize / 2));
				$hugeSquareItem.css('height', newSize);
			}
		}
	};
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefMobileHeader.init();
	});
	
	/*
	 **	Init mobile header functionality
	 */
	var qodefMobileHeader = {
		init: function () {
			var $holder = $('#qodef-page-mobile-header');
			
			if ($holder.length) {
				qodefMobileHeader.initMobileHeaderOpener($holder);
				qodefMobileHeader.initDropDownMobileMenu();
			}
		},
		initMobileHeaderOpener: function (holder) {
			var $opener = holder.find('#qodef-mobile-header-opener');
			
			if ($opener.length) {
				var $navigation = holder.find('#qodef-mobile-header-navigation');
				
				$opener.on('tap click', function (e) {
					e.preventDefault();
					
					if ($navigation.is(':visible')) {
						$navigation.slideUp(450);
						$opener.removeClass('qodef--opened');
					} else {
						$navigation.slideDown(450);
						$opener.addClass('qodef--opened');
					}
				});
			}
		},
		initDropDownMobileMenu: function () {
			var $dropdownOpener = $('#qodef-mobile-header-navigation .qodef-menu-arrow, #qodef-mobile-header-navigation .qodef-hide-link > a, body:not([class*="aperitif-core"]) #qodef-mobile-header-navigation .menu-item-has-children > a');
			
			if ($dropdownOpener.length) {
				$dropdownOpener.each(function () {
					var $thisItem = $(this);
					
					$thisItem.on('tap click', function (e) {
						e.preventDefault();
						
						var $thisItemParent = $thisItem.parent(),
							$thisItemParentSiblingsWithDrop = $thisItemParent.siblings('.menu-item-has-children');
						
						if ($thisItemParent.hasClass('menu-item-has-children')) {
							var $submenu = $thisItemParent.find('ul.sub-menu').first();
							
							if ($submenu.is(':visible')) {
								$submenu.slideUp(450);
								$thisItemParent.removeClass('qodef--opened');
							} else {
								$thisItemParent.addClass('qodef--opened');
								
								if ($thisItemParentSiblingsWithDrop.length === 0) {
									$thisItemParent.find('.sub-menu').slideUp(400, function () {
										$submenu.slideDown(400);
									});
								} else {
									$thisItemParent.siblings().removeClass('qodef--opened').find('.sub-menu').slideUp(400, function () {
										$submenu.slideDown(400);
									});
								}
							}
						}
					});
				});
			}
		}
	};
	
})(jQuery);
(function ($) {
	
	$(document).ready(function () {
		qodefDefaultNavMenu.init();
	});
	
	var qodefDefaultNavMenu = {
		init: function () {
			var $menuItems = $('.qodef-header-navigation.qodef-header-navigation-initial > ul > li.qodef-menu-item--narrow.menu-item-has-children');
			
			if ($menuItems.length) {
				$menuItems.each(function (i) {
					var thisItem = $(this),
						menuItemPosition = thisItem.offset().left,
						dropdownMenuItem = thisItem.find(' > ul'),
						dropdownMenuWidth = dropdownMenuItem.outerWidth(),
						menuItemFromLeft = $(window).width() - menuItemPosition;
					
					var dropDownMenuFromLeft;
					
					if (thisItem.find('li.menu-item-has-children').length > 0) {
						dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
					}
					
					dropdownMenuItem.removeClass('qodef-drop-down--right');
					
					if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
						dropdownMenuItem.addClass('qodef-drop-down--right');
					}
				});
			}
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefPagination.init();
	});
	
	$(window).scroll(function () {
		qodefPagination.scroll();
	});
	
	$(document).on('aperitif_trigger_load_more', function (e, $holder) {
		qodefPagination.triggerLoadMore($holder);
	});
	
	/*
	 **	Init pagination functionality
	 */
	var qodefPagination = {
		options: [],
		init: function (settings) {
			this.holder = $('.qodef-pagination--on');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $holder = $(this);
					
					qodefPagination.initPaginationType($holder);
				});
			}
		},
		scroll: function (settings) {
			this.holder = $('.qodef-pagination--on');
			
			// Allow overriding the default config
			$.extend(this.holder, settings);
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $holder = $(this);
					
					if ($holder.hasClass('qodef-pagination-type--infinite-scroll')) {
						qodefPagination.initInfiniteScroll($holder);
					}
				});
			}
		},
		initPaginationType: function ($holder) {
			if ($holder.hasClass('qodef-pagination-type--standard')) {
				qodefPagination.initStandard($holder);
			} else if ($holder.hasClass('qodef-pagination-type--load-more')) {
				qodefPagination.initLoadMore($holder);
			} else if ($holder.hasClass('qodef-pagination-type--infinite-scroll')) {
				qodefPagination.initInfiniteScroll($holder);
			}
		},
		initStandard: function ($holder) {
			var $paginationItems = $holder.find('.qodef-m-pagination-items');
			
			if ($paginationItems.length) {
				var options = $holder.data('options');
				
				$paginationItems.children().each(function () {
					var $thisItem = $(this),
						$itemLink = $thisItem.children('a');
					
					qodefPagination.changeStandardState($holder, options.max_pages_num, 1);
					
					$itemLink.on('click', function (e) {
						e.preventDefault();
						
						if (!$thisItem.hasClass('qodef--active')) {
							qodefPagination.getNewPosts($holder, $itemLink.data('paged'));
						}
					});
				});
			}
		},
		changeStandardState: function ($holder, max_pages_num, nextPage) {
			if ($holder.hasClass('qodef-pagination-type--standard')) {
				var $paginationNav = $holder.find('.qodef-m-pagination-items'),
					$numericItem = $paginationNav.children('.qodef--number'),
					$prevItem = $paginationNav.children('.qodef--prev'),
					$nextItem = $paginationNav.children('.qodef--next');
				
				$numericItem.removeClass('qodef--active').eq(nextPage - 1).addClass('qodef--active');
				
				$prevItem.children().data('paged', nextPage - 1);
				
				if (nextPage > 1) {
					$prevItem.show();
				} else {
					$prevItem.hide();
				}
				
				$nextItem.children().data('paged', nextPage + 1);
				
				if (nextPage === max_pages_num) {
					$nextItem.hide();
				} else {
					$nextItem.show();
				}
			}
		},
		initLoadMore: function ($holder) {
			var $loadMoreButton = $holder.find('.qodef-load-more-button');
			
			$loadMoreButton.on('click', function (e) {
				e.preventDefault();
				
				qodefPagination.getNewPosts($holder);
			});
		},
		triggerLoadMore: function ($holder) {
			qodefPagination.getNewPosts($holder);
		},
		hideLoadMoreButton: function ($holder, options) {
			if ($holder.hasClass('qodef-pagination-type--load-more') && options.next_page > options.max_pages_num) {
				$holder.find('.qodef-load-more-button').hide();
			}
		},
		initInfiniteScroll: function ($holder) {
			var holderEndPosition = $holder.outerHeight() + $holder.offset().top,
				scrollPosition = qodef.scroll + qodef.windowHeight;
			
			if (!$holder.hasClass('qodef--loading') && scrollPosition > holderEndPosition) {
				qodefPagination.getNewPosts($holder);
			}
		},
		getNewPosts: function ($holder, nextPage) {
			$holder.addClass('qodef--loading');
			
			var $itemsHolder = $holder.children('.qodef-grid-inner');
			var options = $holder.data('options');
			
			qodefPagination.setNextPageValue(options, nextPage, false);
			
			$.ajax({
				type: "GET",
				url: qodefGlobal.vars.restUrl + qodefGlobal.vars.paginationRestRoute,
				data: {
					options: options
				},
				beforeSend: function (request) {
					request.setRequestHeader('X-WP-Nonce', qodefGlobal.vars.paginationNonce);
				},
				success: function (response) {
					
					if (response.status === 'success') {
						qodefPagination.setNextPageValue(options, nextPage, true);
						qodefPagination.changeStandardState($holder, options.max_pages_num, nextPage);
						
						$itemsHolder.waitForImages(function () {
							qodefPagination.addPosts($itemsHolder, response.data, nextPage);
							qodefPagination.reInitMasonryPosts($holder, $itemsHolder);
							
							qodef.body.trigger('aperitif_trigger_get_new_posts', [$holder]);
						});
						
						qodefPagination.hideLoadMoreButton($holder, options);
					} else {
						console.log(response.message);
					}
				},
				complete: function () {
					$holder.removeClass('qodef--loading');
				}
			});
		},
		setNextPageValue: function (options, nextPage, ajaxTrigger) {
			if (typeof nextPage !== 'undefined' && nextPage !== '' && !ajaxTrigger) {
				options.next_page = nextPage;
			} else if (ajaxTrigger) {
				options.next_page = parseInt(options.next_page, 10) + 1;
			}
		},
		addPosts: function ($itemsHolder, newItems, nextPage) {
			if (typeof nextPage !== 'undefined' && nextPage !== '') {
				$itemsHolder.html(newItems);
			} else {
				$itemsHolder.append(newItems);
			}
		},
		reInitMasonryPosts: function ($holder, $itemsHolder) {
			if ($holder.hasClass('qodef-layout--masonry')) {
				$itemsHolder.isotope('reloadItems').isotope({sortBy: 'original-order'});
				
				setTimeout(function () {
					$itemsHolder.isotope('layout');
				}, 200);
			}
		}
	};
	
})(jQuery);