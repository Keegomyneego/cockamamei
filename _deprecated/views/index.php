<?php  include 'views/partials/header.php'; ?>

<div class="header">
    <img src="/<?php echo __PROJECT_NAME; ?>/assets/images/cockamamie_logo.png" alt="Cockamamie">
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <section ng-controller="SignUpFormCtrl as SignUpForm" ng-show="Body.is('signup')">
                <h1>Sign Up</h1>
                <form
                    id="signUpForm" name="signUpForm"
                    ng-submit="SignUpForm.signup(signUpForm.$valid)"
                    autocomplete="off"
                    novalidate>

                    <input
                        type="text" id="firstname" name="firstname"
                        placeholder="First Name" class="form-control form-group"
                        ng-model="SignUpForm.firstname"
                        ng-pattern="SignUpForm.nameRegex"
                        ng-minlength="2"
                        ng-maxlength="31"
                        required/>

                    <input
                        type="text" id="lastname" name="lastname"
                        placeholder="Last Name" class="form-control form-group"
                        ng-model="SignUpForm.lastname"
                        ng-pattern="SignUpForm.nameRegex"
                        ng-minlength="2"
                        ng-maxlength="31"
                        required/>

                    <input
                        type="text" id="email" name="email"
                        placeholder="Email" class="form-control form-group"
                        ng-model="SignUpForm.email"
                        ng-pattern="SignUpForm.emailRegex"
                        required/>

                    <input
                        type="password" id="password" name="password"
                        placeholder="Password" class="form-control form-group"
                        ng-model="SignUpForm.password"
                        ng-minlength="4"
                        ng-maxlength="31"
                        required/>

                    <input
                        type="password" id="passwordConfirm" name="passwordConfirm"
                        placeholder="Confirm Password" class="form-control form-group"
                        pw-check="password"
                        ng-model="SignUpForm.passwordConfirm"
                        ng-minlength="4"
                        ng-maxlength="31"
                        required/>

                    <button type="submit" class="btn btn-default" ng-disabled="signUpForm.$invalid">Sign Up</button>
                    or <a href="#" class="action" ng-click="Body.toggleSection('login', $event)">Login</a>

                    <button type="reset" class="btn btn-danger" ng-click="SignUpForm.erase()">Clear</button>
                </form>
            </section>

            <section ng-controller="LoginFormCtrl as LoginForm" ng-show="Body.is('login')">
                <h1>Login</h1>

                <form
                    id="loginForm" name="loginForm"
                    ng-submit="LoginForm.login(loginForm.$valid)"
                    autocomplete="off"
                    novalidate>

                    <input
                        type="text" id="email" name="email"
                        placeholder="Email" class="form-control form-group"
                        ng-model="LoginForm.email"
                        ng-pattern="LoginForm.emailRegex"
                        required/>

                    <input
                        type="password" id="password" name="password"
                        placeholder="Password" class="form-control form-group"
                        ng-model="LoginForm.password"
                        ng-minlength="4"
                        ng-maxlength="31"
                        required/>

                    <button type="submit" class="btn btn-default" ng-disabled="loginForm.$invalid">Login</button>
                    or <a href="#" class="action" ng-click="Body.toggleSection('signup', $event)">Sign Up</a>

                    <button type="reset" class="btn btn-danger" ng-click="LoginForm.erase()">Clear</button>
                </form>
            </section>
        </div>
    </div>
</div>

<?php
// include 'views/partials/footer.php';

/* Work around while Router isn't working */
include 'partials/footer.php';
?>
