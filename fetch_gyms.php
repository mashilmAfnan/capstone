<?php
$db_host = "localhost"; // Change this to your database host
$db_username = "id22108902_client8239"; // Change this to your database username
$db_password = "Client-pass@8239"; // Change this to your database password
$db_name = "id22108902_fitness"; // Change this to your database name

// Attempt to connect to MySQL database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch gym data from the database
$sql = "SELECT id, name, location, place_img, description, trainers FROM gym";
$result = mysqli_query($conn, $sql);

$gyms = array();

if (mysqli_num_rows($result) > 0) {
    // Fetch each row as an associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $gyms[] = $row;
    }
}

// Close connection
mysqli_close($conn);

// Return gym data as JSON
header('Content-Type: application/json');
echo json_encode($gyms);
?>
