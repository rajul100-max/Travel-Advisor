<?php
include 'db.php';

$sql = "SELECT * FROM passengers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p>ID: " . $row['id'] . "</p>";
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>PNR: " . $row['pnr'] . "</p>";
        echo "<p>Age: " . $row['age'] . "</p>";
        echo "<p>Passport: " . $row['passport'] . "</p>";
        echo "<button onclick='updatePassenger(" . $row['id'] . ")'>Update</button>";
        echo "<button onclick='deletePassenger(" . $row['id'] . ")'>Delete</button>";
        echo "</div><hr>";
    }
} else {
    echo "No records found.";
}
?>
