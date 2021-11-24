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
        width: 1600px;
        height: :40px;
        border-bottom: 10px;

    }

    .topnav a {
        float:left;
        color: #f2f2f2;
        text-align: center;
        padding: 16px 20px;
        text-decoration: none;
        font-size: 23px;
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

        width: 120px;
        height: 80px;
        margin: 10px;
        padding: 10px;
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



    body{
        background-image: url("registration.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>View offer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
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

<div class="container">
<table class="table" style="width: 1500px; table-layout: fixed" >
    <thead>
    <tr style="margin-left: 300px; table-layout: auto">

        <th>Name</th>
        <th>Username</th>
        <th>Email id</th>
        <th>Password</th>
        <th>Phone Number</th>
        <th>Status</th>


        <th>UPDATE</th><br>

        <br>

    </tr>

    </thead>
    <br><br><br>
    <tbody>


    <?php


    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tasteohub";


    $conn=mysqli_connect($host,$user,$pass,$db);
    $data="SELECT fullname,username,email_id,password,phoneno,status from deliveryboy_registration";


    $result= mysqli_query($conn,$data);

    while($row=mysqli_fetch_array($result)){
        ?>


        <tr>

            <td><?php echo $row["fullname"]; ?></td>
            <td><?php echo $row["username"];?></td>
            <td><?php echo $row["email_id"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td><?php echo $row["phoneno"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td><button style="color: white;background-color: green"><a style="background-color: green;color: white" href="updatedeliveryboy.php?op=update&username=<?php echo  $row['username']?>" >UPDATE</a></button></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>
