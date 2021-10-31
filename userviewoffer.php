<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>userviewoffer</title>
    <style>


        body{
            background-image: url("useroffer.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body style="alignment: center">
<br><br>
<p align="left"><a href="userhomepage.php">Go Back</a></p>
<center><p style="color: #0c0b09;font-size: 30px;alignment: center" ><b>Offers</center></b><br><br>



<table class='table table-bordered table-striped' align="center">

    <?php

    $data="SELECT * FROM offer";


    $result= mysqli_query($conn,$data);

    while($row=mysqli_fetch_array($result)){
        ?>
        <tr>

            <td><?php echo $row["category_name"]; ?></td><td></td>
            <td><?php echo $row["offer_percentage"]; ?></td><td></td>
            <td><td><?php echo $row["valid_from"]; ?></td><td></td>
            <td><td><?php echo $row["valid_to"]; ?></td><td></td>
            <td><td><?php echo $row["coupon_code"]; ?></td><td></td>

                <br><br><br>



        </tr>
        <?php
    }
    ?>
</table>


</body>
</html>