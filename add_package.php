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

// Insert data into package table
$pkg_name = $_POST['pkg_name'];
$type = $_POST['type'];
$duration = $_POST['duration'];
$pkg_description = $_POST['pkg_description'];
$price = $_POST['price'];
$gym_id = $_POST['gym_id']; // Get the gym ID selected from the dropdown menu

$sql = "INSERT INTO package (name, type, description, duration, price, gym_id) 
        VALUES ('$pkg_name', '$type', '$pkg_description', '$duration', '$price', '$gym_id')";

if (mysqli_query($conn, $sql)) {
    // Redirect to a specified page after successful insertion
    header("Location: https://zacsonmaster.000webhostapp.com/adminfile/adminViewGym.html");
    exit();
} else {
    // Redirect to an error page if package insertion fails
    header("Location: error_page.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
