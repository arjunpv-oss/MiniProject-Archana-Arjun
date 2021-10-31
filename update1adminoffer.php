<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if (isset($_POST['update1'])) {
    $ID=$_POST['offer_id'];
    $NAME = $_POST['category_name'];
    $PERCENTAGE = $_POST['offer_percentage'];
    $FROM=$_POST['valid_from'];
    $TO = $_POST['valid_to'];
    $CODE=$_POST['coupon_code'];

    $result=mysqli_query($con,"UPDATE offer SET category_name='$NAME',offer_percentage='$PERCENTAGE', valid_from='$FROM',valid_to='$TO',coupon_code='$CODE' WHERE offer_id= '$FROM'");
    if($result) {

        ?>
        <script>
            alert('The Item Has Been updated');
            window.location.href='viewoffer.php?updated';
            header("location:viewoffer.php");
        </script>
        <?php

    }


    else{

        ?>
        <script>
            alert('Error');
            window.location.href='viewoffer.php';
            header("location:viewoffer.php");
        </script>
        <?php


    }
}
?>

