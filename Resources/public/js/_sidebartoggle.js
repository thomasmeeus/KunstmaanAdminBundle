var adminbundle = adminbundle || {};

adminbundle.sidebartoggle = (function(window, undefined) {

    var init,
        toggle;

    init = function() {
        toggle();
    };

    toggle = function() {
        var appMain = document.getElementById('app__main'),
            toggleButton = document.getElementById('app__sidebar-toggle');

        toggleButton.addEventListener('click', function() {
            appMain.classList.toggle('app__main--altered-state');
        }, false);
    };

    return {
        init: init
    };

}(window));
