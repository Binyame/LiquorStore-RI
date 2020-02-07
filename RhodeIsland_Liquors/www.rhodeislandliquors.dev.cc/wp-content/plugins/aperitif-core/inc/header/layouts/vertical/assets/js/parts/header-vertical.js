(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefVerticalNavMenu.init();
	});
	
	/**
	 * Function object that represents vertical menu area.
	 * @returns {{init: Function}}
	 */
	var qodefVerticalNavMenu = {
		initNavigation: function (verticalMenuObject) {
			var verticalNavObject = verticalMenuObject.find('.qodef-header-vertical-navigation');
			
			if (verticalNavObject.hasClass('qodef-vertical-drop-down--below')) {
				qodefVerticalNavMenu.dropdownClickToggle(verticalNavObject);
			} else if (verticalNavObject.hasClass('qodef-vertical-drop-down--side')) {
				qodefVerticalNavMenu.dropdownFloat(verticalNavObject);
			}
		},
		dropdownClickToggle: function (verticalNavObject) {
			var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
			
			menuItems.each(function () {
				var elementToExpand = $(this).find(' > .qodef-drop-down-second, > ul');
				var menuItem = this;
				var dropdownOpener = $(this).find('> a');
				var slideUpSpeed = 'fast';
				var slideDownSpeed = 'slow';
				
				dropdownOpener.on('click tap', function (e) {
					e.preventDefault();
					e.stopPropagation();
					
					if (elementToExpand.is(':visible')) {
						$(menuItem).removeClass('qodef-menu-item--open');
						elementToExpand.slideUp(slideUpSpeed);
					} else if (dropdownOpener.parent().parent().children().hasClass('qodef-menu-item--open') && dropdownOpener.parent().parent().parent().hasClass('qodef-vertical-menu')) {
						$(this).parent().parent().children().removeClass('qodef-menu-item--open');
						$(this).parent().parent().children().find(' > .qodef-drop-down-second').slideUp(slideUpSpeed);
						
						$(menuItem).addClass('qodef-menu-item--open');
						elementToExpand.slideDown(slideDownSpeed);
					} else {
						
						if (!$(this).parents('li').hasClass('qodef-menu-item--open')) {
							menuItems.removeClass('qodef-menu-item--open');
							menuItems.find(' > .qodef-drop-down-second, > ul').slideUp(slideUpSpeed);
						}
						
						if ($(this).parent().parent().children().hasClass('qodef-menu-item--open')) {
							$(this).parent().parent().children().removeClass('qodef-menu-item--open');
							$(this).parent().parent().children().find(' > .qodef-drop-down-second, > ul').slideUp(slideUpSpeed);
						}
						
						$(menuItem).addClass('qodef-menu-item--open');
						elementToExpand.slideDown(slideDownSpeed);
					}
				});
			});
		},
		dropdownFloat: function (verticalNavObject) {
			var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
			var allDropdowns = menuItems.find(' > .qodef-drop-down-second > .qodef-drop-down-second-inner > ul, > ul');
			
			menuItems.each(function () {
				var elementToExpand = $(this).find(' > .qodef-drop-down-second > .qodef-drop-down-second-inner > ul, > ul');
				var menuItem = this;
				
				if (Modernizr.touch) {
					var dropdownOpener = $(this).find('> a');
					
					dropdownOpener.on('click tap', function (e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (elementToExpand.hasClass('qodef-float--open')) {
							elementToExpand.removeClass('qodef-float--open');
							$(menuItem).removeClass('qodef-menu-item--open');
						} else {
							if (!$(this).parents('li').hasClass('qodef-menu-item--open')) {
								menuItems.removeClass('qodef-menu-item--open');
								allDropdowns.removeClass('qodef-float--open');
							}
							
							elementToExpand.addClass('qodef-float--open');
							$(menuItem).addClass('qodef-menu-item--open');
						}
					});
				} else {
					//must use hoverIntent because basic hover effect doesn't catch dropdown
					//it doesn't start from menu item's edge
					$(this).hoverIntent({
						over: function () {
							elementToExpand.addClass('qodef-float--open');
							$(menuItem).addClass('qodef-menu-item--open');
						},
						out: function () {
							elementToExpand.removeClass('qodef-float--open');
							$(menuItem).removeClass('qodef-menu-item--open');
						},
						timeout: 300
					});
				}
			});
		},
		verticalAreaScrollable: function (verticalMenuObject) {
			return verticalMenuObject.hasClass('qodef-with-scroll');
		},
		initVerticalAreaScroll: function (verticalMenuObject) {
			if (qodefVerticalNavMenu.verticalAreaScrollable(verticalMenuObject)) {
				window.qodefCore.qodefPerfectScrollbar.init(verticalMenuObject);
			}
		},
		init: function () {
			var $verticalMenuObject = $('.qodef-header--vertical #qodef-page-header');
			
			if ($verticalMenuObject.length) {
				qodefVerticalNavMenu.initNavigation($verticalMenuObject);
				qodefVerticalNavMenu.initVerticalAreaScroll($verticalMenuObject);
			}
		}
	};
	
})(jQuery);