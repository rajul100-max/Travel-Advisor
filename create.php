<?php



$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "passenger_booking"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['passenger_name']; 
    $age = $_POST['passenger_age'];   
    $passport = $_POST['passport'];   

   
    $sql = "INSERT INTO passengers (name, age, passport) VALUES (?, ?, ?)";

  
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sis", $name, $age, $passport);  

        
        if ($stmt->execute()) {
            echo "New passenger created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }

    
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
