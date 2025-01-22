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


if (isset($_GET['delete'])) {
    $productId = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id = $productId";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}


$products = $conn->query("SELECT * FROM products");
?>
