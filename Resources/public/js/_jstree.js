var kunstmaanbundles = kunstmaanbundles || {};

kunstmaanbundles.jstree = (function($, window, undefined) {

    var init,
        buildTree;

    init = function() {
        buildTree();
    };

    buildTree = function() {
        var sidebarNavContainer = $('#app__sidebar__navigation');

        if(typeof sidebarNavContainer !== 'undefined' && sidebarNavContainer !== null) {
            sidebarNavContainer
            // Show when ready
            .on('ready.jstree', function() {
                $(this).addClass('app__sidebar__navigation--ready');
            })
            .on('changed.jstree', function(e, data) {
                var href = data.event.currentTarget.href;

                document.location.href = href;
            })
            // Create
            .jstree({
                'plugins' : ['types'],
                'types' : {
                    '#' : {
                        'icon' : 'fa fa--home'
                    },
                    'default' : {
                        'icon' : 'fa fa--file-o'
                    },
                    'offline' : {
                        'icon' : 'fa fa--chain-broken'
                    }
                }
            });
        }
    };

    return {
        init: init
    };

}(jQuery, window));
