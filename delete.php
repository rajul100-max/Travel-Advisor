<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM passengers WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Passenger deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
