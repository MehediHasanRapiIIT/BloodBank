<?php
require "connection.php";
session_start();
if (!isset($_SESSION['name'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit(); // Stop further script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donor registration</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="Header" align="center">
                <h2><a href="user-home.php" style="text-decoration:none; color:white;">Blood Bank Management System</a></h2>
            </div><br>
            <div id="Body">
                <br>
                <h1 align="center">Donor Registration</h1>
                <center>
                    <div id="form">
                        <form action="" method="post">
                            <label for="name">Enter Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter name" required>

                            <label for="fname">Enter Father's Name</label>
                            <input type="text" id="fname" name="fname" placeholder="Enter Father's name" required>

                            <label for="address">Enter Address</label>
                            <textarea id="address" name="address" placeholder="Enter address" required></textarea>

                            <label for="city">Enter City</label>
                            <input type="text" id="city" name="city" placeholder="Enter city" required>

                            <label for="age">Enter Age</label>
                            <input type="text" id="age" name="age" placeholder="Enter age" required>

                            <label for="bgroup">Select Blood Group</label>
                            <select id="bgroup" name="bgroup" required>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                            </select>

                            <label for="email">Enter E-mail</label>
                            <input type="text" id="email" name="email" placeholder="Enter email" required>

                            <label for="mno">Enter Mobile No.</label>
                            <input type="text" id="mno" name="mno" placeholder="Enter Number" required><br><br>

                            <input type="submit" name="sub" value="Save">
                        </form>
                        <?php
                            if(isset($_POST['sub'])){

                                $name = $_POST['name'];
                                $fname = $_POST['fname'];
                                $address = $_POST['address'];
                                $city = $_POST['city'];
                                $age = $_POST['age'];
                                $bgroup = $_POST['bgroup'];
                                $email = $_POST['email'];
                                $mno = $_POST['mno'];

                                $sql = "INSERT INTO donor_registration (name, fname, address, city, age, bgroup, email, mno)
                                VALUES ('$name', '$fname', '$address', '$city', '$age', '$bgroup', '$email', '$mno')";

                                $result = $conn->query($sql);
                                if($result===TRUE){
                                    echo "<script>alert('Donor registration successful')</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Donor registration unsuccessful')</script>";
                                }
                            }
                        ?>
                    </div>
                </center>
            </div>
            <div id="Footer">
                <h4 align="center">Be the reason for someone’s heartbeat.</h4>
                <p align="center"><a href="admin-home.php"><font color="white">Back to Home</font></a></p>
            </div>
        </div>
    </div>
</body>
</html>