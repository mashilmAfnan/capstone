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

// Check if the package ID is provided via GET request
if(isset($_GET['package_id'])) {
    $package_id = $_GET['package_id'];

    // Prepare a SQL query to delete the package
    $sql = "DELETE FROM package WHERE id = $package_id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Package deleted successfully
        echo "Package deleted successfully";
    } else {
        // Failed to delete package
        echo "Error deleting package: " . mysqli_error($conn);
    }
} else {
    // Package ID not provided
    echo "Package ID not provided";
}

// Close the database connection
mysqli_close($conn);
?>
