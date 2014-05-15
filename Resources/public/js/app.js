var kunstmaanbundles = kunstmaanbundles || {};

kunstmaanbundles.app = (function($, window, undefined) {

    var init;

    init = function() {
        cupcake.navigation.init();
        kunstmaanbundles.sidebartoggle.init();
        kunstmaanbundles.jstree.init();
    };

    return {
        init: init
    };

}(jQuery, window));

$(function() {
    kunstmaanbundles.app.init();
});
