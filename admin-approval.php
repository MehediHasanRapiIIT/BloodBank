<?php
require "connection.php";

if(isset($_GET['id'])) {
    $requestId = $_GET['id'];

    // Update the request status to "Accepted" in the database
    $updateQuery = "UPDATE request SET status='Accepted' WHERE id=$requestId";
    mysqli_query($conn, $updateQuery);
}

header("Location: requested-list.php"); // Redirect back to the admin page
?>
