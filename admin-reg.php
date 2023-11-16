<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="style1.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <center><h2><b><font color="black">Blood Bank Management System</font></b></h2></center>
        </header>
        <form action="" method="post">
            <h2><font background-color="black">Registration</font></h2>
            <div class="form-group">
                <label for="name"><b>Name</b></label>
                <input type="text" id="name" name="name" placeholder="Enter Full Name">
            </div><br>
            <div class="form-group">
                <label for="email"><b>Email Address</b></label>
                <input type="email" id="email" name="email" placeholder="Enter Email Address">
            </div><br>
            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input type="password" id="password" name="password" placeholder="Enter Password">
            </div>
            <input type="submit" name="sub" value="Register" class="btn">
        </form>
        <?php
        if(isset($_POST['sub'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $sql = "INSERT INTO admin (uname, email, pass)
            VALUES ('$name','$email', '$pass')";

            $result = $conn->query($sql);
            if($result===TRUE){
               echo "<script>alert('Donor registration successfull')</script>";
            }
            else
            {
                echo "<script>alert('Donor registration unsuccessfull')</script>";
            }

        }
        ?>
        <div class="link">
            Already have an account? <a href="admin.php">Log in</a>
        </div>
        <div class="link">
            <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
