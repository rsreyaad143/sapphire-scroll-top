(function($){
    "use strict";

    $(document).ready(function () {
        $(window).on('scroll', function () { 
            var difHigh = $(window).scrollTop();

            if( difHigh > 100){
                $('.sapphire-scroll-to-top').fadeIn();
            } else {
                $('.sapphire-scroll-to-top').fadeOut();
            }
        });

        $('.sapphire-scroll-to-top').on('click', function(){
            $('html, body').animate({'scrollTop': 0}, 1000);
            return false;
        });
    });
})(jQuery);