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

    <title>Adminvieworder</title>

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
            <th>Date made</th>
            <th>Order Number</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Food item</th>
            <th>Quantity</th>

            <th>Total</th>
            <th>Status</th>
            <th>Assign</th><br>

            <br>

        </tr>

        </thead>
        <br><br><br>
        <tbody>


        <?php

        $data="SELECT basket.id,basket.customer_name,basket.contact_number,basket.address,basket.email,basket.date_made,basket.total,basket.status,items.food,items.qty FROM basket inner join items on items.id=basket.id";



        $result= mysqli_query($conn,$data);

        while($row=mysqli_fetch_array($result)){
            ?>


            <tr>
                <td><?php echo $row["date_made"]; ?></td>
                <td><?php echo $row["id"]; ?></td>


                <td><?php echo $row["customer_name"]; ?></td>
                <td><?php echo $row["contact_number"];?></td>
                <td><?php echo $row["address"]; ?></td>

                <td><?php echo $row["food"]; ?></td>
                <td><?php echo $row["qty"]; ?></td>
                <td><?php echo $row["total"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td><button style="color: white;background-color: green"><a style="background-color: green;color: white;width: 300px;height: 40px" href="allocatedeliveryboy.php?op=allocate&id=<?php echo  $row['id']?>">ASSIGN</a></button></td>


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


