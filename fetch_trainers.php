<?php
// Database connection parameters
$db_host = "localhost";
$db_username = "id22108902_client8239";
$db_password = "Client-pass@8239";
$db_name = "id22108902_fitness";

// Attempt to connect to the database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch trainer data
$sql = "SELECT * FROM trainer";

// Execute the query
$result = mysqli_query($conn, $sql);

$trainers = array();

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Fetch each row as an associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $trainers[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);

// Return trainer data as JSON
header('Content-Type: application/json');
echo json_encode($trainers);
?>
