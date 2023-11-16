<?php
require "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Blood List</title>
    <link rel="stylesheet" type="text/css" href="styless.css">
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
            <h1 class="hero-title">Stock Blood List</h1>
        </div>
    </section>
    <div class="container">
        <br>
        <center>
            <div class="table-container">
                <table>
                    <tr>
                        <th><center><b><font size="4">Name</font></b></center></th>
                        <th><center><b><font size="4">Quantity</font></b></center></th>
                    </tr>
                    <tr>
                        <td><center>O+</center></td>
                        <td><center>
                            <?php
                            $bgroup = "O+";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>O-</center></td>
                        <td><center>
                            <?php
                            $bgroup = "O-";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>A+</center></td>
                        <td><center>
                            <?php
                            $bgroup = "A+";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>A-</center></td>
                        <td><center>
                            <?php
                            $bgroup = "A-";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>B+</center></td>
                        <td><center>
                            <?php
                            $bgroup = "B+";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>B-</center></td>
                        <td><center>
                            <?php
                            $bgroup = "B-";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>AB+</center></td>
                        <td><center>
                            <?php
                            $bgroup = "AB+";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>AB-</center></td>
                        <td><center>
                            <?php
                            $bgroup = "AB-";
                            $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $row_count = $row['count'];
                            echo "$row_count";
                            ?>
                        </center></td>
                    </tr>
                    <!-- Add more blood groups here following the same format -->
                </table>
            </div>
        </center>
    </div>
    
</body>
</html>
