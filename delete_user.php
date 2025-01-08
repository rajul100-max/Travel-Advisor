<?php
// Database connection
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "user_database";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: view_users.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
