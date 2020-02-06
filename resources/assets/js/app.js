(function ($) {
    var guideData = localStorage.getItem('guideData')
        ? JSON.parse(localStorage.getItem('guideData'))
        : { wasStarted: false, currentStep: 0 };

    var guideChimp = new GuideChimp();

    guideChimp.on('onBeforeChange', function (guide, fromStep, toStep) {
        if (toStep.page) {
            guideData.currentStep = guide.steps.indexOf(toStep);
            guideData.wasStarted = true;
            localStorage.setItem('guideData', JSON.stringify(guideData));
            window.location.href = toStep.page;
        }
    });

    guideChimp.on('onStop', function (guide, fromStep, toStep) {
        guideData.currentStep = 0;
        guideData.wasStarted = false;
        localStorage.setItem('guideData', JSON.stringify(guideData));
    });

    guideChimp.setTour([
        {
            element: '.content > .title',
            title: 'Step 1',
            description: 'Step 1',
        },
        {
            element: '.content > .description',
            title: 'Step 2',
            description: 'Step 2',
        },
    ]);

    if (guideData.wasStarted) {
        guideChimp.start(guideData.currentStep, true);
    }

    $('#guidechimp').on('click', function(){
        guideChimp.start();
    })
})(jQuery);
