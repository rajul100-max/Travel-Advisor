<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Advisor - Signup Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 900px;
        }
        .info {
            flex: 1;
            text-align: left;
            padding-right: 20px;
        }
        .info img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }
        .info h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 15px;
        }
        .info p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .signup-container {
            flex: 1;
            padding-left: 20px;
        }
        .signup-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .signup-container label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        .signup-container input[type="text"], 
        .signup-container input[type="email"],
        .signup-container input[type="date"],
        .signup-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .signup-container button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .signup-container button:hover {
            background-color: #4cae4c;
        }
        .password-info {
            font-size: 12px;
            color: #888;
            margin-top: -10px;
            margin-bottom: 15px;
        }
        .signup-container p {
            text-align: center;
            margin-top: 20px;
        }
        .signup-container p a {
            color: #5cb85c;
            text-decoration: none;
        }
        .signup-container p a:hover {
            text-decoration: underline;
        }
        .show-password {
            position: absolute;
            right: 20px;
            top: 160px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="info">
            <img src="https://via.placeholder.com/80x80.png?text=✈️" alt="Airplane Logo">
            <h1>Travel Advisor</h1>
            <p>Your go-to platform for planning unforgettable journeys. Explore destinations, book tickets, and make your travel dreams come true. Sign up to start your adventure today!</p>
        </div>
        <div class="signup-container">
            <h2>Signup</h2>
            <form action="signup_process.php" method="POST" onsubmit="return validateSignup()">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
                
                <label for="password">Password:</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Enter a password" required minlength="8">
                    <span id="show-password" class="show-password" onclick="togglePassword()">👁️</span>
                </div>
                <div class="password-info">
                    Password must be at least 8 characters long, include one uppercase letter, and one special character.
                </div>
                
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="http://localhost/login.php">Login here</a></p>
        </div>
    </div>

    <script>
        function validateSignup() {
            const fullname = document.getElementById("fullname").value;
            const username = document.getElementById("username").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

            if (fullname === "" || username === "" || email === "" || password === "") {
                alert("All fields are required.");
                return false;
            }

            if (!passwordPattern.test(password)) {
                alert("Password must be at least 8 characters long, include one uppercase letter, and one special character.");
                return false;
            }

            return true;
        }

        // Function to toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const passwordIcon = document.getElementById("show-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.textContent = "🙈"; // Change icon to 'hide' when visible
            } else {
                passwordField.type = "password";
                passwordIcon.textContent = "👁️"; // Change icon to 'show' when hidden
            }
        }
    </script>

</body>
</html>
