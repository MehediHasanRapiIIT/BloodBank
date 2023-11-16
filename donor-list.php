<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor list</title>
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
            <h1 class="hero-title">Donor List</h1>
        </div>
    </section>
    <div class="container">
        <br>
        <center>
            <div class="table-container">
                <table>
                    <tr>
                        <th><center><b><font size="4">ID</font></b></center></th>
                        <th><center><b><font size="4">Name</font></b></center></th>
                        <th><center><b><font size="4">Father's Name</font></b></center></th>
                        <th><center><b><font size="4">Address</font></b></center></th>
                        <th><center><b><font size="4">City</font></b></center></th>
                        <th><center><b><font size="4">Age</font></b></center></th>
                        <th><center><b><font size="4">Blood Group</font></b></center></th>
                        <th><center><b><font size="4">Mobile No</font></b></center></th>
                        <th><center><b><font size="4">E-Mail</font></b></center></th>
                        <th><center><b><font size="4">Action</font></b></center></th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM `donor_registration`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><center><?php echo $row['id']; ?></center></td>
                        <td><center><?php echo $row['name']; ?></center></td>
                        <td><center><?php echo $row['fname']; ?></center></td>
                        <td><center><?php echo $row['address']; ?></center></td>
                        <td><center><?php echo $row['city']; ?></center></td>
                        <td><center><?php echo $row['age']; ?></center></td>
                        <td><center><?php echo $row['bgroup']; ?></center></td>
                        <td><center><?php echo $row['mno']; ?></center></td>
                        <td><center><?php echo $row['email']; ?></center></td>
                        <td>
                            <button><a href="delete-donor.php?id=<?php echo $row['id']; ?>">Delete</a></button>
                            <button><a href="user-update.php?id=<?php echo $row['id']; ?>">Edit</a></button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </center>
    </div>
    
</body>
</html>
