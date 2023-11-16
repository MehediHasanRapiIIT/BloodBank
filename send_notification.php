<?php
require "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $requestId = $_GET["id"];

    // Retrieve user email associated with the request from your database
    $sql = "SELECT email FROM `request` WHERE id = $requestId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userEmail = $row['email'];

    if ($userEmail) {
        // Send an email notification
        $subject = "Blood Request Accepted";
        $message = "Your blood request has been accepted. Thank you for your contribution.";
        $headers = 'From: mehedihasan81007@gmail.com' . "\r\n" .
                   'Reply-To: mehedihasan81007@gmail.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($userEmail, $subject, $message, $headers)) {
            // Update the status in the database to mark it as accepted
            $updateSql = "UPDATE `request` SET status = 'Accepted' WHERE id = $requestId";
            mysqli_query($conn, $updateSql);

            // Redirect back to the admin panel or show a success message
            header("Location: admin_panel.php?success=1");
            exit();
        } else {
            echo "Email could not be sent.";
        }
    } else {
        echo "User email not found.";
    }
}
?>
