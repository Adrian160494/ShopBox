<div class="col-xs-8 col-xs-offset-4 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 ">
    <form class="form-inline text-right">
        <div class="form-group">
            <input class="form-control" type="text" name="login" placeholder="Login" ng-model="user.login" required />
            <input class="form-control" type="password" name="password" placeholder="Password" ng-model="user.password" required />
            <buttton type="button" class="btn btn-primary btn-sm" ng-click="logIn(user)" >Log In</buttton>
            <button type="reset" class="btn btn-danger btn-sm" >Reset</button>
        </div>
    </form>
</div>
