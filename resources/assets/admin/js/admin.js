(function($){
    var guideData = localStorage.getItem('guideData')
        ? JSON.parse(localStorage.getItem('guideData'))
        : { isStarted: false, currentStep: 0 };

    var guideChimp = new GuideChimp();

    guideChimp.on('onBeforeChange', function (guide, fromStep, toStep) {
        if (toStep.page) {
            guideData.currentStep = guide.steps.indexOf(toStep);
            guideData.isStarted = true;
            localStorage.setItem('guideData', JSON.stringify(guideData));
            window.location.href = toStep.page;
        }
    });

    guideChimp.on('onStop', function (guide, fromStep, toStep) {
        guideData.currentStep = 0;
        guideData.isStarted = false;
        localStorage.setItem('guideData', JSON.stringify(guideData));
    });

    var $menuSections = $('.nav_menu');

    guideChimp.setTour([
        {
            element: '.guide',
            title: 'Start Guided Tour',
            description: 'Start the tour by clicking this menu item. You can also show the tour to all new customers and walk them through the website.',
        },
        {
            element:  '.tile_count',
            title: 'Application Summary',
            description: 'You can use these components to show the current application or customer stats.',
        },
        {
            element:  '#log_activity > .col-md-3',
            title: 'Log Levels',
            description: 'This is a component, which is providing you with information about application logs.',
        },

    ]);

    if (guideData.isStarted) {
        guideChimp.start(guideData.currentStep, true);
    }

    $('.guide').on('click', function(){
        guideChimp.start();
    });

})(jQuery);
