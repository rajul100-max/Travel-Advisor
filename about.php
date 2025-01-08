<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

        /* Main Styles */
        main {
            padding: 30px 15px;
            max-width: 900px;
            margin: auto;
        }

        section {
            margin-bottom: 40px;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.6;
            font-size: 16px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 15px 0;
        }

        .btn-book {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-book:hover {
            background-color: #45a049;
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
        <section>
            <h2>Our Story</h2>
            <p>
                At Travel Advisor, our journey began with the passion to provide exceptional travel experiences. 
                Founded in 2023, we set out with a mission to redefine the travel industry by combining technology, expertise, and a genuine love for exploration. 
                We understand that travel is not just about reaching a destination—it's about the memories you create along the way.
            </p>
            <img src="https://via.placeholder.com/800x400.png?text=Our+Story" alt="Our Story">
        </section>

        <section>
            <h2>What We Offer</h2>
            <p>
                From flight bookings to hotel reservations and transportation services, Travel Advisor is your one-stop shop for all your travel needs. 
                Whether you're planning a solo adventure, a family vacation, or a business trip, we tailor our services to meet your needs.
            </p>
            <p>
                With access to countless destinations, partnerships with trusted service providers, and an experienced team, we ensure your travel experience is seamless, secure, and affordable.
            </p>
            <img src="https://via.placeholder.com/800x400.png?text=What+We+Offer" alt="What We Offer">
        </section>

        <section>
            <h2>Why Choose Us?</h2>
            <p>
                Choosing Travel Advisor means you’ll never travel alone. Our experienced team is dedicated to guiding you through every step, 
                from planning your trip to arriving safely at your destination. We pride ourselves on providing:
            </p>
            <ul>
                <li>Exceptional customer service available 24/7.</li>
                <li>Customized travel packages tailored to your preferences.</li>
                <li>Secure and reliable booking options.</li>
                <li>Competitive pricing without compromising on quality.</li>
            </ul>
            <img src="https://via.placeholder.com/800x400.png?text=Why+Choose+Us" alt="Why Choose Us">
        </section>

        <section>
            <h2>Our Mission</h2>
            <p>
                Our mission is to inspire people to explore the world without limits. We believe that travel is a transformative experience, 
                capable of connecting cultures, broadening horizons, and creating lasting memories. 
            </p>
            <p>
                At Travel Advisor, we are committed to providing innovative and user-friendly travel solutions that cater to everyone, 
                from occasional travelers to seasoned adventurers.
            </p>
            <img src="https://via.placeholder.com/800x400.png?text=Our+Mission" alt="Our Mission">
        </section>

        <section style="text-align: center;">
            <h2>Ready to Plan Your Next Journey?</h2>
            <a href="home.php" class="btn-book">Book Now</a>
        </section>
    </main>
</body>
</html>
