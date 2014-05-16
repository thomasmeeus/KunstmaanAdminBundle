var kunstmaanbundles = kunstmaanbundles || {};

kunstmaanbundles.sidebartree = (function($, window, undefined) {

    var init,
        buildTree, searchTree,
        $sidebar = $('#app__sidebar'),
        $sidebarNavContainer = $('#app__sidebar__navigation'),
        $searchField = $('#app__sidebar__search');

    init = function() {
        buildTree();
        searchTree();
    };

    buildTree = function() {
        if($sidebarNavContainer !== 'undefined' && $sidebarNavContainer !== null) {
            $sidebarNavContainer
            // Show when ready
            .on('ready.jstree', function() {
                $sidebar.addClass('app__sidebar--tree-ready');
            })
            .on('changed.jstree', function(e, data) {
                var href = data.event.currentTarget.href;

                document.location.href = href;
            })
            // Create
            .jstree({
                'plugins': ['types', 'search'],
                'types': {
                    '#': {
                        'icon': 'fa fa--home'
                    },
                    'default': {
                        'icon' : 'fa fa--file-o'
                    },
                    'offline': {
                        'icon': 'fa fa--chain-broken'
                    }
                },
                'search' : {
                    'show_only_matches': true
                }
            });
        }
    };

    searchTree = function() {
        if($searchField !== 'undefined' && $searchField !== null) {
            $searchField.on('keyup', function() {
                var searchValue = $searchField.val();

                $sidebarNavContainer.jstree(true).search(searchValue);
            });
        }
    };

    return {
        init: init
    };

}(jQuery, window));


// Configuring the search plugin
        // "search" : {
        //     "show_only_matches" : true
        // }

// $(function () {
//   $("#plugins4").jstree({
//     "plugins" : [ "search" ]
//   });
//   var to = false;
//   $('#plugins4_q').keyup(function () {
//     if(to) { clearTimeout(to); }
//     to = setTimeout(function () {
//       var v = $('#plugins4_q').val();
//       $('#plugins4').jstree(true).search(v);
//     }, 250);
//   });
// });
