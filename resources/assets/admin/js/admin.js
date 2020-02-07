(function($){
    var guidedTourData = localStorage.getItem('guidedTourData')
        ? JSON.parse(localStorage.getItem('guidedTourData'))
        : { isStarted: false, currentStep: 0 };

    var guideChimp = new GuideChimp();

    guideChimp.on('onBeforeChange', function (tour, fromStep, toStep) {
        if (toStep.page && window.location.href.indexOf(toStep.page) < 0) {
            guidedTourData.currentStep = tour.steps.indexOf(toStep);
            guidedTourData.isStarted = true;
            localStorage.setItem('guidedTourData', JSON.stringify(guidedTourData));
            window.location.href = toStep.page;
        }
    });

    guideChimp.on('onStop', function () {
        guidedTourData.currentStep = 0;
        guidedTourData.isStarted = false;
        localStorage.setItem('guidedTourData', JSON.stringify(guidedTourData));
    });

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

    if (guidedTourData.isStarted) {
        guideChimp.start(guidedTourData.currentStep, true);
    }

    $('.guided-tour').on('click', function(){
        guideChimp.start();
    });
})(jQuery);
