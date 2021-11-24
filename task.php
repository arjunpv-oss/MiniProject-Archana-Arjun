
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Update offer</title>
    <link rel="stylesheet" href="foodstyle.css">


</head>


<?php

$con = mysqli_connect("localhost","root","","tasteohub");


if ($_GET['op']=="task")
{

    $d_id=$_GET['did'];
    $id=$_GET['num'];

    $record = "INSERT INTO dboytask(name,id)VALUES('$d_id','$id')";




    if (mysqli_query($con, $record)) {
        $message = "successful...";

        echo "<script type='text/javascript'>alert('successful.../Task Assigned');
window.location.href='adminvieworder.php';</script>";

    }


}
?>
