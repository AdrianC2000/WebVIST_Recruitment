$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 0 ) {
            $('.navbar').addClass('activeNavbar');
            $('.nav-link').addClass('activeNavLink');
        } else {
            $('.navbar').removeClass('activeNavbar');
            $('.nav-link').removeClass('activeNavLink');
        }
    });
});