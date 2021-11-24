
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Update offer</title>
    <link rel="stylesheet" href="foodstyle.css">


</head>


<?php

$con = mysqli_connect("localhost","root","","tasteohub");


if ($_GET['op']=="accept")
{

    $name=$_GET['name'];
    $id=$_GET['id'];


    $result=mysqli_query($con,"UPDATE basket SET status='order taken' WHERE id = '$id'");




}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="categorystyle.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<style>
    body{
        background-image: url("usercategory.jpg");
        background-repeat: no-repeat;
        background-size: 1500px;
        height: 600px;

    }


</style>
<body>
<p align="left"><a href="dboyhomepage.php" style="color: white">Go Back</a></p>
<br>
<center>

    <div class="cards">
        <div class="card">PROCESSING</div><br>
        <div class="card">OUT FOR DELIVERY</div><br>
        <div class="card">DELIVERED</div><br>

    </div>
</center>

</body>
</html>
