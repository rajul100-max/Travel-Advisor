<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Offers</title>

    <style>
        /* General Reset and Body Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* White background for body */
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

        /* Hotel Offers Section */
        .hotel-offers {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: space-around;
        }

        /* Hotel Card */
        .hotel-card {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 220px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .hotel-card:hover {
            transform: translateY(-10px);
        }

        /* Hotel Image */
        .hotel-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        /* Hotel Name */
        .hotel-card h3 {
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
            <a href="hotels.php">Hotel Offers</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">

        <!-- Page Title -->
        <header class="page-title">
            <h1>Hotel Offers from Top Hotels</h1>
            <p>Find the best hotel deals for your next stay.</p>
        </header>

        <!-- Hotel Offer List -->
        <div class="hotel-offers">
            <!-- Hotel #1 -->
            <div class="hotel-card">
                <img src="https://via.placeholder.com/200x150?text=Hotel+1" alt="Hotel 1" class="hotel-image">
                <h3>Serena Hotel</h3>
                <p class="offer-details">Get 15% OFF when you book for 3+ nights.</p>
                <button class="cta-btn" onclick="window.location.href='hotel-booking.php?hotel=hotel1'">Book Now</button>
            </div>

            <!-- Hotel #2 -->
            <div class="hotel-card">
                <img src="https://via.placeholder.com/200x150?text=Hotel+2" alt="Hotel 2" class="hotel-image">
                <h3>Marriot Hotel</h3>
                <p class="offer-details">Special offer: 20% OFF on weekend bookings.</p>
                <button class="cta-btn" onclick="window.location.href='hotel-booking.php?hotel=hotel2'">Book Now</button>
            </div>

            <!-- Hotel #3 -->
            <div class="hotel-card">
                <img src="https://via.placeholder.com/200x150?text=Hotel+3" alt="Hotel 3" class="hotel-image">
                <h3>Vocco Hotel</h3>
                <p class="offer-details">Book now and save 10% on selected rooms.</p>
                <button class="cta-btn" onclick="window.location.href='hotel-booking.php?hotel=hotel3'">Book Now</button>
            </div>

            <!-- Hotel #4 -->
            <div class="hotel-card">
                <img src="https://via.placeholder.com/200x150?text=Hotel+4" alt="Hotel 4" class="hotel-image">
                <h3>Ramada Hotel</h3>
                <p class="offer-details">Exclusive offer: Book 5 nights and get 1 night free!</p>
                <button class="cta-btn" onclick="window.location.href='hotel-booking.php?hotel=hotel4'">Book Now</button>
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
