<?php
// Database connection file
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "user_data"; 


$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>