$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 0 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});