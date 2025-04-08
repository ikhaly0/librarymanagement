<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "librarymanagement";

// Create connection
$conn = new mysqli("localhost", "root", "root", "librarymanagement");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_id = $_POST['book_id'];
$book_title = $_POST['book_title'];
$rack = $_POST['rack'];
$book_located = $_POST['book_located'];
$book_status = 1; // default to available

$sql = "INSERT INTO books (book_id, book_title, rack, book_located, book_status)
        VALUES (?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
            book_title = VALUES(book_title),
            rack = VALUES(rack),
            book_located = VALUES(book_located),
            book_status = VALUES(book_status),
            time_date = CURRENT_TIMESTAMP";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $book_id, $book_title, $rack, $book_located, $book_status);

if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
