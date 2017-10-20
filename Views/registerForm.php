<div class="col-md-12 col-xs-12">
    <div class="panel-heading text-center col-md-offset-3 col-md-6 col-xs-offset-2 col-xs-8">
        <h2 style="color: white;">Create your own account!</h2>
    </div>
    <div class=" registerForm panel-body col-md-offset-3 col-md-6 col-xs-offset-2 col-xs-8">
        <form name="myForm" class="myForm form-horizontal" novalidate ng-submit="addNewUser(newUser)">
            <div class="">
                <div class="form-group">
                    <div class="col-xs-4">
                        <label>Login: </label>
                    </div>
                    <div class="col-xs-8">
                        <input name="login" type="text" class="form-control" ng-model="newUser.login" required="true"/>
                        <span ng-show="myForm.login.$dirty && myForm.login.$invalid" style="color: red">Write the right login!</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4">
                        <label>Password: </label>
                    </div>
                    <div class="col-xs-8">
                        <input name="password" type="password" class="form-control" ng-model="newUser.password" required="true"/>
                        <span ng-show="myForm.password.$dirty && myForm.password.$invalid" style="color: red">Insert correct password!</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4">
                        <label>Confirm password: </label>
                    </div>
                    <div class="col-xs-8">
                        <input name="confirmPassword" type="password" class="form-control" ng-model="newUser.confirmPassword" required="true"/>
                        <span ng-show="myForm.confirmPassword.$dirty && myForm.confirmPassword.$invalid" style="color: red">Write again password!</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4">
                        <label>Email: </label>
                    </div>
                    <div class="col-xs-8">
                        <input name="email" type="email" class="form-control" ng-model="newUser.email" required="true"/>
                        <span ng-show="myForm.email.$dirty && myForm.email.$invalid" style="color: red">Write a valid email adress!</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4">
                        <label>Confirm licence: </label>
                    </div>
                    <div class="col-xs-8">
                        <input name="checkbox" type="checkbox" class="form-control" ng-model="newUser.agreed" required/>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" ng-disabled="myForm.$invalid" >Register</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <span class="alert-danger" ng-show="errorFlag">{{registerError}}</span>
                </div>
            </div>
        </form>
    </div>

</div>