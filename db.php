<?php
// db.php

// Database configuration
$host = 'localhost';        // Database host
$user = 'root';    // Database username
$password = ''; // Database password
$database = 'food_fusion';   // Database name

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
