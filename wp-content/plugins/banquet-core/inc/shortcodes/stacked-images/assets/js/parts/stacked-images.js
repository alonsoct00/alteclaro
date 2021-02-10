(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefStackedImages.init();
	});
	
	$(window).on('load', function(){
		qodefStackedImages.initParallaxElements();
	});
	
	var qodefStackedImages = {
		init: function () {
			this.images = $('.qodef-stacked-images');
			
			if (this.images.length) {
				this.images.each(function () {
					var $thisImage = $(this);
					qodefStackedImages.animate($thisImage);
					qodefStackedImages.parallaxElements($thisImage);
				});
			}
		},
		animate: function ($image) {
			
			var itemImage = $image.find('.qodef-m-images');
			
			setTimeout(function () {
				$image.appear(function () {
					itemImage.addClass('qodef--appeared');
				});
			}, 200);
			
		},
		parallaxElements: function ($image) {
			var itemImage = $image.find('.qodef-m-images'),
				imgParallax = itemImage.find('img.qodef-e-stack-image'),
				imgZoom = itemImage.find('img.qodef-e-main-image');
			
			if (qodef.windowWidth > 1024) {
				imgParallax.attr('data-parallax', '{"y" : -15 , "smoothness": 10}');
				imgZoom.attr('data-parallax', '{"y" : 30 , "scale": 1 , "smoothness": 30}');
				
			}
		},
		initParallaxElements: function () {
			var parallaxInstances = $("[data-parallax]");
			
			if ( parallaxInstances.length ) {
				ParallaxScroll.init(); //initialzation removed from plugin js file to have it run only on non-touch devices
			}
		}
	};
	
})(jQuery);