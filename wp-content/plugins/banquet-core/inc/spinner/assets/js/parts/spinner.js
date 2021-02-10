(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSpinner.init();
	});
	
	var qodefSpinner = {
		init: function () {
			/*this.holder = $('#qodef-page-spinner:not(.qodef-layout--predefined)');*/
			this.holder = $('#qodef-page-spinner')
			
			if (this.holder.length) {
				if (! this.holder.hasClass('qodef-layout--predefined')) {
					qodefSpinner.animateSpinner(this.holder);
				} else {
					qodefSpinner.animateCustomSpinner(this.holder);
				}
			}
		},
		animateSpinner: function ($holder) {
			$(window).on('load', function () {
				qodefSpinner.fadeOutLoader($holder);
			});
		},
		animateCustomSpinner: function ($holder) {
			var preloaderText = this.holder.find('.qodef-predefined-spinner-text'),
				preloaderCharacter = preloaderText.find('.qodef-e-character'),
				qodefSpinnerInterval;
			
			if( preloaderText.length ) {
				setTimeout(function () {
					var qodefAnimatePredefinedSpinner = function () {
						preloaderCharacter.each(function (index) {
							preloaderCharacter.eq(index).css({
								'opacity': '1',
								'transition': '1.7s ' + 0.1 * index + 's'
							});
						});
						
						setTimeout(function() {
							preloaderCharacter.each(function ( index ) {
								preloaderCharacter.eq(index).css({'opacity': '0'});
							});
						}, 1700);
					};
					
					preloaderText.css({'opacity': '1'});
					qodefAnimatePredefinedSpinner();
					qodefSpinnerInterval = setInterval(function(){
						qodefAnimatePredefinedSpinner();
					}, 3500);
				}, 100);
				
				$(window).on('load', function() {
					qodefSpinner.fadeOutLoader($holder, 1000, 6000);
					
					setTimeout(function () {
						clearInterval(qodefSpinnerInterval);
					}, 6500);
				});
			}
		},
		fadeOutLoader: function ($holder, speed, delay, easing) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';
			
			$holder.delay(delay).fadeOut(speed, easing);
			
			$(window).on('bind', 'pageshow', function (event) {
				if (event.originalEvent.persisted) {
					$holder.fadeOut(speed, easing);
				}
			});
		}
	};
	
})(jQuery);