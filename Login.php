<?php
// Start the session
session_start();

// Database connection details
$host = "localhost";
$db_name = "user_database";
$username = "root";
$password = "";

// Create a connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error); // Log connection error
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Log input for debugging
    error_log("User Input - Username: $user, Email: $email, Password: $password");

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $user, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching user is found
    if ($result->num_rows === 1) {
        error_log("User found in database.");

        $row = $result->fetch_assoc();
        error_log("Password from DB: " . $row['password']); // Log stored password hash

        // Verify the password
        if (password_verify($password, $row['password'])) {
            error_log("Password verification successful.");

            // Store user information in the session
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);

            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            error_log("Incorrect password entered.");
            echo "<script>alert('Welcome to Travel Advisor.'); window.location.href='home.php';</script>";
        }
    } else {
        error_log("No matching user found with given credentials.");
        echo "<script>alert('User not found. Please check your credentials or Register for your account.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        .login-container input[type="text"], 
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #4cae4c;
        }
        .login-container p {
            text-align: center;
            margin-top: 20px;
        }
        .login-container p a {
            color: #5cb85c;
            text-decoration: none;
        }
        .login-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>

</body>
</html>
