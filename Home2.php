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

        /* Call-to-Action Section */
        .cta-section {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 20px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        /* Question Form */
        .question-form {
            padding: 40px 20px;
            margin: 20px auto;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question-form h3 {
            color: #4CAF50;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .question-form input[type="text"],
        .question-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .question-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .question-form input[type="submit"]:hover {
            background-color: #45a049;
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
    </style>
</head>
<body>

    <header>
        <h1>Travel Advisor</h1>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="login.php" class="logout-btn">Logout</a></li>
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

    <!-- FAQ Section -->
    <section class="faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(1)">
                <span>What is Travel Advisor?</span>
                <span>&#x25BC;</span>
            </div>
            <div class="faq-answer" id="answer-1">
                <p>Travel Advisor is a platform to plan your travels with information on flights, hotels, buses, and more!</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(2)">
                <span>How do I book a flight?</span>
                <span>&#x25BC;</span>
            </div>
            <div class="faq-answer" id="answer-2">
                <p>Visit the Flights section, select destination and dates, and proceed to book!</p>
            </div>
        </div>
    </section>

    <!-- Question Form -->
    <section class="question-form">
        <h3>Ask a Question</h3>
        <form action="index1.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="question" placeholder="Type your question here..." rows="4" required></textarea>
            <input type="submit" value="Submit Question">
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Travel Advisor. All rights reserved.</p>
    </footer>

    <script>
        function toggleAnswer(answerId) {
            var answer = document.getElementById("answer-" + answerId);
            var arrow = answer.previousElementSibling.querySelector("span:last-child");
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
