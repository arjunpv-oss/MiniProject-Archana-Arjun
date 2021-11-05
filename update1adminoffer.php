<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if (isset($_POST['update1'])) {

    $ID=$_POST['offerid'];
    $PERCENTAGE = $_POST['offer_percentage'];
    $FROM=$_POST['valid_from'];
    $TO = $_POST['valid_to'];
    $CODE=$_POST['coupon_code'];

    $result=mysqli_query($con,"UPDATE offer SET offer_percentage='$PERCENTAGE', valid_from='$FROM',valid_to='$TO',coupon_code='$CODE' WHERE offer_id= '$ID'");

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




















