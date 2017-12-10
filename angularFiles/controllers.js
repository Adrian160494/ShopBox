var app = angular.module("shop",["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider.when("/",{
        templateUrl: 'Views/home.php'
    });
    $routeProvider.when("/home",{
        templateUrl: 'Views/home.php'
    });


    $routeProvider.when('/register',{
        templateUrl: "Views/registerForm.php"
    });

    $routeProvider.when('/about',{
        templateUrl: "Views/about.php"
    });

    $routeProvider.when('/products',{
        templateUrl: "Views/products.php"
    });

    $routeProvider.when('/registerComplete', {
        templateUrl: "Views/registerComplete.php"
    });

    $routeProvider.when('/contact',{
        templateUrl: "Views/contact.php"
    });
});

app.filter('pagin',function () {
    return function (data, perPage,page) {
        var pagin =[];
        var count =0;
        if(angular.isArray(data)){
            var length = Math.floor(data.length / perPage);
            for(var i=0; i<length;i++){
                var newArray =[];
                for(var n=0;n<perPage;n++){
                    newArray.push(data[count]);
                    count++;
                }
                pagin.push(newArray);
            }
            console.log(pagin);
            return pagin[page];

        } else{
            return data;
        }
    }
});

app.filter('byPrice',function () {
    return function (data, min, max) {
        var minmax = [];
        var arraymin = [];
        var arraymax = [];
        if(angular.isArray(data)){
            if(angular.isNumber(min) && angular.isNumber(max)){
                for(var i=0;i<data.length;i++){
                    if(parseFloat(data[i].price)>min && parseFloat(data[i].price)<max){
                        minmax.push(data[i]);
                    }
                }
                return minmax;
            }
            if( angular.isNumber(min) && max==null){
                for(var i=0;i<data.length;i++){
                    if(parseFloat(data[i].price)>min){
                        arraymin.push(data[i]);
                    }
                }
                return arraymin;
            }
            if(min==null && angular.isNumber(max)){
                for(var i=0;i<data.length;i++){
                    if(parseFloat(data[i].price)<max){
                        arraymax.push(data[i]);
                    }
                }
                return arraymax;
            }
            if(min==null && max==null){
                return data;
            }
        } else{
            return data;
        }

    }
});

app.filter('byCategory',function () {
    return function (data,category) {
        var newArray =[];
        if(angular.isArray(data) && angular.isString(category)){
                for(var i=0;i<data.length;i++){
                    if(data[i].category==category){
                        newArray.push(data[i]);
                    }
                }
                return newArray;
        } else{
            return data;
        }
    }
});

app.controller('mainCtrl',function ($scope,$http, $location) {
    $scope.loginPanel = false;
    $scope.addMessager = null;
    $scope.errorFlag = false;
    $scope.categorySelected = null;
    $scope.minimalPrice = null;
    $scope.maximalPrice = null;
    $scope.searchingPhraze = "";
    $scope.page = 0;
    $scope.productsPerPage = 12;
    $http.get("PHP/getProducts.php").then(function (response) {
        $scope.products = response.data;
        console.log($scope.products);
        var arrayCategories = [];
        for(var k=0; k<$scope.products.length; k++){
            $scope.category = $scope.products[k].category;
            for(var l=0; l<$scope.products.length; l++){
                if(arrayCategories[l]==null){
                    arrayCategories[l]=$scope.category;
                    break;
                } else{
                    if(arrayCategories[l]==$scope.category){
                        break;
                    }
                }
            }
        }

        var pagination = [];
        var lengthProd = $scope.products.length;
        $scope.paginationLength= Math.floor(lengthProd / $scope.productsPerPage);
        for(var i=0;i<$scope.paginationLength;i++){
            pagination.push(i+1);
        }
        $scope.paginationArray = pagination;
        console.log($scope.paginationArray);
        $scope.arrayCategories = arrayCategories;
        var array=[];
        var random = [];
        for(var i=0;i<3;i++){
            random[i] = Math.floor(Math.random()*125);
        }
        for(var n=0;n<3;n++){
            array[n]=$scope.products[random[n]];
        }

        $scope.productsToHome = array;
        console.log($scope.productsToHome);
    });



    $scope.itemsInBasket = [];
    $scope.sum =0;

    $scope.addNewUser = function (newUser) {
      $http.get("PHP/register.php",{params:{userLogin: newUser.login,userPassword: newUser.password, userConfirmPassword: newUser.confirmPassword, userEmail: newUser.email}}).then(function (response) {
        $scope.newUserData = response.data;
        console.log($scope.newUserData);
          if($scope.newUserData.length<10){
                $location.path('/registerComplete');
                $scope.errorFlag = false;
          }else {
              $scope.registerError = response.data;
              $scope.errorFlag = true;
          }
      })
    };

    $scope.addToBasket = function (item) {

      $scope.itemsInBasket.push(item);
      var sum= 0;
      for(var i=0;i<$scope.itemsInBasket.length;i++){
          sum += parseFloat($scope.itemsInBasket[i].price);
      }
      $scope.sum = sum;
    };

    $scope.logIn = function (user) {
        $scope.error = null;
        $http.get("PHP/logIn.php",{params:{userLogin: user.login,userPassword: user.password}})
            .then(function (response) {
                $scope.answer = response.data;
                if(angular.isDefined($scope.answer['login'])){
                    console.log($scope.answer);
                    $scope.loginPanel = true;
                    $location.path("/");
                } else{
                    $scope.error = $scope.answer;
                }
            })
    };
    $scope.checkPanel = function () {
       $http.get("PHP/checkLogIn.php").then(function (response) {
           $scope.loginPanel= response.data;
           console.log($scope.loginPanel);
       });
       return $scope.loginPanel;
    };

    $scope.logOut = function () {
        $http.get("PHP/logOut.php").then(function (response) {
            $scope.loginPanel = response.data;
            console.log($scope.loginPanel);
        });
    };

    $scope.showFilters = function () {
        if($('.filters').css('display')=='none'){
            $('.filters').show('blind','linear',1000);
            $('.filters').css('display','block');
        } else {
            $('.filters').hide('blind','linear',1000);
            setTimeout(function () {
                $('.filters').css('display','none');
            },1000);
        }
    };

    $scope.changePage = function (num) {
        $scope.page = num;
        console.log($scope.page);
    };

    $scope.addMessage = function (newMessage) {
        $http.get('PHP/sendEmail.php', {
            params: {
                subject: newMessage.subject,
                email: newMessage.email,
                message: newMessage.message
            }
        }).then(function (response) {
            $scope.addMessage = 'Message was sent!';
        })
    };
});

function openBasket() {
    var basket = $('.basket');
    if(basket.css('display')=="none"){
        basket.show('blind',1000);
    } else{
        basket.hide('blind',1000);
    }
}

function basketOnTop() {

    var basket = $('.basketIMG');
    var basketDesc = $('.basket');
    var dimension = window.scrollY;
    console.log(dimension);
    if(dimension>50){
        basket.css({
            position: 'fixed',
            width: '65px',
            height:'60px',
            background: '-webkit-radial-gradient(black,white)',
            top: 0
        });
        basketDesc.css({
            position: "fixed",
            top: '65px',
            left: '50px',
        })
    } else {
        basket.css({
            position: 'static',
            border: '0px',
            width: '50px',
            height: '50px',
            background: '-webkit-radial-gradient(black,white)'
        });
        basketDesc.css({
            position: 'relative',
            left: '20px',
            top:'5px'
        })
    }
}