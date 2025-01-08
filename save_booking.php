<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passenger_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate PNR
$pnr = 'PNR-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));

// Prepare and insert passenger data
$stmt = $conn->prepare("INSERT INTO passengers (pnr, name, age, passport) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $pnr, $name, $age, $passport);

foreach ($_POST['passenger_name'] as $index => $name) {
    $age = $_POST['passenger_age'][$index];
    $passport = $_POST['passport'][$index];
    $stmt->execute();
}

$stmt->close();
$conn->close();

// Debug PNR generation
echo "PNR generated: $pnr";

// Redirect with the PNR
header("Location: http://localhost/view-itinerary.php?pnr=" . urlencode($pnr));
exit();
?>
