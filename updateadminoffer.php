




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
    $ID= $_GET['id'];
    $Record = mysqli_query($con,"SELECT * FROM offer WHERE offer_id= '$ID'");


    $data = mysqli_fetch_array($Record);

    ?>

    <center>
        <div class="main" style="margin-top: 100px">
            <form action="update1adminoffer.php" method="post" enctype="multipart/form-data">
                Category Name:
                <input type="text" value="<?php echo $data['category_name']; ?>" name="category_name" ><br><br>
               Offer_percentage
                <input type="text" value="<?php echo  $data['offer_percentage'];?>" name="offer_percentage" id="" required><br><br>
                Valid from
                <input type="date" value="<?php echo  $data['valid_from'];?>" name="valid_from" id="" required><br><br><br>
                Valid To
                <input type="date" value="<?php echo  $data['valid_to'];?>" name="valid_to" id="" required><br><br><br>
                Coupon code
                <input type="text" value="<?php echo  $data['coupon_code'];?>" name="coupon_code" id="" required><br><br><br>

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



