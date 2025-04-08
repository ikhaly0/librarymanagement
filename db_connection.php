<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = " librarymanagement ";

// Create connection
$conn = new mysqli("localhost", "root", "root", "librarymanagement");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
