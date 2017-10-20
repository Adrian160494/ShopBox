<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="en" ng-app="shop">
<head>
    <title>ShopBox- the best shoppings!</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Nosifer" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Satisfy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    <!--Files with css code-->
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <!--Files with JS code-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <!--Angular Files -->
    <script src="angularFiles/angular.js"></script>
    <script src="angularFiles/angular-route.js"></script>
    <script src="angularFiles/controllers.js"></script>
</head>
<body onscroll="basketOnTop()" ng-controller="mainCtrl" ng-init="checkPanel()">
<div class="container-fluid">
    <div class="basketContainer" style="position:absolute; ">
        <img class="basketIMG" src="img/basket2.png" alt="doesn't work" onclick="openBasket()"/>
        <div class="basket">
            <div>
                <p>Summary Order: </p>
                    <div ng-repeat="item in itemsInBasket">
                        <p>{{$index+1}}. {{item.name}} - {{item.price}} PLN</p>
                    </div>

                <p>You must pay: {{sum | number:2}}</p>
            </div>
        </div>
    </div>
    <nav>
        <div id="form" class="row">
            <div ng-include="loginPanel ? 'Views/userData.php':'Views/formLogIn.php'">

            </div>
            <div class="pull-right" style="color: red" ng-show="error">
                <span>{{error}}</span>
            </div>
        </div>
        <div class="row">
            <figure>
                <img src="img/banner2.png" alt="doesn't work" width="100%"/>
            </figure>
        </div>
        <div class="row navigation">
            <div class="nav navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand">ShopBox</span>
                </div>
                <div class="collapse navbar-collapse text-center" id="navigation">
                    <ul class="nav navbar-nav" >
                        <li><a href="#!home">Home</a></li>
                        <li><a href="#!products">Products</a></li>
                        <li><a href="#!contact">Contact</a></li>
                        <li ng-hide="loginPanel"><a href="#!register">Register</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>
    <section>
        <div ng-view>

        </div>
    </section>
</div>
<footer>
   <div class="div-content">
       <div class="text-center copyright" style="color:white; position:relative;  top:50px; margin-top:30px;">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2017 Wszelkie prawa zastrzeżone</div>
       <div class="pull-right" style="">
           <a href="https://www.facebook.com/adr.ian.395017"><span id="facebook" style="margin-left: 10px;"> <img src="img/face2.png" alt="doesn't work" width="40px"/></span></a>
           <a href=""><span id="twitter" style="margin-left: 10px;"><img src="img/twit2.png" alt="doesn't work" width="40px"/></span></a>
           <a href=""><span id="instagram" style="margin-left: 10px;"><img src="img/insta.png" alt="doesn't work" width="40px"/></span></a>
       </div>
       <div class="pull-left contactInfo" style=" position:absolute;bottom: 0; color: white;">
           <p>Contact:</p>
           <p>Adrian.ca1971@gmail.com</p>
           <p>tel.609-207-923</p>
       </div>
   </div>
</footer>
</body>
</html>
