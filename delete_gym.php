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

// Check if gym_id is provided in the URL
if (isset($_GET['gym_id'])) {
    $gym_id = $_GET['gym_id'];

    // Delete corresponding package first
    $sqlPackage = "DELETE FROM package WHERE gym_id = '$gym_id'";
    if (mysqli_query($conn, $sqlPackage)) {
        // Package deleted successfully

        // Delete gym
        $sqlGym = "DELETE FROM gym WHERE id = '$gym_id'";
        if (!mysqli_query($conn, $sqlGym)) {
            // Gym deletion failed
            echo "Error deleting gym: " . mysqli_error($conn);
        }
    } else {
        // Package deletion failed
        echo "Error deleting package: " . mysqli_error($conn);
    }
} else {
    // Gym ID not provided in the URL
    echo "Gym ID not provided.";
}

// Close connection
mysqli_close($conn);

// Redirect to a page of your choosing
header("Location: https://zacsonmaster.000webhostapp.com/adminfile/adminViewGym.html");
exit();
?>
