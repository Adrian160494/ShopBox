<?php

session_start();
require_once "classes/DataBaseLogin.php";

$login = $_GET['userLogin'];
$password = $_GET['userPassword'];
$passwordConf = $_GET['userConfirmPassword'];
$email = $_GET['userEmail'];

try{
    $db = new DataBaseLogin();
    $db_connect = $db->createConnect();
    $resultLogin = $db->searchUserWithLogin($db_connect,$login);

    if($resultLogin->num_rows>0){
        echo "There is the user in database with the same login!";
        exit;
    } else{
        $resultEmail = $db->searchUserWithEmail($db_connect,$email);
        if($resultEmail->num_rows>0){
            echo "There is the user in the database with the same email!";
            exit;
        } else{
            if($password != $passwordConf){
                echo "The passwords are not the same!";
                exit;
            } else{
                $_SESSION['newUserLogin'] = $login;
                $_SESSION['newUserEmail'] = $email;
                $resultAdd = $db->addNewUser($db_connect,$login,$password,$email);
                echo "Done";
            }
        }
    }
} catch (mysqli_sql_exception $e){
    echo "MYSQL ERROR";
}

?>

