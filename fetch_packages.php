<?php
// Database connection
$servername = "localhost";
$username = "id22108902_client8239"; // Your MySQL username
$password = "Client-pass@8239"; // Your MySQL password
$dbname = "id22108902_fitness"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the packages table
$sql = "SELECT * FROM package";
$result = $conn->query($sql);

$packages = array();

// Fetch associative array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }
}

// Close the connection
$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($packages);
?>
