<?php
// Database connection details
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'librarymanagement'; // Replace with your database name

$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $book_id = $_POST['book_id'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $time_date = $_POST['time_date']; // This column has a default value, so it's optional
    $returnbook = $_POST['returnbook'];

    // Insert data into the borrower table
    $sql = "INSERT INTO borrower (username, book_id, phone_number, email, returnbook) 
    VALUES ('$username', '$book_id', '$phone_number', '$email', '$returnbook')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrower Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('1.jpg'); /* Replace '1.jpeg' with your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh; /* Ensures full viewport height */
        }

        .navbar {
            background-color: #3E4E5E;
            padding: 10px;
            text-align: center;
            position: sticky; /* Keeps the navbar fixed at the top */
            top: 0;
            width: 100%;
        }

        .navbar nav ul {
            list-style-type: none;
            padding: 0;
            display: inline-block;
        }

        .navbar nav ul li {
            display: inline;
            margin-right: 20px;
        }

        .navbar nav ul li a {
            color: white;
            text-decoration: none;
        }

        form {
            background-color: #e3f2fd; /* Light blue background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin: 0 auto; /* Centers the form horizontally */
            position: absolute;
            top: 50%; /* Vertically center */
            left: 50%;
            transform: translate(-50%, -50%); /* Adjust for perfect centering */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #42a5f5;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="form.php">Borrower Form</a></li>
            </ul>
        </nav>
    </div>

    <form action="form.php" method="POST">
        <h2>Borrower Information Form</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="book_id">Book ID:</label>
        <input type="text" id="book_id" name="book_id" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="time_date">Time Date:</label>
        <input type="time_date" id="time_date" name="time_date" required>

        <label for="returnbook">Return Date:</label>
        <input type="date" id="returnbook" name="returnbook" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

