

$(document).ready(function(){

    

    $('#scrollToTop').click(function () {
            var offset = 220;
            var duration = 500;
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery('#scrollToTop').fadeIn(duration);
                } else {
                    jQuery('#scrollToTop').fadeOut(duration);
                }
            });
        
            $('html').animate({
                scrollTop: 0
            }, 2000);
    });

})