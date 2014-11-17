(function() {
    var currentPathParts = window.location.pathname.split('/');
    var projectName = currentPathParts[1];
    var C = angular.module(projectName, []);
    $(perfectWeek).onclick(notify());

    C.controller('BodyCtrl', [function() {

    }]);

    function notify() {
        window.open("comm/notify", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
    }
})();

