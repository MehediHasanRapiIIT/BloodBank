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
    <title>Donor List</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<header class="header">
        <div class="container">
            <h1 class="logo">Blood Bank Management System</h1><br>
            <nav class="nav">
                <ul>
                <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="donor-reg.php" class="active">Donor Registration</a></li>
                    <li><a href="request.php" class="active">Blood Request</a></li>
                    <li><a href="about.php" class="active">About us</a></li>
                    <li><a href="search.php" class="active">Search</a></li>
                    <li><a href="user-donor-list.php" class="active">Donor List</a></li>
                    <li><a href="request-list.php" class="active">Request List</a></li>
                    <?php
        // Check if the user is logged in
        if (isset($_SESSION['name'])) {
            echo '<li id ="user-menu">';
            echo '<select onchange="handleProfileActions(this.value)">';
            echo '<option value="">'. $_SESSION['name'] . '</option>';
            echo '<option value="update-profile">Update Profile</option>';
            echo ',<option value="logout">Logout</option>';
            echo '</select>';
            echo '</li>';
        } else {
            echo '<li><a href="login.php" class="active">Login</a></li>';
        }
        ?>
                </ul>
            </nav>
        </div>
    </header>
    <script>
    function handleProfileActions(action) {
        if (action === 'update-profile') {
        
        window.location.href = 'update-profile.php';
        } else if (action === 'logout') {
        window.location.href = 'logout.php';
    }
}
</script>
    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Donor List</h1>
        </div>
    </section>
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
                        
                    </tr>
                    <?php
                    $sql = "SELECT * FROM `donor_registration`";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                        <td><center><?php echo $row['id'];?></center></td>
                        <td><center><?php echo $row['name'];?></center></td>
                        <td><center><?php echo $row['fname'];?></center></td>
                        <td><center><?php echo $row['address'];?></center></td>
                        <td><center><?php echo $row['city'];?></center></td>
                        <td><center><?php echo $row['age'];?></center></td>
                        <td><center><?php echo $row['bgroup'];?></center></td>
                        <td><center><?php echo $row['mno'];?></center></td>
                        <td><center><?php echo $row['email'];?></center></td>
                       
                    </tr>

                        <?php
                            }
                        ?>
                </table>
            </div>
        </center>
    
</body>
</html>
