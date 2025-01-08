<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Booking</title>
    <style>
        /* Basic styling */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5; }
        .container { width: 60%; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .form-group { margin-bottom: 10px; }
        .form-group label { font-weight: bold; display: block; color: #333; }
        .form-group input { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px; margin-top: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        button:disabled { background-color: #ddd; cursor: not-allowed; }
        hr { border: 0; border-top: 1px solid #ccc; margin: 30px 0; }

        .passenger-item {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .passenger-item div {
            display: flex;
            gap: 15px; /* Space between buttons */
            justify-content: flex-start;
        }
        .passenger-item span {
            font-size: 14px;
            color: #555;
        }
        .passenger-item h4 {
            margin-top: 0;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create New Passenger</h2>
    <form id="passengerForm" method="POST" action="create.php">
        <div class="form-group">
            <label for="passenger_name">Name:</label>
            <input type="text" id="passenger_name" name="passenger_name" required placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="passenger_age">Age:</label>
            <input type="number" id="passenger_age" name="passenger_age" required placeholder="Enter Age">
        </div>
        <div class="form-group">
            <label for="passport">Passport Number:</label>
            <input type="text" id="passport" name="passport" required placeholder="Enter Passport Number">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<hr>

<div class="container passenger-list">
    <h2>Passenger List</h2>
    <div id="dataContainer"></div> <!-- Passenger records will appear here -->
</div>

<script>
    // Function to fetch passengers
    function fetchPassengers() {
        fetch('read.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('dataContainer').innerHTML = data;
            });
    }

    // Function to handle updating a passenger's details
    function updatePassenger(id) {
        const updatedName = prompt("Enter the updated passenger name:");
        const updatedAge = prompt("Enter the updated passenger age:");
        const updatedPassport = prompt("Enter the updated passport number:");

        if (updatedName && updatedAge && updatedPassport) {
            fetch('update.php', {
                method: 'POST',
                body: new URLSearchParams({
                    id: id,
                    passenger_name: updatedName,
                    passenger_age: updatedAge,
                    passport: updatedPassport
                })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                fetchPassengers();
            });
        }
    }

    // Function to handle deleting a passenger
    function deletePassenger(id) {
        if (confirm("Are you sure you want to delete this passenger?")) {
            fetch('delete.php?id=' + id)
            .then(response => response.text())
            .then(data => {
                alert(data);
                fetchPassengers();
            });
        }
    }

    // Load the passenger list initially
    fetchPassengers();
</script>

</body>
</html>
