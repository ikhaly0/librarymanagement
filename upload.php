<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_status = $_POST['book_status'];
    // Connect to database
    $conn = new mysqli('localhost', 'root', 'root', 'librarymanagement');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO book_status (data) VALUES ('$book_status')";
    if ($conn->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>
