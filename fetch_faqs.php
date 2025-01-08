<?php
require 'db_config.php'; // Include database configuration

$sql = "SELECT * FROM faqs ORDER BY created_at DESC";
$result = $conn->query($sql);

$faqs = [];
while ($row = $result->fetch_assoc()) {
    $faqs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($faqs);

$conn->close();
?>
