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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style>
        
    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="Header" align="center">
                <h2><a href="index.php" style="text-decoration:none; color:white;">Blood Bank Management System</a></h2>
            </div>
            <div id="Body">
                <br>
                <h1>Request Form</h1>
                
                    <div id="form">
                        <form action="" method="post">
                            <label for="name">Enter Your Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name" required>

                            <label for="pname">Enter Patient Name</label>
                            <input type="text" id="pname" name="pname" placeholder="Enter patient name" required>

                            <label for="disease">Disease</label>
                            <textarea id="disease" name="dis" placeholder="Enter disease" required></textarea>

                            <label for="city">Enter City</label>
                            <input type="text" id="city" name="city" placeholder="Enter city" required>

                            <label for="age">Enter Patient Age</label>
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
                            <input type="text" id="mno" name="mno" placeholder="Enter mobile number" required><br><br>

                            <input type="submit" name="sub" value="Send">
                        </form>
                        <?php
                        // PHP code for processing form submission
                        if(isset($_POST['sub'])){
                            // Retrieve form data
                            $name = $_POST['name'];
                            $pname = $_POST['pname'];
                            $disease = $_POST['dis'];
                            $city = $_POST['city'];
                            $age = $_POST['age'];
                            $bgroup = $_POST['bgroup'];
                            $email = $_POST['email'];
                            $mno = $_POST['mno'];

                            // SQL query to insert data into the database
                            $sql = "INSERT INTO request (name, pname, disease, city, age, bgroup, email, mno)
                            VALUES ('$name', '$pname', '$disease', '$city', '$age', '$bgroup', '$email', '$mno')";

                            // Execute the SQL query
                            $result = $conn->query($sql);

                            // Check if the query was successful
                            if($result === TRUE){
                                echo "<script>alert('Request sent successfully')</script>";
                            }
                            else {
                                echo "<script>alert('Request sending failed')</script>";
                            }
                        }
                        ?>
                    </div>
                
            </div>
            <div id="Footer">
                <h4 align="center">Be the reason for someone’s heartbeat.</h4>
                <p align="center"><a href="index.php" text-decoration="none"><font color="white">Back to Home</font></a></p>
            </div>
        </div>
    </div>
</body>
</html>
