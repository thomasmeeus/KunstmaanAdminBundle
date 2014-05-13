var adminbundle = adminbundle || {};

adminbundle.app = (function($, window, undefined) {

    var init;

    init = function() {
        cupcake.navigation.init();
        adminbundle.sidebartoggle.init();
    };

    return {
        init: init
    };

}(jQuery, window));

$(function() {
    adminbundle.app.init();
});
