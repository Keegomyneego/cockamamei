<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <img src="/<?php echo __PROJECT_NAME; ?>/assets/images/cockamamie_logo.png" alt="Cockamamie">
            
            <section ng-controller="SignUpFormCtrl as SignUpForm" ng-show="Body.is('signup')">
                <h1>Sign Up</h1>
                <form
                    id="signUpForm" name="signUpForm"
                    ng-submit="SignUpForm.signup(signUpForm.$valid)"
                    autocomplete="off"
                    novalidate>

                    <label for="firstname">First Name</label>
                    <input
                        type="text" id="firstname" name="firstname"
                        ng-model="SignUpForm.firstname"
                        ng-pattern="SignUpForm.nameRegex"
                        ng-minlength="2"
                        ng-maxlength="31"
                        required/>

                    <label for="lastname">Last Name</label>
                    <input
                        type="text" id="lastname" name="lastname"
                        ng-model="SignUpForm.lastname"
                        ng-pattern="SignUpForm.nameRegex"
                        ng-minlength="2"
                        ng-maxlength="31"
                        required/>

                    <label for="email">Email</label>
                    <input
                        type="text" id="email" name="email"
                        ng-model="SignUpForm.email"
                        ng-pattern="SignUpForm.emailRegex"
                        required/>

                    <label for="password">Password</label>
                    <input
                        type="password" id="password" name="password"
                        ng-model="SignUpForm.password"
                        ng-minlength="4"
                        ng-maxlength="31"
                        required/>

                    <label for="passwordConfirm">Password Confirm</label>
                    <input
                        type="password" id="passwordConfirm" name="passwordConfirm"
                        pw-check="password"
                        ng-model="SignUpForm.passwordConfirm"
                        ng-minlength="4"
                        ng-maxlength="31"
                        required/>

                    <button type="submit" class="md success button" ng-disabled="signUpForm.$invalid">Sign Up</button>
                    or <a href="#" class="action" ng-click="Body.toggleSection('login', $event)">Login</a>

                    <button type="reset" class="right md alert button" ng-click="SignUpForm.erase()">Clear</button>
                </form>
            </section>

            <section ng-controller="LoginFormCtrl as LoginForm" ng-show="Body.is('login')">
                <h1>Login</h1>

                <form
                    id="loginForm" name="loginForm"
                    ng-submit="LoginForm.login(loginForm.$valid)"
                    autocomplete="off"
                    novalidate>

                    <label for="email">Email</label>
                    <input
                        type="text" id="email" name="email"
                        ng-model="LoginForm.email"
                        ng-pattern="LoginForm.emailRegex"
                        required/>

                    <label for="password">Password</label>
                    <input
                        type="password" id="password" name="password"
                        ng-model="LoginForm.password"
                        ng-minlength="4"
                        ng-maxlength="31"
                        required/>

                    <button type="submit" class="md success button" ng-disabled="loginForm.$invalid">Login</button>
                    or <a href="#" class="action" ng-click="Body.toggleSection('signup', $event)">Sign Up</a>

                    <button type="reset" class="right md alert button" ng-click="LoginForm.erase()">Clear</button>
                </form>
            </section>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
