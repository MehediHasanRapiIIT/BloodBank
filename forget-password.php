<?php
include "connection.php";
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the email exists in the user table
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a unique token (e.g., a random string)
        $token = bin2hex(random_bytes(16));

        // Store the token, email, and timestamp in the session
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_email'] = $email;

        // Redirect to the "Reset Password" page
        header("Location: reset-password.php");
        exit();
    } else {
        echo "Email not found in our records.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="style1.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <center><h2><b><font color="black">Blood Bank Management System</font></b></h2></center>
        </header>
        <form action="" method="post">
            <h2><font background-color="black">Forgot Password</font></h2>
            <div class="form-group">
                <label for="email"><b>Enter Your Email</b></label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email">
            </div><br>
            <input type="submit" name="submit" value="Reset Password" class="btn">
        </form>
        <div class="link">
            <a href="user-login.php">Back to Login</a>
        </div>
        <div class="link">
            <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
