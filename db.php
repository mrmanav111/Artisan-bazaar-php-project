<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shopping_cart_db";


$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed;" .$conn->connect_error);
} else {
    //echo "Connected Successfully to database '$dbname'";
}
?>