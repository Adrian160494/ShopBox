<?php
session_start();
?>
<div class="pull-right">
    <table id="userData" class="table table-bordered" style="color: white;">
        <tr>
            <td>Zalogowano jako: <?php  if(isset($_SESSION['login'])) {echo $_SESSION['login'];} ?></td><td> Email: <?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?></td><td><button type="button" ng-click="logOut()" class="btn btn-danger">LogOut</button> </td>
        </tr>
    </table>
</div>
