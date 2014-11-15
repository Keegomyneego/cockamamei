(function() {
    var currentPathParts = window.location.pathname.split('/');
    var projectName = currentPathParts[1];
    var C = angular.module(projectName, ['pwCheck']);
    var D = angular.module('pwCheck', []);

    C.controller('BodyCtrl', ['$scope', function($scope) { }]);

    C.controller('SignUpFormCtrl', ['$http', function($http) {
        var current = this;
        this.emailRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        this.nameRegex = /^[A-Za-z']+$/;

        this.signup = function(isValid)
        {
            if(isValid)
            {
                $http({
                    method: 'POST',
                    url: 'account/create',
                    data: $.param({
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        password: this.password,
                        passwordConfirm: this.passwordConfirm
                    }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).success(function(data) {
                    alert(data);
                });
            }
        };

        this.erase = function()
        {
            this.firstname = '';
            this.lastname = '';
            this.email = '';
            this.password = '';
            this.passwordConfirm = '';
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

