<?php
$servername = "localhost"; // Change this to your database host name
$username = "id22108902_client8239"; // Change this to your database username
$password = "Client-pass@8239"; // Change this to your database password
$dbname = "id22108902_fitness"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "<script>alert('Your message here');</script>";
    die("Connection failed: " . $conn->connect_error);
} else {
    // Prepare and bind the SQL statement to fetch the hashed password
    $sql = "SELECT pass FROM user WHERE fname = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $name);

    // Set parameters and execute
    $name = $_POST["fn"];
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the hashed password
        if (password_verify($_POST['pass'], $row['pass'])) {
            // Password is correct, redirect to index page
            header("Location: https://zacsonmaster.000webhostapp.com/pages/index.html");
            exit;
        } else {
            // Password is incorrect, redirect to login page
            header("Location: https://zacsonmaster.000webhostapp.com");
            exit;
        }
    } else {
         // No user found, redirect to login page
         header("Location: https://zacsonmaster.000webhostapp.com");
         exit;
    }
}
// Close statement and connection
$stmt->close();
$conn->close();
?>
