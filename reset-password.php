<?php
include "connection.php";
session_start();


if (!isset($_SESSION['reset_token']) || !isset($_SESSION['reset_email'])) {
    header("Location: user-login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Check if the passwords match
    if ($newPassword === $confirmPassword) {
        $email = $_SESSION['reset_email'];
        
        
        // Update the user's password in the database
        $sql = "UPDATE user SET pass = '$newPassword' WHERE email = '$email'";
        $conn->query($sql);

        // Clear the session variables
        unset($_SESSION['reset_token']);
        unset($_SESSION['reset_email']);
        
        echo "<script>alert('Password changed successful')</script>";
    } else {
        echo "<script>alert('Password don't match')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="style1.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <center><h2><b><font color="black">Blood Bank Management System</font></b></h2></center>
        </header>
        <form action="" method="post">
            <h2><font background-color="black">Reset Password</font></h2>
            <div class="form-group">
                <label for="new_password"><b>Enter New Password</b></label>
                <input type="password" id="new_password" name="new_password" placeholder="Enter New Password">
            </div><br>
            <div class="form-group">
                <label for="confirm_password"><b>Retype Password</b></label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Retype Password">
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
