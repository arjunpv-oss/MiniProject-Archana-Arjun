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
        width: 1700px;
        height: :40px;
        border-bottom: 10px;

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




    .topnav ul
    {
        display: inline-flex;
        list-style: none;
        color: #fff;



    }
    .topnav ul li
    {

        width: 130px;
        height: 70px;
        margin: 2px;
        padding: 8px;
    }
    .topnav ul li a
    {
        text-decoration: none;
        color: #fff;

    }
    .topnav ul li:hover
    {

        border-radius: 10px;
        background-color: darkolivegreen;
        transition: 0.30s linear;
        color: white;

    }
    .topnav li:hover > a{
        color: lightgreen;
    }
    .sub-menu-1
    {
        display: none;
    }
    .topnav ul li:hover .sub-menu-1
    {
        display: block;
        position: absolute;
        background: rgb(0,100,0);
        margin-top: 15px;
        margin-left: -15px;

    }
    .topnav ul li:hover .sub-menu-1 ul
    {
        display: block;
        margin: 10px;

    }
    .topnav ul li:hover .sub-menu-1 ul li
    {
        width: 150px;
        padding: 10px;
        /*border-bottom: 1px dotted #fff;*/
        background: transparent;
        border-radius: 0;
        text-align: left;
    }

    body{
        background-image: url("registration.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>






<body>
<div class="topnav">
    <ul>
        <li><a class="active" href="adminhomepage.php">Add Image</a></li>
        <li><a href="adminofferpage.php">Offers</a></li>
        <li><a href="adminaddslot.php">Add Slot</a></li>
        <li><a href="admincardining.php">Car-dining</a></li>
        <li><a href="adminoutsidedining.php">Outside-dining</a></li>
        <li><a href="addfoodcategory.php">Home-delivery</a></li>
        <li> <a href="#about">Orders</a></li>


        <li style="margin-top: 0px"><a href="#">Delivery boys</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="dboyreg.php">Registration</a></li>
                    <li><a href="deliveryboys.php">Available Delivery Boys</a></li>
                    <li><a href="allocatedeliveryboy.php">Allocation</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#about">Report</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>


<br><br>


<div class="registration-form">


<br><br><br><br><br>

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
            <input type="phonenumber" class="form-control" name="phoneno" placeholder="Phone Number" minlength="10" maxlength="10" required="required">
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
