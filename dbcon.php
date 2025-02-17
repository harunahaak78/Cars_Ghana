<?php
$servername = "localhost"; 
$username = "root";     
$password = "";           
$dbname = "car_shop"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$products = $conn->query("SELECT * FROM products");
?>
