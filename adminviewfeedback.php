<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
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
    </style>

    <title>Adminviewfeedback</title>

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
        <li> <a href="adminvieworder.php">Orders</a></li>


        <li style="margin-top: 0px"><a href="#">Delivery boys</a>

        </li>
        <li><a href="#about">Report</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>




<body>
<br>
<div class="container">









    <!--fetch data-->


    <center>

        <table class="table" style="width: 1500px; table-layout: fixed" >
            <thead>
            <tr style="margin-left: 300px; table-layout: auto">

                <th>Order Number</th>
                <th>Quality_score</th>
                <th>Feedback</th>

                <th>Reply</th><br>

                <br>

            </tr>

            </thead>
            <br><br><br>
            <tbody>


            <?php

            $data="SELECT * from feedback order by id desc";


            $result= mysqli_query($conn,$data);

            while($row=mysqli_fetch_array($result)){
                ?>


                <tr>

                    <td><?php echo $row["orderid"]; ?></td>


                    <td><?php echo $row["quality_score"]; ?></td>
                    <td><?php echo $row["feedback"];?></td>
                    <td> <button type="submit" style="background-color:green;color: white"><a style="background-color:green;color: white" href="replyfeedback.php?order=<?php echo $row['orderid']?>" style="color: white">REPLY</a></button>


                </tr>
                <?php


            }
            ?>


            </tbody>
        </table>
    </center>
</div>
</body>
</html>


