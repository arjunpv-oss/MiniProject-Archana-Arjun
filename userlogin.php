<?php
$url="localhost";
$username="root";
$password="";
$conn=mysqli_connect($url,$username,'',"tasteohub");

session_start();
$_SESSION['username'] = "<?php echo {['$username']} ?>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<style>

    body{

        background-image: url("userlogin.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        alignment: center;
    }
</style>
<link rel="stylesheet" type="text/css" href="./userstyle.css">
<body>

<div class="login-form">

    <form method="post" enctype="multipart/form-data">
        <br><br><h2><center>Login</center></h2>
        <p class="hint-text"><center>Enter Login Details</center></p><br><br>
        <div class="form-group">
            <input type="username" class="form-control" name="username" placeholder="username" required="required">
        </div><br>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required="required">
        </div>
        <div class="form-group">
            <center><button type="submit" name="save" class="btn btn-success btn-lg btn-block" style="width: 200px">Login</button></center>
            <?php
            if(isset($_POST['save']))
            {
                $username=$_POST['username'];
                $password=$_POST['password'];
                $usertype="USER";

                $check_user="select * from register WHERE User_Name='$username'AND Password='$password'";

                $run=mysqli_query($conn,$check_user);



                if($data=mysqli_num_rows($run)) {


                   session_start();
                    $_SESSION['username'] = $username;

                    // $_SESSION['user']=$username;//here session is used and value of $user_email store in $_SESSION.
                    header("Location:userhomepage.php");

                }


                else
                {
                    echo "<script>alert('Username or password is incorrect!')</script>";
                    echo "<script>window.open('userlogin.php','_self')</script>";
                }


            }

            ?>
        </div>
        <div class="text-center">Don't have an account? <a href="userregistration.php">Register Here</a></div>
    </form>
</div>
</body>
</html>



























