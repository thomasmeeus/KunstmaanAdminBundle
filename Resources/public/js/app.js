var kunstmaanbundles = kunstmaanbundles || {};

kunstmaanbundles.app = (function($, window, undefined) {

    var init;

    init = function() {
        cupcake.navigation.init();
        kunstmaanbundles.sidebartoggle.init();
    };

    return {
        init: init
    };

}(jQuery, window));

$(function() {
    kunstmaanbundles.app.init();
});
