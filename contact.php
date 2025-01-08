<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
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

        .logout-btn {
            background-color: #d32f2f;
            padding: 8px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #b71c1c;
        }

        /* Main Section Styles */
        main {
            padding: 30px 15px;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Contact Info Section */
        .contact-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            gap: 20px;
        }

        .contact-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .contact-card img {
            max-width: 60px;
            margin-bottom: 10px;
        }

        /* Form Section */
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            display: block;
            width: 100%;
            background: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background: #45a049;
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
            <li><a href="login.php" class="logout-btn">Logout</a></li>
        </ul>
    </header>

    <main>
        <h2>Contact Us</h2>

        <!-- Contact Info Section -->
        <div class="contact-info">
            <div class="contact-card">
                <img src="https://via.placeholder.com/60x60.png?text=Phone" alt="Phone">
                <h3>Call Us</h3>
                <p>+92 123 456 7890</p>
            </div>
            <div class="contact-card">
                <img src="https://via.placeholder.com/60x60.png?text=Email" alt="Email">
                <h3>Email</h3>
                <p>support@traveladvisor.com</p>
            </div>
            <div class="contact-card">
                <img src="https://via.placeholder.com/60x60.png?text=Location" alt="Location">
                <h3>Visit Us</h3>
                <p>Main Street, Islamabad, Pakistan</p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <form action="submit_contact.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </main>
</body>
</html>
