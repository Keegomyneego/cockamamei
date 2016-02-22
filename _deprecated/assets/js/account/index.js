(function() {
    var currentPathParts = window.location.pathname.split('/');
    var projectName = currentPathParts[1];
    var C = angular.module(projectName, []);
    $('#perfectWeek').click(function() {
        notify();
    });

    C.controller('BodyCtrl', [function() {

    }]);

    function notify() {
        window.open("../comm/notify", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=200, left=200, width=400, height=400");
    }
})();

