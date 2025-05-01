<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP/MAMP
$password = ""; // Default password for XAMPP/MAMP
$dbname = "grammar";

// Create connection
$conn =new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
