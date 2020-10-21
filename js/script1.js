$(document).ready(function(){

    slideShow();  
    

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

function slideShow(){
    var trenutna = $("#slajder .prikazana");
    var sledeca = trenutna.next().length ? trenutna.next() : trenutna.parent().children(":first");
    trenutna.removeClass("prikazana");
    sledeca.addClass("prikazana");
    setTimeout(slideShow, 4000);
}

