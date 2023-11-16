<?php
require "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Request list</title>
    <link rel="stylesheet" type="text/css" href="styless.css">
    <style>
        table{
            border: 1px solid white;
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
            position: sticky;
            top:0px;
            background-color: teal;
            color:wheat;
        }
        th,td{
            border: 1px solid white;
        }
        
    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="Header" align="center"><h2><a href="user-home.php" style="text-decoration:none; color:white;">Blood Bank Management System</a></h2></div><br>
            <div id="Body">
                <br>
                <h1 align="center" style="border:5px;color:white;background-color:brown">Request List</h1>
                <center><div id="form">
                    <table>
                        <tr>
                        <th><center><b><font size="4">ID</font></b></center></th>
                            <th><center><b><font size="4">Name</font></b></center></th>
                            <th><center><b><font size="4">Patient Name</font></b></center></th>
                            <th><center><b><font size="4">Disease</font></b></center></th>
                            <th><center><b><font size="4">City</font></b></center></th>
                            <th><center><b><font size="4">Age</font></b></center></th>
                            <th><center><b><font size="4">Blood Group</font></b></center></th>
                            <th><center><b><font size="4">Mobile No</font></b></center></th>
                            <th><center><b><font size="4">E-Mail</font></b></center></th>
                            <th><center><b><font size="4">Status</font></b></center></th>

                        </tr>
                        <?php
                        $sql = "SELECT * FROM `request`";
                        $result = mysqli_query($conn,$sql);
                        ?>
                        <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>
                            <td><center><?php echo $row['id'];?></center></td>
                            <td><center><?php echo $row['name'];?></center></td>
                            <td><center><?php echo $row['pname'];?></center></td>
                            <td><center><?php echo $row['disease'];?></center></td>
                            <td><center><?php echo $row['city'];?></center></td>
                            <td><center><?php echo $row['age'];?></center></td>
                            <td><center><?php echo $row['bgroup'];?></center></td>
                            <td><center><?php echo $row['mno'];?></center></td>
                            <td><center><?php echo $row['email'];?></center></td>
                            <td>
                            <button><a href="pending-request.php"><center><?php echo $row['status'];?></center></a></button>
                            </td>
                        </tr>

                            <?php
                                }
                            ?>
                    </table>
                   
                </div></center>
                
                
            </div>
            <div id="Footer"><h4 align="center">Be the reason for someone’s heartbeat.</h4>
            <p align="center"><a href="index.php"><font color="white"><input type="submit" value="Back to home"></font></a>
        </div>
        </div>
    </div>
</body>
</html>
