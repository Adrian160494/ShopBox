<?php

require_once 'DataBase.php';

$subject = $_GET['subject'];
$email = $_GET['email'];
$message = $_GET['message'];

$db= new mysqli($host,$user,$password,$db_name);

$stat = $db->query("INSERT INTO messages(subject,email,message) VALUES('$subject','$email','$message')");
$stat->free_result();

?>