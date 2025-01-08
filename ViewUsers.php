<?php
// Database connection details
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "user_database";

// Establish connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all users
$sql = "SELECT id, fullname, username, email, dob FROM users";
$result = $conn->query($sql);

// Check if there are results to display
if ($result->num_rows > 0) {
    // Loop through the result set and display each user's information
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["fullname"] . " - Username: " . $row["username"] . " - Email: " . $row["email"] . " - DOB: " . $row["dob"] . "<br>";
    }
} else {
    echo "No users found";
}

// Close the connection
$conn->close();
?>
