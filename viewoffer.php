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
        background-image: url("viewoffer.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Doc</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
    }
</style>

<body>
<br>
<div class="container">
<p> <center> <h1>OFFER</h1></center></p>



                    <p align="left"><a href="adminofferpage.php">Go Back</a></p>




<!--fetch data-->




    <table class="table" style="width: 800px;margin-left: 300px">
        <thead>
        <tr style="margin-left: 300px">
            <th>offer id</th>
            <th>Category Name</th>
            <th>offer %</th>
            <th>valid from</th>
            <th>valid to</th>
            <th>coupon code</th>

            <th>UPDATE</th><br>

<br>

        </tr>

        </thead>
        <br><br><br>
        <tbody>


    <?php

    $data="SELECT * FROM offer";


    $result= mysqli_query($conn,$data);

    while($row=mysqli_fetch_array($result)){
        ?>


        <tr>
            <td><?php echo $row["offer_id"]; ?></td>
            <td><?php echo $row["category_name"]; ?></td>
            <td><?php echo $row["offer_percentage"]; ?></td>
            <td><?php echo $row["valid_from"]; ?></td>
            <td><?php echo $row["valid_to"]; ?></td>
            <td><?php echo $row["coupon_code"]; ?></td>



               <td> <button style="background-color: #0c4128">

                   <a href="updateadminoffer.php?op=update&id=<?php echo $row['offer_id']?>" style="color: white">UPDATE</a></button><br><br>
               </td>
        </tr>
        <?php
    }
    ?>
        </tbody>
</table>
</div>
</body>
</html>


