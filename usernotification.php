

<html>
<head>

    <link rel="stylesheet" >
    <title>user notification</title>







</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
    }
</style>
<body style="background-color: palegoldenrod">


<p align="left"><a href="userhomepage.php">Go Back</a></p>


</body>
</html>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Could not connect to mysql: ' . mysqli_error());
}

$result = mysqli_query($conn, "SELECT Phonenumber from register WHERE User_Name='" . $_GET['name'] . "'");
$row = mysqli_fetch_array($result);
$ph=$row['Phonenumber'];

$data="Select id,status from basket where status='Order taken' and contact_number='$ph'";
$result= mysqli_query($conn,$data);

while($row=mysqli_fetch_array($result)){
?>


<tr style="background: #0a5275">
    <td>Your Order number <?php echo $row["id"]; ?> has been changed to status</td>
    <td><?php echo $row["status"]; ?> </td>
</tr>


    <?php


    }


    ?>

