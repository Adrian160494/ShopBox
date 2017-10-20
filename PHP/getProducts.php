<?php

require_once "classes/DataBaseProducts.php";

$db= new DataBaseProducts();

$db_connect= $db->createConnection();

$products= $db->getAllProducts($db_connect);

$productsAll = json_encode($products);
echo $productsAll;

?>