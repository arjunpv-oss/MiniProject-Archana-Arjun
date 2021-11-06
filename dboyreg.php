<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = "tasteohub";

$conn=mysqli_connect($host,$user,$pass,$db);
extract($_POST);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
if(isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $phoneno = $_POST['phoneno'];

    $address = $_POST['address'];
    $image = $_POST['image'];
    $usertype = "Delivery boy";
    $status = "Available";

    $date = date('y-m-d');
    $sql = "select * from deliveryboy_registration where (email_id='$email_id')";
    $res = mysqli_query($conn, $sql);




    if (mysqli_num_rows($res)) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if ($email_id == $row['email_id']) {
            $message = "Registration failed...";

            echo "<script type='text/javascript'>alert('Registration failed...\\n Email id already exists');</script>";
        }
    }



     else {
         $sql = "INSERT INTO deliveryboy_registration (d_date,fullname,username,email_id,password,phoneno,status,address,image) VALUES ('$date','$fullname','$username','$email_id','$password','$phoneno','$status','$address','$image')";
         $insert_login = "INSERT INTO login(login_id,username,password,usertype) VALUES('','$username','$password','$usertype')";

         if (mysqli_query($conn, $insert_login))
         {


             echo "<script type='text/javascript'>alert('Registration successful...\\n Delivery boy added');</script>";
             //header("Location: menu.html");

             $sql = mysqli_query($conn, $sql) or die("Could Not Perform the Query");






         } else {
             echo "Error: " . $sql . " " . mysqli_error($conn);
         }
     }
        mysqli_close($conn);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="deliveryreg.css">
</head>
<style>


    .topnav {
        overflow: hidden;
        background-color: green;
    }

    .topnav a {
        float:left;
        color: #f2f2f2;
        text-align: center;
        padding: 16px 20px;
        text-decoration: none;
        font-size: 25px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: orangered;
    }







body{
        background-image: url("registration.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>



<body>
<div class="topnav">
    <a class="active" href="adminhomepage.php">Add Image</a>
    <a href="adminofferpage.php">Offers</a>
    <a href="adminaddslot.php">Add Slot</a>
    <a href="admincardining.php">Car-dining</a>
    <a href="adminoutsidedining.php">Outside-dining</a>
    <a href="addfoodcategory.php">Home-delivery</a>
    <a href="#about">Orders</a>
    <a href="dboyreg.php">Delivery boys</a>
    <a href="#about">Report</a>
    <a href="login.php">Logout</a>
</div>
<div class="registration-form">

   <br><br><br> <br><br><h1>Registration Form</h1>


    <form method="post">
        <p>Full Name:</p>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <p>Username:</p>
        <input type="text" name="username" placeholder="Username" required>
        <p>Email:</p>
        <input type="email" name="email_id" placeholder="Email" required>
        <p>Password:</p>
        <input type="password" name="password" placeholder="Password" minlength="6" maxlength="8" required>
        <p><br>Phone Number </p>
        <!-- html input type=tel for phone number which contain a pattern --><div class="form-group">
            <input type="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" minlength="10" maxlength="10" required="required">
        </div>
        <p>Address:</p>
        <textarea placeholder="Address"    name="address"   cols="51" rows="5"></textarea>
        <div class="container">
            <input type="file" name="image">
        </div>

        <button type="submit" name ="submit" value="submit">Register</button>
    </form>
</div>
</body>
</html>
