<?php


$con = mysqli_connect("localhost","root","","tasteohub");



if ($_GET['op']=="delivered")
{

    $name=$_GET['name'];
    $id=$_GET['id'];


    $result=mysqli_query($con,"UPDATE basket SET status='delivered' WHERE id = '$id'");




}
?>