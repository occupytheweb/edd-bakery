(function ($) {
    $(document).ready(function () {
        $('div, img').slideShow({
            timeOut: 2000,
            showNavigation: true,
            pauseOnHover: false,
            swipeNavigation: false
        });

        var navbar=$('.navbar')

        navbar.animate({top: '-100px'}, function () {
            navbar.hide();
        });

    })
}(jQuery));