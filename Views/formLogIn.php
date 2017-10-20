<form class="form-inline text-right">
    <div class="form-group">
        <input class="form-input" type="text" name="login" placeholder="Login" ng-model="user.login" required />
        <input class="form-input" type="password" name="password" placeholder="Password" ng-model="user.password" required />
        <buttton type="button" class="btn btn-primary btn-sm" ng-click="logIn(user)" >Log In</buttton>
    </div>
</form>