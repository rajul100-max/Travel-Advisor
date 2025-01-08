<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Default password for root in XAMPP
$dbname = "travel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the database connection is established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted, process and insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $bus_name = $_POST['bus_name'];
    $departure_date = $_POST['departure_date'];
    $seat_number = $_POST['seat_number'];
    $total_amount = $_POST['total_amount'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO bus_bookings (full_name, email, phone_number, bus_name, departure_date, seat_number, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $full_name, $email, $phone_number, $bus_name, $departure_date, $seat_number, $total_amount);

    if ($stmt->execute()) {
        echo "<script>alert('Booking successfully completed!'); window.location='bus.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <style>
        /* General page style */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2d7036; /* Green header */
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form-field label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .form-field input, 
        .form-field select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        .form-field input:focus,
        .form-field select:focus {
            border-color: #4CAF50; /* Green color */
        }

        .form-field .error {
            color: #d9534f;
            font-size: 14px;
            margin-top: 5px;
        }

        .submit-btn {
            background-color: #2d7036; /* Green button */
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #226b27; /* Darker green on hover */
        }

        /* Responsive */
        @media only screen and (max-width: 768px) {
            .container {
                width: 80%;
                padding: 20px;
            }

            .submit-btn {
                font-size: 16px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <header>
        Bus Booking Form
    </header>

    <div class="container">
        <h1>Book Your Bus Ticket</h1>
        <form action="bus.php" method="POST" id="busBookingForm">
            
            <div class="form-field">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required pattern="^[A-Za-z\s]+$" title="Full name must only contain letters and spaces.">
                <div class="error" id="full_name_error"></div>
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <div class="error" id="email_error"></div>
            </div>

            <div class="form-field">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" required pattern="^\d{10}$" title="Phone number must contain exactly 10 digits.">
                <div class="error" id="phone_number_error"></div>
            </div>

            <div class="form-field">
                <label for="bus_name">Bus Name</label>
                <select id="bus_name" name="bus_name" required>
                    <option value="Bus 1">Bus 1 - $50</option>
                    <option value="Bus 2">Bus 2 - $60</option>
                    <option value="Bus 3">Bus 3 - $45</option>
                    <option value="Bus 4">Bus 4 - $70</option>
                </select>
                <div class="error" id="bus_name_error"></div>
            </div>

            <div class="form-field">
                <label for="departure_date">Departure Date</label>
                <input type="date" id="departure_date" name="departure_date" required>
                <div class="error" id="departure_date_error"></div>
            </div>

            <div class="form-field">
                <label for="seat_number">Seat Number</label>
                <input type="text" id="seat_number" name="seat_number" required pattern="^[A-Za-z0-9]+$" title="Seat number must contain alphanumeric characters only.">
                <div class="error" id="seat_number_error"></div>
            </div>

            <div class="form-field">
                <label for="total_amount">Total Amount ($)</label>
                <input type="number" id="total_amount" name="total_amount" required readonly>
                <div class="error" id="total_amount_error"></div>
            </div>

            <button type="submit" class="submit-btn">Book Now</button>
        </form>
    </div>

    <script>
        document.getElementById("busBookingForm").addEventListener("submit", function(event){
            let valid = true;

            // Reset errors
            document.querySelectorAll(".error").forEach(function(errorElement){
                errorElement.innerHTML = '';
            });

            // Validate Full Name
            const fullName = document.getElementById("full_name").value.trim();
            const fullNamePattern = /^[A-Za-z\s]+$/;
            if (!fullName) {
                valid = false;
                document.getElementById("full_name_error").innerText = "Full name is required.";
            } else if (!fullNamePattern.test(fullName)) {
                valid = false;
                document.getElementById("full_name_error").innerText = "Full name must only contain letters and spaces.";
            }

            // Validate Email
            const email = document.getElementById("email").value.trim();
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!email || !emailPattern.test(email)) {
                valid = false;
                document.getElementById("email_error").innerText = "Please enter a valid email.";
            }

            // Validate Phone Number
            const phoneNumber = document.getElementById("phone_number").value.trim();
            const phonePattern = /^\d{10}$/;
            if (!phoneNumber) {
                valid = false;
                document.getElementById("phone_number_error").innerText = "Phone number is required.";
            } else if (!phonePattern.test(phoneNumber)) {
                valid = false;
                document.getElementById("phone_number_error").innerText = "Phone number must contain exactly 10 digits.";
            }

            // Validate Bus Name
            const busName = document.getElementById("bus_name").value;
            if (!busName) {
                valid = false;
                document.getElementById("bus_name_error").innerText = "Please select a bus.";
            }

            // Validate Departure Date
            const departureDate = document.getElementById("departure_date").value;
            if (!departureDate) {
                valid = false;
                document.getElementById("departure_date_error").innerText = "Please select a departure date.";
            }

            // Validate Seat Number
            const seatNumber = document.getElementById("seat_number").value.trim();
            const seatPattern = /^[A-Za-z0-9]+$/;
            if (!seatNumber) {
                valid = false;
                document.getElementById("seat_number_error").innerText = "Seat number is required.";
            } else if (!seatPattern.test(seatNumber)) {
                valid = false;
                document.getElementById("seat_number_error").innerText = "Seat number must contain alphanumeric characters only.";
            }

            // Calculate total amount based on selected bus
            const busSelected = document.getElementById("bus_name").value;
            let totalAmount = 0;
            switch (busSelected) {
                case "Bus 1":
                    totalAmount = 50;
                    break;
                case "Bus 2":
                    totalAmount = 60;
                    break;
                case "Bus 3":
                    totalAmount = 45;
                    break;
                case "Bus 4":
                    totalAmount = 70;
                    break;
            }
            document.getElementById("total_amount").value = totalAmount;

            // If validation fails, prevent form submission
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
