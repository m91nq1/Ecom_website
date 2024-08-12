<?php
$servername = "localhost";
$username = "root";
$password = "Knowmyname1!";
$dbname = "sasol_ecommerce";
$port = 3307; 


$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>
