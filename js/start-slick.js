jQuery(document).ready(function() {
    if (jQuery(window).width() < 700) {
        jQuery('.nav-slider').slick({
            slidesToShow: 1.66,
            slidesToScroll: 1,
            dots: false,
            arrows: false
        });
    }
});