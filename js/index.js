$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 0 ) {
            $('.navbar').addClass('activeNavbar');
            $('.nav-link').addClass('activeNavLink');
        } else {
            $('.navbar').removeClass('activeNavbar');
            $('.logoutButton').removeClass('activeNavLink');
            $('.nav-link').removeClass('activeNavLink');
        }
    });
});

$(document).ready(function () {
    $(function () {
        $( "#logoutButton" ).click(function() {
            $.ajax({
                data: {'logoutSubmit': 'null'},
                type: 'post',
                success: function (response) {
                }
            });
        });
    });
});