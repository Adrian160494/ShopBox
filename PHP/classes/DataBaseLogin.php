<?php

class DataBaseLogin{

    public $host,$dbname,$db_user,$db_password;

    function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'shopbox';
        $this->db_user = 'root';
        $this->db_password = '';
    }

    function createConnect(){
        return new mysqli($this->host,$this->db_user,$this->db_password,$this->dbname);
    }

    function searchUser(mysqli $db,$login, $password){
        $sql = "SELECT * FROM users WHERE login='".$login."'";
        $result = $db->query($sql);
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            $userPassword = $user['password'];
            if(password_verify($password,$userPassword)){
                return $user;
            }
            return "Incorrect password";

        } else{
            return false;
        }
    }

    function searchUserWithLogin(mysqli $db, $login){
        $sql = "SELECT * FROM users WHERE login='".$login."'";

        $result = $db->query($sql);

        return $result;
    }

    function searchUserWithEmail(mysqli $db, $email){
        $sql = "SELECT * FROM users WHERE email='".$email."'";

        $result = $db->query($sql);

        return $result;
    }

    function addNewUser(mysqli $db, $login, $password,$email){

        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(login,password,email) VALUES('$login','$passwordHash','$email')";

        $result = $db->query($sql);

        return $result;
    }
}

?>