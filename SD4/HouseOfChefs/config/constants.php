<?php

//Start Session
session_start();
define('SITEURL', 'http://localhost/HouseOfChefs/');
$host = 'localhost';
$user = 'root';

$password = '';
$db = 'house of chefs'; 
$connection = mysqli_connect($host,$user,$password,$db);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>