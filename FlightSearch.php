<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            color: #0275d8;
            text-align: center;
            margin-bottom: 20px;
        }

        .filter-container {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
        }

        .filter-container input, .filter-container select, .filter-container button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .flight-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .flight-card:hover {
            transform: scale(1.02);
        }

        .flight-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .flight-details {
            font-size: 0.9em;
            color: #666;
        }

        .flight-title {
            font-weight: bold;
            font-size: 1.1em;
            color: #333;
        }

        .flight-price {
            font-size: 1.3em;
            font-weight: bold;
            color: #ff5722;
        }

        .book-button {
            background-color: #0275d8;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 0.9em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .book-button:hover {
            background-color: #0256a5;
        }

        .time-info {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Travel Advisor Flight Search</h2>    
        <div class="filter-container">
            <input type="text" id="departureCity" placeholder="Departure City">
            <input type="text" id="arrivalCity" placeholder="Arrival City">
            <input type="number" id="maxPrice" placeholder="Max Price ($)">
            <button onclick="filterFlights()">Search</button>
        </div>

        <div id="flightsContainer">
            <!-- Flight cards go here -->
        </div>
    </div>

    <script>
        // Hardcoded flight data
        const flights = [
            { id: 1, title: "PK301 - Lahore to Karachi", departure: "Lahore", arrival: "Karachi", price: 120, details: "Pakistan Airlines | Duration: 2h 30m | Non-stop" },
            { id: 2, title: "EK501 - Islamabad to Dubai", departure: "Islamabad", arrival: "Dubai", price: 400, details: "Emirates | Duration: 3h | Non-stop" },
            { id: 3, title: "QR502 - Karachi to Doha", departure: "Karachi", arrival: "Doha", price: 350, details: "Qatar Airways | Duration: 2h 30m | Non-stop" },
            { id: 4, title: "TK304 - Lahore to Istanbul", departure: "Lahore", arrival: "Istanbul", price: 450, details: "Turkish Airlines | Duration: 4h | Non-stop" },
            { id: 5, title: "BA202 - Karachi to London", departure: "Karachi", arrival: "London", price: 600, details: "British Airways | Duration: 6h | Non-stop" },
            { id: 6, title: "SQ305 - Islamabad to Singapore", departure: "Islamabad", arrival: "Singapore", price: 700, details: "Singapore Airlines | Duration: 8h | Non-stop" },
            { id: 7, title: "SV300 - Islamabad to Jeddah", departure: "Islamabad", arrival: "Jeddah", price: 300, details: "Saudi Airlines | Duration: 4h | Non-stop" },
            { id: 8, title: "AA410 - New York to Los Angeles", departure: "New York", arrival: "Los Angeles", price: 320, details: "American Airlines | Duration: 6h 30m | Non-stop" },
            { id: 9, title: "AF202 - Paris to Madrid", departure: "Paris", arrival: "Madrid", price: 250, details: "Air France | Duration: 2h 10m | Non-stop" },
            { id: 10, title: "LH232 - Frankfurt to Tokyo", departure: "Frankfurt", arrival: "Tokyo", price: 950, details: "Lufthansa | Duration: 11h 50m | Non-stop" },
            { id: 11, title: "JU314 - Belgrade to Vienna", departure: "Belgrade", arrival: "Vienna", price: 180, details: "Air Serbia | Duration: 1h 45m | Non-stop" },
            { id: 12, title: "KL115 - Amsterdam to Rio de Janeiro", departure: "Amsterdam", arrival: "Rio de Janeiro", price: 800, details: "KLM | Duration: 13h | Non-stop" },
            { id: 13, title: "QF385 - Sydney to Auckland", departure: "Sydney", arrival: "Auckland", price: 520, details: "Qantas | Duration: 3h | Non-stop" },
            { id: 14, title: "VA314 - Melbourne to Wellington", departure: "Melbourne", arrival: "Wellington", price: 380, details: "Virgin Australia | Duration: 3h 30m | Non-stop" },
            { id: 15, title: "CX806 - Hong Kong to Beijing", departure: "Hong Kong", arrival: "Beijing", price: 400, details: "Cathay Pacific | Duration: 4h 30m | Non-stop" }
        ];

        // Function to display the flight cards on the page
        function displayFlights(filteredFlights) {
            const container = document.getElementById("flightsContainer");
            container.innerHTML = "";

            filteredFlights.forEach(flight => {
                const card = document.createElement("div");
                card.className = "flight-card";
                card.innerHTML = `
                    <div class="flight-info">
                        <div class="flight-title">${flight.title}</div>
                        <div class="time-info">Departure: ${flight.departure} | Arrival: ${flight.arrival}</div>
                        <div class="flight-details">${flight.details}</div>
                        <div class="flight-price">$${flight.price}</div>
                    </div>
                    <button class="book-button" onclick="window.location.href='http://localhost/generatePNR.php'">Book Now</button>
                `;
                container.appendChild(card);
            });
        }

        // Function to filter flights based on user input
        function filterFlights() {
            const departureCity = document.getElementById("departureCity").value.toLowerCase();
            const arrivalCity = document.getElementById("arrivalCity").value.toLowerCase();
            const maxPrice = document.getElementById("maxPrice").value;

            const filteredFlights = flights.filter(flight => {
                return (
                    (!departureCity || flight.departure.toLowerCase().includes(departureCity)) &&
                    (!arrivalCity || flight.arrival.toLowerCase().includes(arrivalCity)) &&
                    (!maxPrice || flight.price <= maxPrice)
                );
            });

            displayFlights(filteredFlights);
        }

        // Display all flights initially
        displayFlights(flights);
    </script>
</body>
</html>
