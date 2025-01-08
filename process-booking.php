<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_bookings";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $hotel_name = $_POST['hotel_name'];
    $room_type = $_POST['room_type'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $total_amount = $_POST['total_amount'];

    // Insert data into hotel_bookings table
    $sql = "INSERT INTO hotel_bookings (full_name, email, phone_number, hotel_name, room_type, check_in_date, check_out_date, total_amount)
            VALUES ('$full_name', '$email', '$phone_number', '$hotel_name', '$room_type', '$check_in_date', '$check_out_date', '$total_amount')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking Successful!');window.location.href='hotel-booking.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
