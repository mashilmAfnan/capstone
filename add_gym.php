<?php
$db_host = "localhost"; // Change this to your database host
$db_username = "id22108902_client8239"; 
$db_password = "Client-pass@8239"; 
$db_name = "id22108902_fitness"; 

// Attempt to connect to MySQL database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data into gym table
$name = $_POST['name'];
$location = $_POST['location'];
$description = $_POST['description'];
$img = $_FILES['img']['name']; // Get the name of the uploaded image file
$trainers = $_POST['trainers'];

$sqlGym = "INSERT INTO gym (name, location, description, place_img, trainers) 
           VALUES ('$name', '$location', '$description', '$img', '$trainers')";

if (mysqli_query($conn, $sqlGym)) {
    // Redirect to a specified page after successful insertion
    header("Location: https://zacsonmaster.000webhostapp.com/adminfile/adminViewGym.html");
    exit();
} else {
    // Redirect to an error page if gym insertion fails
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
