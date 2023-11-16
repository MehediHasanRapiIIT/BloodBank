<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donors by Blood Group</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #00796B;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        label {
            font-weight: bold;
        }
        select, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        select {
            width: 200px;
        }
        button {
            background-color: #00796B;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #005450;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Donors by Blood Group <t><t><t><t><t><t><button><a style="text-decoration:none" href="index.php">Home</a></button></t></t></t></t></t></t></h1>
        
        <form method="post">
            <label for="searchBloodGroup">Select Blood Group:</label>
            <select id="searchBloodGroup" name="searchBloodGroup" required>
                <option value="" disabled selected>Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <button type="submit" name="search">Search</button>
        </form>
        
        <?php
        session_start();
        if (!isset($_SESSION['name'])) {
            // Redirect the user to the login page
            header("Location: login.php");
            exit(); // Stop further script execution
        }
        
        if (isset($_POST['search'])) {
            require "connection.php"; // Include your database connection


            $searchBloodGroup = $_POST['searchBloodGroup'];
            $sql = "SELECT name, city, mno, bgroup FROM donor_registration WHERE bgroup = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $searchBloodGroup);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<h2>Donors with Blood Group $searchBloodGroup:</h2>";
                echo "<table>";
                echo "<tr><th>Name</th><th>City</th><th>Mobile Number</th><th>Blood Group</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td>{$row['mno']}</td>";
                    echo "<td>{$row['bgroup']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No donors found with blood group $searchBloodGroup.</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
