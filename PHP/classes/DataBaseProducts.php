<?php

class DataBaseProducts{

    private $host,$dbname,$db_user,$db_password;

    function __construct()
    {
        $this->host = "localhost";
        $this->db_user = "root";
        $this->db_password = "";
        $this->dbname = "shopbox";
    }

    function createConnection(){
        return new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->db_user,$this->db_password);
    }

    function getAllProducts(PDO $db){
        $sql = "SELECT * FROM products";

        $stm = $db->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll();
        return $result;
    }

    function addProduct(PDO $db,$name,$description,$image,$category,$price){
     $sql = "INSERT INTO products(name,description,image,category,price) VALUES('$name','$description','$image','$category','$price')";

     $stm = $db->prepare($sql);

     $result = $stm->execute();
     return $result;
    }
}

?>