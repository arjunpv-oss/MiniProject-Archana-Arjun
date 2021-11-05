

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Doc</title>
    <link rel="stylesheet" href="foodstyle.css">


</head>
<style>

    body{
        background-image: url("update.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        alignment: center;
    }
</style>
<body><br><br>
<p><center><h1>UPDATE FOOD ITEM DETAILS</h1></center></p>
<?php
$con = mysqli_connect("localhost","root","","tasteohub");


if ($_GET['op']=="update")
{
    $ID= $_GET['name'];
    $Record = mysqli_query($con,"SELECT * FROM food_item WHERE name = '$ID'");


    $data = mysqli_fetch_array($Record);

    ?>

    <center>
        <div class="main" style="margin-top: 100px">
            <form action="update1fooditem.php" method="post" enctype="multipart/form-data">
                Name:
                <input type="text" value="<?php echo $data['name']; ?>" name="name" required><br><br>
                Image:
                <input type="file"  value="<?php echo  $data['fooditemimage'];?>" name="image" required><br><br>
                <input type="hidden" name="id" value="<?php echo  $data['food_item_id']?>">
                Price:
                <input type="text" value="<?php echo  $data['price'];?>" name="price" id=""><br><br>
                Quantity:
                <input type="text" value="<?php echo  $data['quantity'];?>" name="quantity" id=""><br><br><br>
                <input type="hidden" name="fooditemid" value="<?php echo  $data['food_item_id']?>">
                <button type="submit" name="update1" style="color: white;background-color: green;width: 120px;height: 50px">UPDATE</button>


            </form>
        </div>
    </center>
    <?php

}
?>
<!--update code-->

</body>
</html>



