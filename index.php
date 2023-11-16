<?php
require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Blood Bank Home</title>
<link rel="stylesheet" type="text/css" href="style3.css">
<style>
        table{
            border: 1px solid black;
            border-collapse: separate;
            border-spacing: 0px;
        }
        td{
            width: 200px;
            height: 40px;
        }
        #form{
            max-height: 300px;
            overflow-y: scroll;
            margin: 20px;
        }
        th{
            position:sticky;
            top:0px;
            background-color: teal;
            color:wheat;
        }
        th,td{
            border: 1px solid black;
        }
        .donor-info-container {
            display: flex; /* Use flexbox to arrange divs in a row */
            flex-wrap: wrap; /* Allow divs to wrap to the next row if needed */
            justify-content: space-between; /* Space divs evenly along the row */
            background-color: gray;
        }

        .donor-info {
            width: calc(33.33% - 20px); /* Adjust the width based on your layout */
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: hsla(122, 91%, 62%, 0.397);
            box-shadow: 2px 2px 5px #888888;
            border-radius: 10px;
        }

        .donor-info h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .donor-info p {
            font-size: 16px;
            margin: 5px 0;
        }

        /* Style for the message when no donor information is available */
        .no-info {
            text-align: center;
            font-size: 18px;
            margin: 20px;
            color: #777;
        }
        #user-menu {
            font-weight: bold;
            font-size: 18px;
            color: #007BFF; /* Change the color to your preference */
            cursor: pointer;
}
        
    </style>

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
                    <li><a href="admin.php" class="active">Admin</a></li>
                    <li><a href="request-list.php" class="active">Request List</a></li>
                    <?php
        // Check if the user is logged in
        if (isset($_SESSION['name'])) {
            echo '<li id ="user-menu">';
            echo '<select onchange="handleProfileActions(this.value)">';
            echo '<option value="">'. $_SESSION['name'] . '</option>';
            echo '<a href="update-profile.php"><option value="update-profile">Update Profile</option></a>';
            echo ',<a href="logout.php"><option value="logout">Logout</option></a>';
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
        // Redirect to the update profile page (e.g., update-profile.php)
        window.location.href = 'update-profile.php';
        } else if (action === 'logout') {
        // Redirect to the logout script (e.g., logout.php)
        window.location.href = 'logout.php';
    }
}
</script>
    <section class="hero">
        <div class="container">
            <h1 class="hero-title"><b>Blood Stock Information</b></h1>
        </div>
    </section>
<div class="container">
    <br>
  <center>
    <table>
                        <tr>
                            <th><center><b><font size="4">Name</font></b></center></th>
                            <th><center><b><font size="4">Quantity</font></b></center></th>
                        </tr>
                        <tr>
                            <td><center>O+</center></td>
                            <td><center>
                                <?php
                                $bgroup="O+";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="O-";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="AB+";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="AB-";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="A+";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="A-";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="B+";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
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
                                $bgroup="B-";
                                $sql = "SELECT COUNT(*) as count FROM donor_registration WHERE bgroup='$bgroup'";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $row_count = $row['count'];
                                echo "$row_count";
                                ?>
                            </center></td>
                            
                        </tr>

                    </table></center>
</div><br>
<section class="hero">
        <div class="container">
            <h1 class="hero-title"><b>Some Donor information</b></h1>
        </div>
</section>
<?php
    // Fetch donor information from the database
    $sql = "SELECT name, email, mno, bgroup FROM donor_registration";
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows in the result
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="donor-info-container">'; // Open the container div
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="donor-info">
                <h3>Name: <?php echo $row['name']; ?></h3>
                <p>Email: <?php echo $row['email']; ?></p>
                <p>Phone Number: <?php echo $row['mno']; ?></p>
                <p>Blood Group: <?php echo $row['bgroup']; ?></p>
            </div>

            <?php
        }
        echo '</div>'; // Close the container div
    } else {
        echo '<div class="no-info"><p>No donor information available</p></div>';
    }
    ?>

</body>
</html>
