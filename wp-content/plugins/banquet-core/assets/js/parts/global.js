(function ($) {
	"use strict";

	window.qodefCore = {};
	qodefCore.body = $('body');

	$(document).ready(function () {
		qodefInlinePageStyle.init();
		qodefPageBorderWrap.init();
	});

	var qodefScroll = {
		disable: function(){
			if (window.addEventListener) {
				window.addEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}

			// window.onmousewheel = document.onmousewheel = qodefScroll.preventDefaultValue;
			document.onkeydown = qodefScroll.keyDown;
		},
		enable: function(){
			if (window.removeEventListener) {
				window.removeEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}
			window.onmousewheel = document.onmousewheel = document.onkeydown = null;
		},
		preventDefaultValue: function(e){
			e = e || window.event;
			if (e.preventDefault) {
				e.preventDefault();
			}
			e.returnValue = false;
		},
		keyDown: function(e) {
			var keys = [37, 38, 39, 40];
			for (var i = keys.length; i--;) {
				if (e.keyCode === keys[i]) {
					qodefScroll.preventDefaultValue(e);
					return;
				}
			}
		}
	};

	qodefCore.qodefScroll = qodefScroll;

	var qodefPerfectScrollbar = {
		init: function ($holder) {
			if ($holder.length) {
				qodefPerfectScrollbar.qodefInitScroll($holder);
			}
		},
		qodefInitScroll: function ($holder) {
			var $defaultParams = {
				wheelSpeed: 0.6,
				suppressScrollX: true
			};

			var $ps = new PerfectScrollbar($holder.selector, $defaultParams);
			$(window).resize(function () {
				$ps.update();
			});
		}
	};

	qodefCore.qodefPerfectScrollbar = qodefPerfectScrollbar;

	var qodefInlinePageStyle = {
		init: function () {
			this.holder = $('#banquet-core-page-inline-style');

			if (this.holder.length) {
				var style = this.holder.data('style');

				if (style.length) {
					$('head').append('<style type="text/css">' + style + '</style>');
				}
			}
		}
	};

	var qodefPageBorderWrap = {
		init: function () {
			this.holder = $('.qodef--page-has-borders');

			if (this.holder.length) {
				var widgetHolder = $('#qodef-page-header .qodef-widget-holder'),
					lastWidget = widgetHolder.children().last(),
					fullscreenOpener = $('.qodef-fullscreen-menu-opener'),
					logo = $('.qodef-header-logo-link');

				logo.wrap('<div class="qodef-header-logo-wrapper">');

				if ( lastWidget.length && widgetHolder.is(':last-child') ) {
					lastWidget.wrap('<div class="qodef-last-widget-wrapper">');
				} else if ( fullscreenOpener.length ) {
					fullscreenOpener.wrap('<div class="qodef-fullscreen-menu-opener-outer">');
				}
			}
		}
	};

})(jQuery);