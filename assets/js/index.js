(function() {
    var currentPathParts = window.location.pathname.split('/');
    var projectName = currentPathParts[1];
    var C = angular.module(projectName, ['pwCheck']);
    var D = angular.module('pwCheck', []);

    C.controller('BodyCtrl', [function() {
        var current = this;
        var section = 'login';

        current.updateSection = function(id)
        {
            section = id;
        }

        current.is = function(id)
        {
            return section == id;
        }
    }]);

    C.controller('SignUpFormCtrl', ['$http', function($http) {
        var current = this;
        current.emailRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        current.nameRegex = /^[A-Za-z']+$/;

        current.signup = function(isValid)
        {
            if(isValid)
            {
                $http({
                    method: 'POST',
                    url: 'account/create',
                    data: $.param({
                        firstname: current.firstname,
                        lastname: current.lastname,
                        email: current.email,
                        password: current.password,
                        passwordConfirm: current.passwordConfirm
                    }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).success(function(data) {
                    alert(data);
                });
            }
        }

        current.erase = function()
        {
            current.firstname = '';
            current.lastname = '';
            current.email = '';
            current.password = '';
            current.passwordConfirm = '';
        }
    }]);

    C.controller('LoginFormCtrl', ['$http', function($http) {
        var current = this;
        current.emailRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        current.nameRegex = /^[A-Za-z']+$/;

        current.login = function(isValid)
        {
            if(isValid)
            {
                $http({
                    method: 'POST',
                    url: 'account/login',
                    data: $.param({
                        email: current.email,
                        password: current.password
                    }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).success(function(data) {
                    alert(data);
                });
            }
        }

        current.erase = function()
        {
            current.email = '';
            current.password = '';
        }
    }]);

    D.directive('pwCheck', [function() {
        return {
            require: 'ngModel',
            link: function(scope, elem, attrs, ctrl) {
                var matchAgainst = '#' + attrs.pwCheck;
                elem.on('keyup', function() {
                    scope.$apply(function() {
                        var v = elem.val() === $(matchAgainst).val();
                        ctrl.$setValidity('pwMatch', v);
                    });
                });
                $(matchAgainst).on('keyup', function() {
                    scope.$apply(function() {
                        var v = elem.val() === $(matchAgainst).val();
                        ctrl.$setValidity('pwMatch', v);

                    });
                });
            }
        }
    }]);
})();

