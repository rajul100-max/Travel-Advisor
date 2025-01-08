<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Booking Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        header a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
            margin: auto;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
        }

        .button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .button:hover:not(:disabled) {
            background-color: #45a049;
        }

        .pnr-container {
            display: none;
            text-align: center;
            margin-top: 20px;
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }

        .pnr-container a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background-color: #5cb85c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .pnr-container a:hover {
            background-color: #4cae4c;
        }

        .guidelines {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .guidelines ul {
            padding-left: 20px;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <a href="Home.php">Home</a>
    </header>

    <div class="container">
        <h2>Passenger Booking Form</h2>
        <form id="bookingForm" action="save_booking.php" method="POST" onsubmit="return validateForm()">
            <div class="passenger-section" id="passengerSection">
                <div class="form-group">
                    <label>Passenger Name</label>
                    <input type="text" name="passenger_name[]" required placeholder="Enter Passenger Name" pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces">
                </div>
                <div class="form-group">
                    <label>Passenger Age</label>
                    <input type="number" name="passenger_age[]" required placeholder="Enter Age" min="1" title="Age should be a number">
                </div>
                <div class="form-group">
                    <label>Passport Number/CNIC(For Domestic)</label>
                    <input type="text" name="passport[]" required placeholder="Enter Passport Number/CNIC">
                </div>
            </div>
            <input type="hidden" id="pnrInput" name="pnr" value="">
            <div class="button-group">
                <button type="button" class="button" id="addPassengerButton" onclick="addPassenger()">Add Passenger</button>
                <button type="submit" class="button">Submit</button>
            </div>
        </form>

        <div class="pnr-container" id="pnrContainer">
            <p>Your PNR is: <span id="pnrNumber"></span></p>
            <a href="#" id="viewItineraryLink" target="_blank">View Itinerary</a>
        </div>

        <div class="guidelines">
            <h3>Booking Guidelines</h3>
            <ul>
                <li>Ensure that all passenger details are accurate before submission.</li>
                <li>Each passenger must have a valid passport number.</li>
                <li>Passengers under the age of 18 must be accompanied by an adult.</li>
                <li>Make sure to review your itinerary after generating the PNR.</li>
            </ul>
        </div>
    </div>

    <footer>
        &copy; 2025 Passenger Booking System. All Rights Reserved.
    </footer>

    <script>
        // JavaScript functions (unchanged from your original code)
        function addPassenger() {
            const passengerSection = document.getElementById("passengerSection");
            const newPassenger = document.createElement("div");

            newPassenger.innerHTML = `
                <hr>
                <div class="form-group">
                    <label>Passenger Name</label>
                    <input type="text" name="passenger_name[]" required placeholder="Enter Passenger Name" pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces">
                </div>
                <div class="form-group">
                    <label>Passenger Age</label>
                    <input type="number" name="passenger_age[]" required placeholder="Enter Age" min="1" title="Age should be a number">
                </div>
                <div class="form-group">
                    <label>Passport Number</label>
                    <input type="text" name="passport[]" required placeholder="Enter Passport Number">
                </div>
            `;
            passengerSection.appendChild(newPassenger);
        }

        function validateForm() {
            const form = document.getElementById("bookingForm");
            const passengerNames = form.querySelectorAll('input[name="passenger_name[]"]');
            const passengerAges = form.querySelectorAll('input[name="passenger_age[]"]');

            for (let i = 0; i < passengerNames.length; i++) {
                const nameValue = passengerNames[i].value;
                if (!/^[A-Za-z\s]+$/.test(nameValue)) {
                    alert("Passenger Name should only contain letters and spaces.");
                    passengerNames[i].focus();
                    return false;
                }
            }

            for (let i = 0; i < passengerAges.length; i++) {
                const ageValue = passengerAges[i].value;
                if (isNaN(ageValue) || ageValue < 1) {
                    alert("Passenger Age should be a valid number greater than 0.");
                    passengerAges[i].focus();
                    return false;
                }
            }

            return true;
        }

        function generatePNR() {
            const pnr = 'PNR-' + Math.random().toString(36).substr(2, 9).toUpperCase();
            document.getElementById("pnrNumber").innerText = pnr;
            document.getElementById("pnrInput").value = pnr;
            const viewItineraryLink = document.getElementById("viewItineraryLink");
            viewItineraryLink.href = "http://localhost/view-itinerary.php?pnr=" + encodeURIComponent(pnr);
            document.getElementById("pnrContainer").style.display = 'block';
            document.getElementById("addPassengerButton").disabled = true;
        }
    </script>
</body>
</html>
