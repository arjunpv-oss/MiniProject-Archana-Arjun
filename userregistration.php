<?php

$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,'',"tasteohub");
extract($_POST);
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $phonenumber = $_POST['phonenumber'];
    $pass = $_POST['pass'];
    $cpass =$_POST['cpass'];
    $usertype = "User";

if (strcmp($pass, $cpass) !== 0) {
   echo "Password do not match";

}




    $sql = mysqli_query($conn, "SELECT * FROM register where Email='$email'");
    if (mysqli_num_rows($sql) > 0) {
        echo "User Already Exists";
        exit;
    } else {


        $query = "INSERT INTO register (First_Name, Last_Name,User_Name, Email,Address,Area,Phonenumber, Password ) VALUES ('$first_name', '$last_name', '$user_name', '$email', '$address', '$area', '$phonenumber', '$pass')";

        $insert_login = "INSERT INTO login(login_id,username,password,usertype) VALUES('','$user_name','$pass','$usertype')";
        if (mysqli_query($conn, $insert_login)) {

            $sql = mysqli_query($conn, $query) or die("Could Not Perform the Query");

            header("Location: userlogin.php?status=success");


        } else {
            echo "<script>alert('Erro')</script>";
        }
    }

}

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="signup-form">
    <form action="userregistration.php" method="post" enctype="multipart/form-data">
        <br><h2><center>REGISTER</center></h2>
        <center><p class="hint-text">Create your account</p></center><br>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="username" class="form-control" name="user_name" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="address" class="form-control" name="address" placeholder="Address" required="required">
        </div>
        <div class="form-group">
            <input type="Area" class="form-control" name="area" placeholder="Area" required="required">
        </div>
        <div class="form-group">
            <input type="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" minlength="10" maxlength="10" align="right" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password"  minlength="6"  maxlength="8" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" minlength="6"  maxlength="8" required="required">
        </div>

        <div class="form-group">
            <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="userlogin.php">Sign in</a></div>
    </form>

</div>
</body>
</html>
