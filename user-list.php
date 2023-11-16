<?php
require "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
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
            <?php
            $un = $_SESSION['un'];
            if(!$un){
                header("Location:index.php");
            }
            ?>
            <h1 class="hero-title">User List</h1>
        </div>
    </section>

    <section class="user-list">
        <div class="container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Age</th>
                            <th>Blood Group</th>
                            <th>Mobile No</th>
                            <th>E-Mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id, name, age, address, city, bgroup, email, mno FROM `user`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td>{$row['city']}</td>";
                            echo "<td>{$row['age']}</td>";
                            echo "<td>{$row['bgroup']}</td>";
                            echo "<td>{$row['mno']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>";
                            echo "<button><a href='delete-user.php?id={$row['id']}'>Delete</a></button>";
                            echo "<button><a href='edit-user.php?id={$row['id']}'>Edit</a></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    
</body>
</html>
