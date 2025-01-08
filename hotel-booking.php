<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        header {
            background-color: #28a745;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-field {
            margin-bottom: 15px;
        }
        .form-field label {
            display: block;
            font-weight: bold;
        }
        .form-field input, .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-field input[type="date"] {
            padding: 5px;
        }
        .submit-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Hotel Booking Form</h1>
    </header>

    <div class="container">
        <form action="process-booking.php" method="POST" id="hotelBookingForm">
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
                <!-- Add pattern to restrict to numbers only -->
                <input type="text" id="phone_number" name="phone_number" required pattern="^\d{10}$" title="Phone number must contain exactly 10 digits.">
                <div class="error" id="phone_number_error"></div>
            </div>

            <div class="form-field">
                <label for="hotel_name">Hotel Name</label>
                <select id="hotel_name" name="hotel_name" required>
                    <option value="Serena Hotel">Hotel 1</option>
                    <option value="Marriot Hotel">Hotel 2</option>
                    <option value="Vocco Hotel">Hotel 3</option>
                    <option value="Ramada Hotel">Hotel 4</option>
                </select>
                <div class="error" id="hotel_name_error"></div>
            </div>

            <div class="form-field">
                <label for="room_type">Room Type</label>
                <select id="room_type" name="room_type" required>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Suite">Suite</option>
                </select>
                <div class="error" id="room_type_error"></div>
            </div>

            <div class="form-field">
                <label for="check_in_date">Check-in Date</label>
                <input type="date" id="check_in_date" name="check_in_date" required>
                <div class="error" id="check_in_date_error"></div>
            </div>

            <div class="form-field">
                <label for="check_out_date">Check-out Date</label>
                <input type="date" id="check_out_date" name="check_out_date" required>
                <div class="error" id="check_out_date_error"></div>
            </div>

            <div class="form-field">
                <label for="total_amount">Total Amount ($)</label>
                <input type="number" id="total_amount" name="total_amount" required>
                <div class="error" id="total_amount_error"></div>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("hotelBookingForm").addEventListener("submit", function(event){
            let valid = true;

            
            document.querySelectorAll(".error").forEach(function(errorElement){
                errorElement.innerHTML = '';
            });

            
            const fullName = document.getElementById("full_name").value.trim();
            const fullNamePattern = /^[A-Za-z\s]+$/;
            if (!fullName) {
                valid = false;
                document.getElementById("full_name_error").innerText = "Full name is required.";
            } else if (!fullNamePattern.test(fullName)) {
                valid = false;
                document.getElementById("full_name_error").innerText = "Full name must only contain letters and spaces.";
            }

            
            const email = document.getElementById("email").value.trim();
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!email || !emailPattern.test(email)) {
                valid = false;
                document.getElementById("email_error").innerText = "Please enter a valid email.";
            }

            
            const phoneNumber = document.getElementById("phone_number").value.trim();
            const phonePattern = /^\d{10}$/;
            if (!phoneNumber) {
                valid = false;
                document.getElementById("phone_number_error").innerText = "Phone number is required.";
            } else if (!phonePattern.test(phoneNumber)) {
                valid = false;
                document.getElementById("phone_number_error").innerText = "Phone number must contain exactly 10 digits.";
            }

            
            const hotelName = document.getElementById("hotel_name").value;
            if (!hotelName) {
                valid = false;
                document.getElementById("hotel_name_error").innerText = "Please select a hotel.";
            }

            
            const roomType = document.getElementById("room_type").value;
            if (!roomType) {
                valid = false;
                document.getElementById("room_type_error").innerText = "Please select a room type.";
            }

            
            const checkInDate = document.getElementById("check_in_date").value;
            if (!checkInDate) {
                valid = false;
                document.getElementById("check_in_date_error").innerText = "Please select a check-in date.";
            }

            
            const checkOutDate = document.getElementById("check_out_date").value;
            if (!checkOutDate) {
                valid = false;
                document.getElementById("check_out_date_error").innerText = "Please select a check-out date.";
            } else if (new Date(checkOutDate) <= new Date(checkInDate)) {
                valid = false;
                document.getElementById("check_out_date_error").innerText = "Check-out date must be after check-in date.";
            }

            
            const totalAmount = document.getElementById("total_amount").value.trim();
            if (!totalAmount || isNaN(totalAmount) || totalAmount <= 0) {
                valid = false;
                document.getElementById("total_amount_error").innerText = "Please enter a valid total amount.";
            }

            
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
