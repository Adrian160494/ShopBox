<?php

session_start();

echo '
<div class="panel panel-success">
    <div class="panel-heading text-center">
        <h1>Registration complete!</h1>
    </div>
    <div class="panel-body text-center">
        <p class="text-uppercase">You create new User as '.$_SESSION['newUserLogin'].' with email: '.$_SESSION['newUserEmail'].'</p>
    </div>
    <div class="panel-footer text-center">
        <h3>Now you can log in with your new account!</h3>
        <a href="#!home" >Go to the home page!</a>
    </div>
</div>
';
unset($_SESSION['newUserLogin']);
unset($_SESSION['newUserEmail']);
?>