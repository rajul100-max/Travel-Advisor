<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passenger_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the PNR from the URL
if (isset($_GET['pnr'])) {
    $pnr = $_GET['pnr'];

    // Fetch passenger details from the database
    $stmt = $conn->prepare("SELECT name, age, passport FROM passengers WHERE pnr = ?");
    $stmt->bind_param("s", $pnr);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if records exist
    if ($result->num_rows > 0) {
        $passengers = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Invalid PNR or no records found.";
        exit();
    }

    $stmt->close();
} else {
    echo "PNR not provided.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itinerary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Header styles */
        header {
            background-color: #5cb85c;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: white;
            margin: 0;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 20px;
        }

        /* Main content */
        h3 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #5cb85c;
            color: white;
        }

        .pnr-info {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Header with Home Page link and Travel Advisor heading -->
    <header>
        <h1>Travel Advisor</h1>
        <a href="home.php">Home</a>
    </header>

    <h3>Congratulations! Your PNR is Generated</h3>
    <h3>Your Itinerary</h3>
    <div class="pnr-info">
        <p><strong>PNR:</strong> <?php echo htmlspecialchars($pnr); ?></p>
    </div>
    <table>
        <tr>
            <th>Passenger Names</th>
            <th>Passenger Age</th>
            <th>Passport/CNIC</th>
        </tr>
        <?php foreach ($passengers as $passenger): ?>
            <tr>
                <td><?php echo htmlspecialchars($passenger['name']); ?></td>
                <td><?php echo htmlspecialchars($passenger['age']); ?></td>
                <td><?php echo htmlspecialchars($passenger['passport']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
