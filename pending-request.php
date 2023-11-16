<?php
require "connection.php";

if(isset($_GET['id'])) {
    $requestId = $_GET['id'];

    // Update the request status to "Pending" in the database
    $updateQuery = "UPDATE request SET status='Pending' WHERE id=$requestId";
    mysqli_query($conn, $updateQuery);
}

header("Location: request-list.php"); // Redirect back to the user page
?>
