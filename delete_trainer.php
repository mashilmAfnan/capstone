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

// Check if the trainer ID is provided
if (isset($_GET['trainer_id'])) {
    // Sanitize the input to prevent SQL injection
    $trainer_id = mysqli_real_escape_string($conn, $_GET['trainer_id']);

    // SQL query to delete the trainer
    $sql = "DELETE FROM trainer WHERE id = '$trainer_id'";

    if (mysqli_query($conn, $sql)) {
        // Trainer deleted successfully
        echo "Trainer deleted successfully";
    } else {
        // Error deleting trainer
        echo "Error deleting trainer: " . mysqli_error($conn);
    }
} else {
    // Trainer ID not provided
    echo "Trainer ID not provided";
}

// Close the database connection
mysqli_close($conn);
?>
