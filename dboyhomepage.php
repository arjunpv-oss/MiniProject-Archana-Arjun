<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);
session_start();

$result= mysqli_query($conn,"SELECT * FROM deliveryboy_registration WHERE username='" . $_SESSION['username'] . "'");

$row=mysqli_fetch_array($result);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="deliveryreg.css">
    <style type="text/css">
        .bs-example{
            margin: 20px;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<link rel="stylesheet" href="userstyle.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Dboy Homepage</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    input{
        margin: 10px;
    }
</style>

<body>
<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
</label>

<br>
<div class="sidebar">
    <header>Taste 'O' Hub</header>
    <ul>
        <li><a href="#"><i class=""></i>View Profile</a> </li>
        <li><a href="dboylogin.php"><i class=""></i>Logout</a> </li>
    </ul>
</div>





    <!--fetch data-->




    <table class="table" style="width: 1500px; table-layout: fixed" >
        <thead>
        <tr style="margin-left: 300px; table-layout: auto">

            <th>Order id</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Food item</th>

            <th>Quantity</th>
            <th>Total</th>

            <th>ACCEPT</th><br>

            <br>

        </tr>

        </thead>
        <br><br><br>
        <tbody>


        <?php

        $query="SELECT * from dboytask where name='" . $_SESSION['username'] . "'";
        $data="SELECT basket.id,basket.customer_name,basket.contact_number,basket.address,basket.email,basket.date_made,basket.total,items.food,items.qty FROM basket inner join items on items.id=basket.id inner join dboytask on dboytask.name='" . $_SESSION['username'] . "' and dboytask.id=basket.id ";

        //$data="SELECT id from  dboytask where name='$user'";



         if ($result=mysqli_query($conn, $data))
         {


        while($row=mysqli_fetch_array($result)){
            ?>


            <tr>

                <td><?php echo $row["id"]; ?></td>


                <td><?php echo $row["customer_name"]; ?></td>
                <td><?php echo $row["contact_number"];?></td>
                <td><?php echo $row["address"]; ?></td>

                <td><?php echo $row["food"]; ?></td>
                <td><?php echo $row["qty"]; ?></td>
                <td><?php echo $row["total"]; ?></td>
                <td><button style="color: white;background-color: green"><a style="background-color: green;color: white;width: 300px;height: 40px" href="accepttask.php?op=accept&name=<?php echo  $_SESSION['username']?> & id=<?php echo $row['id']?>">ACCEPT</a></button></td>



            </tr>



          <?php
        }
        }
        ?>
        </tbody>
    </table>
    </center>
</div>
</body>
</html>


