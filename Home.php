<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Advisor</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f4f7f9;
        }

        /* Header Styles */
        header {
            background: linear-gradient(90deg, #4CAF50, #2E7D32);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #d4f1d4;
        }

        .btn {
            padding: 8px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .logout-btn {
            background-color: #d32f2f;
        }

        .logout-btn:hover {
            background-color: #b71c1c;
        }

        .agent-btn, .users-btn, .bus-btn {
            background-color: #1E88E5;
        }

        .agent-btn:hover, .users-btn:hover, .bus-btn:hover {
            background-color: #1565C0;
        }

        /* Call-to-Action Section */
        .cta-section {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 20px;
            padding: 0 20px;
        }

        .cta {
            text-align: center;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 30%;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cta:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .cta img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .cta h2 {
            margin: 15px 0 0;
            color: #4CAF50;
            font-size: 18px;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        footer a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Search Section */
        .search-section {
            background-color: #ffffff;
            padding: 40px 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .search-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            background-color: #e0e0e0;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .tab.active {
            background-color: #4CAF50;
            color: white;
        }

        .search-form {
            display: none;
        }

        .search-form.active {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .form-field {
            flex: 1 1 calc(33.33% - 20px);
            min-width: 200px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* FAQ Section */
        .faq-section {
            padding: 40px 20px;
            margin: 20px auto;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .faq-title {
            text-align: center;
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .faq-item {
            margin-bottom: 10px;
        }

        .faq-question {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            text-align: left;
            transition: background-color 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question:hover {
            background-color: #45a049;
        }

        .faq-answer {
            background-color: #f9f9f9;
            padding: 15px;
            font-size: 16px;
            display: none;
            border-radius: 5px;
            margin-top: 10px;
            border-left: 4px solid #4CAF50;
        }

        /* FAQ Button */
        .faq-btn {
            display: inline-block;
            background-color: #1E88E5;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .faq-btn:hover {
            background-color: #1565C0;
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

    <header>
        <h1>Travel Advisor</h1>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="login.php" class="logout-btn btn">Logout</a></li>
            <li><a href="index.php" class="agent-btn btn">PNR Management</a></li>
            <li><a href="view_users.php" class="users-btn btn">Users Management</a></li>
            <li><a href="display_bookings.php" class="bus-btn btn">Bus Bookings</a></li>
        </ul>
    </header>

    <section class="cta-section">
        <a href="flights.php" class="cta">
            <img src="https://via.placeholder.com/300x150.png?text=Airplane" alt="Flights">
            <h2>Flights</h2>
        </a>
        <a href="hotels.php" class="cta">
            <img src="https://via.placeholder.com/300x150.png?text=Building" alt="Hotels">
            <h2>Hotels</h2>
        </a>
        <a href="bus.php" class="cta">
            <img src="https://via.placeholder.com/300x150.png?text=Bus" alt="Buses">
            <h2>Buses</h2>
        </a>
    </section>

    <section class="search-section">
        <div class="search-tabs">
            <div class="tab active" onclick="openTab('oneway')">One-Way</div>
            <div class="tab" onclick="openTab('roundtrip')">Round-Trip</div>
        </div>

        <div class="search-form active" id="oneway">
            <form action="flightsearch.php" method="GET">
                <div class="form-field">
                    <label>From:</label>
                    <input type="text" name="from" placeholder="Enter Origin">
                </div>
                <div class="form-field">
                    <label>To:</label>
                    <input type="text" name="to" placeholder="Enter Destination">
                </div>
                <div class="form-field">
                    <label>Departure Date:</label>
                    <input type="date" name="departure_date">
                </div>
                <div class="form-field" style="flex-basis: 100%; text-align: center;">
                    <input type="submit" value="See Flights">
                </div>
            </form>
        </div>

        <div class="search-form" id="roundtrip">
            <form action="flightsearch.php" method="GET">
                <div class="form-field">
                    <label>From:</label>
                    <input type="text" name="from" placeholder="Enter Origin">
                </div>
                <div class="form-field">
                    <label>To:</label>
                    <input type="text" name="to" placeholder="Enter Destination">
                </div>
                <div class="form-field">
                    <label>Departure Date:</label>
                    <input type="date" name="departure_date">
                </div>
                <div class="form-field">
                    <label>Return Date:</label>
                    <input type="date" name="return_date">
                </div>
                <div class="form-field" style="flex-basis: 100%; text-align: center;">
                    <input type="submit" value="See Flights">
                </div>
            </form>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(1)">
                <span>What is Travel Advisor?</span>
                <span>&#x25BC;</span>
            </div>
            <div class="faq-answer" id="answer-1">
                <p>Travel Advisor is a platform that provides users with resources to plan their travels, including information on flights, hotels, buses, and more!</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(2)">
                <span>How do I book a flight?</span>
                <span>&#x25BC;</span>
            </div>
            <div class="faq-answer" id="answer-2">
                <p>To book a flight, go to our "Flights" section, select the destination, dates, and search for available flights. Then, you can proceed with booking.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(3)">
                <span>Can I book hotels here?</span>
                <span>&#x25BC;</span>
            </div>
            <div class="faq-answer" id="answer-3">
                <p>Yes, we have a section dedicated to hotel bookings. Browse available hotels based on your travel destination and book your stay through our platform.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(4)">
                <span>What should I do if I have issues with my booking?</span>
                <span>&#x25BC;</span>
            </div>
            <div class="faq-answer" id="answer-4">
                <p>If you have any issues with your booking, please contact our support team. You can find the contact information in the "Contact Us" section.</p>
            </div>
        </div>

    </section>

    <!-- FAQ Button -->
    <div style="text-align: center; margin: 20px;">
        <a href="index1.php" class="faq-btn">FAQ</a>
    </div>

    <footer>
        <p>&copy; 2025 Travel Advisor. All rights reserved.</p>
    </footer>

    <script>
        // Search Tab Toggle
        function openTab(tabName) {
            document.querySelectorAll('.search-form').forEach(function (tab) {
                tab.classList.remove('active');
            });
            document.getElementById(tabName).classList.add('active');

            document.querySelectorAll('.tab').forEach(function (tab) {
                tab.classList.remove('active');
            });
            document.querySelector(`.tab[onclick="openTab('${tabName}')"]`).classList.add('active');
        }

        // FAQ Toggle Function
        function toggleAnswer(answerId) {
            var answer = document.getElementById("answer-" + answerId);
            var arrow = document.querySelector(".faq-item:nth-child(" + answerId + ") .faq-question span");
            if (answer.style.display === "block") {
                answer.style.display = "none";
                arrow.innerHTML = "&#x25BC;";
            } else {
                answer.style.display = "block";
                arrow.innerHTML = "&#x25B2;";
            }
        }
    </script>

</body>
</html>
