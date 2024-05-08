<?php
// Database connection
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

// Get form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNO = $_POST['phoneNO'];
$city = $_POST['city'];
$description = $_POST['description'];
$bloodType = $_POST['bloodType'];
$emergencyPhoneNO = $_POST['emergencyPhoneNO'];

// SQL query to insert trainer data into the database
$sql = "INSERT INTO trainer (fname, lname, email, pass, phoneNO, city, bloodType, emergencyPhoneNO, description) 
        VALUES ('$fname', '$lname', '$email', '$password', '$phoneNO', '$city', '$bloodType', '$emergencyPhoneNO', '$description')";

if (mysqli_query($conn, $sql)) {
    // Redirect to a page of your choosing
    header("Location: https://zacsonmaster.000webhostapp.com/adminfile/adminViewTrainer.html");
    exit();
} else {
    // Error adding trainer
    //echo "Error adding trainer: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
