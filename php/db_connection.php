<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // Replace with your server hostname or IP address
$username = "ftp089127"; // Replace with your MySQL username
$password = "B8odo0md!"; // Replace with your MySQL password
$dbname = "db_journals"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
