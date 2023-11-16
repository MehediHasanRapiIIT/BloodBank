<?php
require "connection.php"; // Include your database connection script

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Create a DELETE query to delete the row with the provided ID
    $sql = "DELETE FROM `donor_registration` WHERE `id` = $id";

    if(mysqli_query($conn, $sql)) {
        // Row deleted successfully, redirect back to the requested-list.php
        header("location: donor-list.php");
        exit(); // Exit to prevent further execution
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
} else {
    echo "Invalid ID provided.";
}

mysqli_close($conn);
?>
