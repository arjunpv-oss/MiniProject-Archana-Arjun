<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $area = $_POST['area'];
    $phonenumber = $_POST['phonenumber'];


    mysqli_query($con, "UPDATE register SET First_Name='$firstname', Last_Name='$lastname', Area='$area', Email='$email',Phonenumber='$phonenumber' where User_Name='$username'");
    header("location:userhomepage.php");


}
?>



