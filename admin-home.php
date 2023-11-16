<?php
require "connection.php";
session_start();
// Count the total number of blood requests
$sql = "SELECT COUNT(*) as totalRequests FROM `request`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalRequests = $row['totalRequests'];

$sqlUsers = "SELECT COUNT(*) as totalUsers FROM `user`";
$resultUsers = mysqli_query($conn, $sqlUsers);
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['totalUsers'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="styless.css">
    <style>
    .contain {
        align-items: center;
        text-align: center;
        background-color: #f0f0f0;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background: url("blood.jpg");
        background-size: 80%;
        background-position: -80px -150px;
        height: 100%; /* Increase the height to 80% */

    }

    .contain p {
        font-size: 200%;
        color: white;
        background-color: black;
        padding: 10px;
        border-radius: 5px;
        width: 20%;
        height: 20%;
    }
</style>
    
</head>
<body>
<header class="header">
        <div class="container">
            <h1 class="logo">Blood Bank Management System</h1><br>
            <nav class="nav">
                <ul>
                    <li><a href="admin-home.php" class="active">Home</a></li>
                    <li><a href="donor-red.php" class="active">Donor Registration</a></li>
                    <li><a href="user-list.php" class="active">User List</a></li>
                    <li><a href="stock-blood-list.php" class="active">Stock Blood List</a></li>
                    <li><a href="donor-list.php" class="active">Donor List</a></li>
                    <li><a href="Requested-list.php" class="active">Requested Blood List</a></li>
                    
                    <li><a href="logout.php" class="active">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <h1 class="hero-title"><b>Welcome Admin</b></h1>
        </div>
    </section>
    
    <div class="contain">
    <br>
    <center>
        <p>Total Blood Requests: <?php echo $totalRequests; ?></p><br><br><br><br>
        <p>Total Users: <?php echo $totalUsers; ?></p><br><br><br><br>
        <!-- Your other content here -->
    </center>
</div>
<footer class='footer'>
        <h4>Be the reason for someone's heartbeat</h4>
</footer>
</body>
</html>
