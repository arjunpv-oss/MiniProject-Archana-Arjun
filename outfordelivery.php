<?php


$con = mysqli_connect("localhost","root","","tasteohub");



if ($_GET['op']=="out")
{

    $name=$_GET['name'];
    $id=$_GET['id'];


    $result=mysqli_query($con,"UPDATE basket SET status='out for delivery' WHERE id = '$id'");




}
?>