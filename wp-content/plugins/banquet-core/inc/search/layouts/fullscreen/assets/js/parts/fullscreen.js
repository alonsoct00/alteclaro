(function($) {
    "use strict";

    $(document).ready(function(){
        qodefSearchFullscreen.init();
    });

	var qodefSearchFullscreen = {
	    init: function(){
            var $searchOpener = $('a.qodef-search-opener'),
                $searchHolder = $('.qodef-fullscreen-search-holder'),
                $searchClose = $('.qodef-search-close');

            if ($searchOpener.length && $searchHolder.length) {
                $searchOpener.on('click', function (e) {
                    e.preventDefault();
                    if(qodef.body.hasClass('qodef-fullscreen-search--opened')){
                        qodefSearchFullscreen.closeFullscreen($searchHolder);
                    }else{
                        qodefSearchFullscreen.openFullscreen($searchHolder);
                    }
                });
                $searchClose.on('click', function (e) {
                    e.preventDefault();
                    qodefSearchFullscreen.closeFullscreen($searchHolder);
                });

                //Close on escape
                $(document).keyup(function (e) {
                    if (e.keyCode === 27) { //KeyCode for ESC button is 27
                        qodefSearchFullscreen.closeFullscreen($searchHolder);
                    }
                });
            }
        },
        openFullscreen: function($searchHolder){
            qodef.body.removeClass('qodef-fullscreen-search--fadeout');
	        qodef.body.addClass('qodef-fullscreen-search--opened qodef-fullscreen-search--fadein');

            setTimeout(function () {
                $searchHolder.find('.qodef-search-field').focus();
            }, 900);

            qodefCore.qodefScroll.disable();
        },
        closeFullscreen: function($searchHolder){
            qodef.body.removeClass('qodef-fullscreen-search--opened qodef-fullscreen-search--fadein');
            qodef.body.addClass('qodef-fullscreen-search--fadeout');

            setTimeout(function () {
                $searchHolder.find('.qodef-search-field').val('');
                $searchHolder.find('.qodef-search-field').blur();
                qodef.body.removeClass('qodef-fullscreen-search--fadeout');
            }, 300);

            qodefCore.qodefScroll.enable();
        }
    };

})(jQuery);
