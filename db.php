<?php
$host = 'localhost';
$dbname = 'TravelEase';
$username = 'root';
$password = '12345'; // Assuming this is the actual password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>