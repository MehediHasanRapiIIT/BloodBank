<?php
session_start();
require "connection.php"; // Include your database connection code

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $newName = $_POST["new_name"];
    $newAge = $_POST["new_age"];
    $newAddress = $_POST["new_address"];
    $newCity = $_POST["new_city"];
    $newPassword = $_POST["new_password"];
    $newBloodGroup = $_POST["new_bgroup"];
    $newEmail = $_POST["new_email"];
    $newMobileNumber = $_POST["new_mobile"];

    // Update the user's profile in the database
    $username = $_SESSION['name']; // Assuming you have the username stored in the session
    $sql = "UPDATE user SET 
            name='$newName', 
            age=$newAge, 
            address='$newAddress', 
            city='$newCity', 
            pass='$newPassword', 
            bgroup='$newBloodGroup', 
            email='$newEmail', 
            mno='$newMobileNumber' 
            WHERE name='$username'";

    if (mysqli_query($conn, $sql)) {
        echo "Profile updated successfully.";
        // Redirect the user to their profile page or another appropriate page
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

// Fetch the user's current profile information for pre-filling the form
$username = $_SESSION['name']; // Assuming you have the username stored in the session
$sql = "SELECT name, age, address, city, pass, bgroup, email, mno FROM user WHERE name='$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Check if there are any rows in the result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentName = $row['name'];
        $currentAge = $row['age'];
        $currentAddress = $row['address'];
        $currentCity = $row['city'];
        $currentPassword = $row['pass'];
        $currentBloodGroup = $row['bgroup'];
        $currentEmail = $row['email'];
        $currentMobileNumber = $row['mno'];
    } else {
        echo "User profile not found.";
    }
} else {
    // Handle query error
    echo "Error fetching user profile: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- ... (your existing head section) ... -->
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
  }

  h1 {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
  }

  form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
  }

  input[type="text"],
  input[type="number"],
  input[type="password"],
  input[type="email"] {
    width: 90%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid black;
    border-radius: 3px;
  }

  input[type="submit"] {
    background-color: #333;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 3px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #555;
  }

  /* Optional: Style for error messages */
  .error {
    color: red;
    margin-top: 5px;
  }
</style>
</head>
<body>
    <h1>Update Your Profile</h1>
    <form method="POST" action="">
        <label for="new_name">Name:</label>
        <input type="text" name="new_name" value="<?php echo $currentName; ?>"><br>

        <label for="new_age">Age:</label>
        <input type="number" name="new_age" value="<?php echo $currentAge; ?>"><br>

        <label for="new_address">Address:</label>
        <input type="text" name="new_address" value="<?php echo $currentAddress; ?>"><br>

        <label for="new_city">City:</label>
        <input type="text" name="new_city" value="<?php echo $currentCity; ?>"><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" value="<?php echo $currentPassword; ?>"><br>

        <label for="new_bgroup">Blood Group:</label>
        <input type="text" name="new_bgroup" value="<?php echo $currentBloodGroup; ?>"><br>

        <label for="new_email">Email:</label>
        <input type="email" name="new_email" value="<?php echo $currentEmail; ?>"><br>

        <label for="new_mobile">Mobile Number:</label>
        <input type="text" name="new_mobile" value="<?php echo $currentMobileNumber; ?>"><br>

        <input type="submit" value="Update Profile">
        <a href="index.php"><input type="submit" value="Cancel"></a>
    </form>
</body>
</html>
