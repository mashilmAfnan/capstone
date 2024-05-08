<?php
$db_host = "localhost"; // Change this to your database host
$db_username = "id22108902_client8239"; // Change this to your database username
$db_password = "Client-pass@8239"; // Change this to your database password
$db_name = "id22108902_fitness"; // Change this to your database name

// Attempt to connect to MySQL database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    // Get email, new password, and confirm password from form submission
    $email = $_POST['email'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password === $confirm_password) {
        // Check if the email exists in the database
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Update the user's password in the database
            $update_sql = "UPDATE user SET pass = ? WHERE email = ?";
            $update_stmt = mysqli_prepare($conn, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "ss", $new_password, $email);
            mysqli_stmt_execute($update_stmt);

            // Password updated successfully, redirect to a specific page
            // Redirect page code
            header("Location: https://zacsonmaster.000webhostapp.com/index.html");
            exit; // Ensure that subsequent code is not executed after redirection
        } else {
            // Email not found in our records, no need for echo
        }

        // Close statement
        mysqli_stmt_close($stmt);
        // Close update statement if set
        if(isset($update_stmt)) {
            mysqli_stmt_close($update_stmt);
        }
    }
}

// Close connection
mysqli_close($conn);
?>
