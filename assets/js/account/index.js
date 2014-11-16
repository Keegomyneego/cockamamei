(function() {
    var currentPathParts = window.location.pathname.split('/');
    var projectName = currentPathParts[1];
    var C = angular.module(projectName, []);

    C.controller('BodyCtrl', [function() {

    }]);
})();

