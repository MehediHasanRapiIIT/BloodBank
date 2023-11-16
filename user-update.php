<?php
require "connection.php";
session_start();
if (!isset($_SESSION['name'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

// Check if the ID parameter is set in the URL
if (!isset($_GET['id'])) {
    header("Location: user-donor-list.php");
    exit();
}

$id = $_GET['id'];

// Fetch donor information from the database
$sql = "SELECT * FROM `donor_registration` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Handle form submission for updating donor information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $bgroup = $_POST['bgroup'];
    $mno = $_POST['mno'];
    $email = $_POST['email'];

    $updateSql = "UPDATE `donor_registration` SET 
                  `name` = '$name', `fname` = '$fname', `address` = '$address', `city` = '$city', 
                  `age` = '$age', `bgroup` = '$bgroup', `mno` = '$mno', `email` = '$email' 
                  WHERE `id` = $id";

    if (mysqli_query($conn, $updateSql)) {
        // Redirect back to the donor list page after successful update
        header("Location: user-donor-list.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Donor Information</title>
    <link rel="stylesheet" type="text/css" href="update.css">
    <style>
        /* Add your CSS styles for the update form here */
        /* You can use the existing CSS classes or add new ones */
        /* Customize the styling to your preferences */
    </style>
</head>
<body>
<header class="header">
<center><div class="container"><h1 class="logo">Blood Bank Management System</h1></div></center>

    <!-- Your header content here -->
</header>
<section class="hero">
    <!-- Your hero section content here -->
</section>
<br>
<center>
    <div class="form-container">
        <h2>Update Donor Information</h2>
        <form method="post" action="">
            <label for="name" style=" text-align: left; margin-left: 20px;" >Name:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>

            <label for="fname" style=" text-align: left; margin-left: 20px;">Father's Name:</label>
            <input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br>

            <label for="address" style=" text-align: left; margin-left: 20px;">Address:</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>

            <label for="city" style=" text-align: left; margin-left: 20px;">City:</label>
            <input type="text" name="city" value="<?php echo $row['city']; ?>"><br>

            <label for="age" style=" text-align: left; margin-left: 20px;">Age:</label>
            <input type="text" name="age" value="<?php echo $row['age']; ?>"><br>

            <label for="bgroup" style=" text-align: left; margin-left: 20px;">Blood Group:</label>
            <input type="text" name="bgroup" value="<?php echo $row['bgroup']; ?>"><br>

            <label for="mno" style=" text-align: left; margin-left: 20px;">Mobile No:</label>
            <input type="text" name="mno" value="<?php echo $row['mno']; ?>"><br>

            <label for="email" style=" text-align: left; margin-left: 20px;">E-Mail:</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>

            <input type="submit" value="Update">
        </form>
    </div>
</center>
</body>
</html>
