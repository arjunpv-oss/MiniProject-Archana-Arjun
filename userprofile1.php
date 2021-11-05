<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $phonenumber = $_POST['phoneno'];


    $result=mysqli_query($con, "UPDATE register SET First_Name='$firstname', Last_Name='$lastname', Address='$address',Area='$area', Email='$email',Phonenumber='$phonenumber' where id='$id'");
    if($result) {

        ?>
        <script>
            alert('Profile updated');
            window.location.href='userhomepage.php?updated';
            header("location:userhomepage.php");
        </script>
        <?php

    }


    else{

        ?>
        <script>
            alert('Error');
            window.location.href='profile.php';
            header("location:profile.php");
        </script>
        <?php


    }
}
?>

