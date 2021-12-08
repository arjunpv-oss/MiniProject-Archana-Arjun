

<html>
<head>

    <link rel="stylesheet" >
    <title>user order history</title>







</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
    }
</style>
<body style="background-color: #6b4559">


<p align="left"><a href="userhomepage.php" style="color: white">Go Back</a></p>


</body>
</html>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Could not connect to mysql: ' . mysqli_error());
}

$result = mysqli_query($conn, "SELECT * from register WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);

$ph=$row['Phonenumber'];
$data="SELECT basket.date_made,basket.id,basket.customer_name,basket.contact_number,basket.address,basket.email,basket.date_made,basket.total,items.food,items.qty,basket.status FROM basket inner join items on items.id=basket.id and basket.contact_number='$ph' and basket.status='delivered'";




if ($result=mysqli_query($conn, $data))
{


    while($row=mysqli_fetch_array($result)){
        ?>

<div class="card bg-gradient" style="border-radius: 25px">
        <tr style="background: palevioletred">
    <div class="card-body"><td style="font-color:white">Date: <?php echo $row["date_made"]; ?> </td><br>

            <td style="font-color:white">Order Number: <?php echo $row["id"]; ?> </td><br>
            <td style="font-color:white"><?php echo $row["food"]; ?> : <?php echo $row["qty"]; ?></td>
        <td></td></div>
        </tr>
</div>






           <br>



        </tr>



        <?php
    }
}
?>








