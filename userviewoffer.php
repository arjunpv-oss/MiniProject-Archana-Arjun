

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


<!--fetch data-->


<!DOCTYPE html>
<html lang="en">
<head>

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
<style>
    body{
        background-image: url("userviewoffer1.jpg");
        background-repeat: no-repeat;
        background-size: 1500px;
    }
</style>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>View offer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 20px;
    }
</style>

<body>
<br>
<div class="container">
    <p align="left"><a href="userhomepage.php">Go Back</a></p>
    <p> <center> <h1>OFFER</h1></center></p>







    <table class="table" style="width: 100px ;table-layout: auto">
    <thead>
    <tr style="margin-left: 100px">

        <th>Category Name</th>
        <th>offer %</th>
        <th>valid from</th>
        <th>valid to</th>
        <th>coupon code</th>


        <br>

    </tr>

    </thead>
    <br><br><br>
    <tbody>


    <?php

    $data="SELECT offer.offer_id,offer.offer_percentage,offer.valid_from,offer.valid_to,offer.coupon_code,food_category.category_name FROM offer inner join food_category on offer.category_id=food_category.category_id";


    $result= mysqli_query($conn,$data);

    while($row=mysqli_fetch_array($result)){
        ?>


        <tr>

            <td><?php echo $row["category_name"]; ?></td>
            <td><?php echo $row["offer_percentage"]; ?></td>
            <td><?php echo $row["valid_from"]; ?></td>
            <td><?php echo $row["valid_to"]; ?></td>
            <td><?php echo $row["coupon_code"]; ?></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>