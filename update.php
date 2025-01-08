<?php
// update.php

// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "passenger_booking"; // The database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is received via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting the POSTed data
    $id = $_POST['id'];
    $name = $_POST['passenger_name'];  
    $age = $_POST['passenger_age'];    
    $passport = $_POST['passport'];    

    // SQL query to update the passenger details
    $sql = "UPDATE passengers 
            SET name = ?, age = ?, passport = ? 
            WHERE id = ?";

    // Prepare the SQL statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sisi", $name, $age, $passport, $id);

        // Execute the query
        if ($stmt->execute()) {
            echo "Passenger details updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
