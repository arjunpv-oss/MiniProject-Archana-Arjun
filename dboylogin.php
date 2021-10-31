<?php
session_start();


$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Could not connect to mysql: ' . mysql_error());
}


if(isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = "Delivery boy";
    $check_user = "select * from deliveryboy_registration WHERE username='$username'AND password='$password'";
    $run = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($run)) {
        echo "<script>window.open('userhomepage.php','_self')</script>";
    }

    else {
        echo "<script>alert('Username or password is incorrect!')</script>";


    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Deliveryboy login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<link rel="stylesheet" type="text/css" href="./userstyle.css">

<body>
<div class="signup-form">
    <form method="post" enctype="multipart/form-data">
       <br><br><br><br><br><br><h2><center>Delivery boy Login</center></h2><br><br>
        <center><p class="hint-text">Enter Login Details</p></center>
        <div class="form-group">
            <input type="username" class="form-control" name="username" placeholder="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Login</button>
        </div>

    </form>
</div>
</body>
</html>
