<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="">
    <style>
        body {
    background-color: #333;
    color: white;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

#Header {
    text-align: center;
    background-color: #333;
    color: white;
    padding: 10px;
}

#Body {
    background-color: rgba(0, 0, 0, 0.715);
    padding: 20px;
    border-radius: 10px;
}

form {
    text-align: left;
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

form input[type="text"],
form input[type="password"],
form textarea,
form select {
    width: 30%;
    padding: 10px;
    margin-bottom: 15px;
    border: none;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: white;
    color: black;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #369;
}

.link {
    text-align: center;
    margin-top: 10px;
}

.link a {
    color: cornflowerblue;
    text-decoration: none;
}

.link a:hover {
    text-decoration: underline;
}

#error {
    color: red;
    text-align: center;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="Header" align="center"><h2>Blood Bank Management System</h2></div>
            <center><div id="Body"
            style="background-color: rgba(0, 0, 0, 0.715);color:white;">
                <br><br>
                <h1 align="center" style="border:5px;color:white;background-color:brown">User Registration</h1>
                <form action="" method="post">
                    <div align="center">
                        <label for="name">Enter Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter name" required><br><br>
                        
                        <label for="age">Enter Age</label>
                        <input type="text" id="age" name="age" placeholder="Enter Age" required><br><br>
                        
                        <label for="address">Enter Address</label>
                        <textarea id="address" name="address" required></textarea><br><br>
                        
                        <label for="city">Enter City</label>
                        <input type="text" id="city" name="city" placeholder="Enter city" required><br><br>
                        
                        <label for="ps">Enter Password</label>
                        <input type="password" id="ps" name="ps" placeholder="Enter Password" required><br><br>
                        
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
                        </select><br><br>
                        
                        <label for="email">Enter E-mail</label>
                        <input type="text" id="email" name="email" placeholder="Enter email" required><br><br>
                        
                        <label for="mno">Enter Mobile No.</label>
                        <input type="text" id="mno" name="mno" placeholder="Enter Number" required><br><br>
                        
                        <input type="submit" name="sub" value="Sign up" style="width:70px; height:40px; border-radius: 5px;color:cornflowerblue;"><br><br>
                    </div>
                </form>
                <?php

if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if the username or email already exists
    $checkQuery = "SELECT * FROM user WHERE name = '$name' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Username or email already exists. Please choose a different username or email.')</script>";
    } else {
        // If username and email are not already in use, proceed with registration
        $age = $_POST['age'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $ps = $_POST['ps'];
        $bgroup = $_POST['bgroup'];
        $mno = $_POST['mno'];

        $sql = "INSERT INTO user (name, age, address, city, pass, bgroup, email, mno)
                VALUES ('$name', '$age', '$address', '$city', '$ps', '$bgroup', '$email', '$mno')";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "<script>alert('User registration successful')</script>";
        } else {
            echo "<script>alert('User registration unsuccessful')</script>";
        }
    }
}
?>
            </div></center>
            <div id="Footer"><h4 align="center">Be the reason for someone’s heartbeat.</h4>
            <p align="center">Already Account?<a href="user-login.php"><font color="white"><input type="submit" value="User"></font></a>
        </div>
        </div>
    </div>
</body>
</html>
