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
    <title>User Profile</title>

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
        <br><br><h2><center></center></h2>
        <p class="hint-text"><center>Enter password To Authenticate user</center></p><br><br>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="password" required="required">
        </div><br>

        <div class="form-group">
            <center><button type="submit" name="save" class="btn btn-success btn-lg btn-block" style="width: 200px; background-color: green;color: white">Go</button></center></div>
    </form><br><br>


            <?php
            if(isset($_POST['save']))
            {
                $password=$_POST['password'];

                $usertype="USER";

                $check_user="select * from register WHERE Password='$password'";

                $run=mysqli_query($conn,$check_user);



                if($data=mysqli_fetch_array($run)) {

            ?>



                <div class="main" style="margin: 200px;">
                    <form action="userprofile1.php" method="post" enctype="multipart/form-data">

                        Firstname
                        <input type="text" value="<?php echo $data['First_Name']; ?>" name="firstname" required /><br>

                        Lastname
                        <input type="text" value="<?php echo $data['Last_Name']; ?>" name="lastname" required /><br>

                        Username
                        <input type="text" value="<?php echo $data['User_Name']; ?>" name="username" required /><br>



                        Email
                        <input type="text"  value="<?php echo $data['Email']; ?>" name="email" required/><br>


                        Address
                        <input type="text" value="<?php echo $data['Address']; ?>" name="address" required/></textarea><br>

                        Area
                        <input type="text"  value="<?php echo $data['Area']; ?>" name="area" required/><br>

                        Phonenumber
                        <input type="text" value="<?php echo $data['Phonenumber']; ?>" name="phonenumber" required/><br>

                        <center><button type="submit" name="update" class="btn btn-success btn-lg btn-block" style="width: 200px; background-color: green;color: white">Change</button></center></form></div></div>
                </div>
</center>





            <?php
                }


                else
                {
                    echo "<script>alert('Cannot access profile')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }


            }

            ?>
        </div>
    </form>
</div>
</body>
</html>






