<?php
session_start();
require_once "classes/DataBaseLogin.php";

$login = $_GET['userLogin'];
$password = $_GET['userPassword'];

$db = new DataBaseLogin();

$db_connect = $db->createConnect();

$result = $db->searchUser($db_connect,$login,$password);

if(isset($result['login'])){
    $_SESSION['id']=$result['id'];
    $_SESSION['login'] = $result['login'];
    $_SESSION['password'] = $result['password'];
    $_SESSION['email']=$result['email'];
    $json_result = json_encode($result);
    echo $json_result;
} else if(is_string($result)){
    echo $result;
} else{
    echo "There is no matching users!";

}



?>