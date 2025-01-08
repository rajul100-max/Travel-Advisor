<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Offers</title>

    <style>
        /* General Reset and Body Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light background for the body */
            color: #333;
        }

        /* Header Styling */
        header {
            background-color: #28a745; /* Green Header */
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        /* Main Container */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        /* Page Title */
        .page-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title h1 {
            font-size: 36px;
            color: #333;
        }

        .page-title p {
            font-size: 18px;
            color: #555;
        }

        /* Flight Offers Section */
        .flight-offers {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: space-around;
        }

        /* Airline Card */
        .airline-card {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 220px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .airline-card:hover {
            transform: translateY(-10px);
        }

        /* Airline Logo */
        .airline-logo {
            max-width: 100%;
            height: 100px;
            object-fit: cover;
        }

        /* Heading Style */
        .airline-card h3 {
            margin-top: 15px;
            font-size: 24px;
            color: #4CAF50;
        }

        /* Offer Details */
        .offer-details {
            font-size: 16px;
            color: #777;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        /* Call to Action Button */
        .cta-btn {
            background-color: #28a745; /* Green Button */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .cta-btn:hover {
            background-color: #45a049;
        }

        /* Footer Styling */
        footer {
            background-color: #28a745; /* Green Footer */
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="flights.php">Flight Offers</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">

        <!-- Page Title -->
        <header class="page-title">
            <h1>Flight Offers from our Partner Airlines</h1>
            <p>Find the best flight deals for your next journey.</p>
        </header>

        <!-- Flight Offer List -->
        <div class="flight-offers">
            <!-- Airline #1 -->
            <div class="airline-card">
                <img src="https://via.placeholder.com/200x100?text=Airline+1" alt="Airline 1" class="airline-logo">
                <h3>PIA</h3>
                <p class="offer-details">Book your flight and get up to 20% OFF on international bookings.</p>
                <button class="cta-btn" onclick="window.location.href='GeneratePNR.php?airline=airline1'">Book Now</button>
            </div>

            <!-- Airline #2 -->
            <div class="airline-card">
                <img src="https://via.placeholder.com/200x100?text=Airline+2" alt="Airline 2" class="airline-logo">
                <h3>AirBlue</h3>
                <p class="offer-details">Limited-time offer: 15% OFF on selected domestic routes.</p>
                <button class="cta-btn" onclick="window.location.href='GeneratePNR.php?airline=airline2'">Book Now</button>
            </div>

            <!-- Airline #3 -->
            <div class="airline-card">
                <img src="https://via.placeholder.com/200x100?text=Airline+3" alt="Airline 3" class="airline-logo">
                <h3>Serene Air</h3>
                <p class="offer-details">Exclusive deals: Save 30% on last-minute bookings.</p>
                <button class="cta-btn" onclick="window.location.href='GeneratePNR.php?airline=airline3'">Book Now</button>
            </div>

            <!-- Airline #4 -->
            <div class="airline-card">
                <img src="https://via.placeholder.com/200x100?text=Airline+4" alt="Airline 4" class="airline-logo">
                <h3>FlyJinnah</h3>
                <p class="offer-details">Enjoy 10% OFF for first-time flyers on long-haul flights.</p>
                <button class="cta-btn" onclick="window.location.href='GeneratePNR.php?airline=airline4'">Book Now</button>
            </div>
        </div>

    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Travel Agency. All Rights Reserved.</p>
        <p><a href="privacy-policy.php">Privacy Policy</a> | <a href="terms-of-service.php">Terms of Service</a></p>
    </footer>

</body>
</html>
