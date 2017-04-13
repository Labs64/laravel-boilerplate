(function ($) {

    //NProgress
    NProgress.start();
    if(NProgress !== undefined){
        NProgress.start();

        $(window).load(function () {
            NProgress.done();
        });
    }
})(jQuery);