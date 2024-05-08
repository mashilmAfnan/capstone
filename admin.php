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
   // Prepare and bind the SQL statement
$sql = "SELECT * FROM admin WHERE name = ? AND password = ?";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ss", $name, $pass);

// Set parameters and execute
$name = $_POST["name"];
$pass = $_POST["password"];
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Process the data
       header("Location: https://zacsonmaster.000webhostapp.com/adminfile/adminProfile.html");
exit;
    }
} else {
     header("Location: https://zacsonmaster.000webhostapp.com");
}

}
// Close statement and connection
$stmt->close();
$conn->close();
?>