<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="style1.css" rel="stylesheet">
</head>
<body>
   
    <div class="container">
    <header>
   <center><h2><b><font color="black">Blood Bank Management System</font></b></h2></center>
   </header>
        <form action="" method="post">
        <h2><font background-color="black">Admin Login</font></h2>
            <div class="form-group">
                <label for="un"><b>Enter Admin Name</b></label>
                <input type="text" id="un" name="un" placeholder="Enter Admin Name">
            </div><br>
            <div class="form-group">
                <label for="ps"><b>Enter Password</b></label>
                <input type="password" id="ps" name="ps" placeholder="Password">
            </div>
            <input type="submit" name="sub" value="Log in" class="btn">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $un = $_POST['un'];
            $ps = $_POST['ps'];

            $sql = "SELECT * FROM admin WHERE uname='$un' AND pass='$ps'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION['un']=$un;
                header("Location: admin-home.php");
            } else {
                echo "<div class='error'>Wrong User</div>";
            }
        }
        ?>
        <div class="link">
        <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
