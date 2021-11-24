




<!DOCTYPE html>
<html lang="en">
<head>

    <title>Update offer</title>
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
    $id= $_GET['offerid'];
    //$Record = mysqli_query($con,"SELECT * FROM offer WHERE valid_from= '$v'");
    $query="SELECT offer.offer_id,offer.offer_percentage,offer.valid_from,offer.valid_to,offer.coupon_code,food_category.category_name from offer inner join food_category on offer.category_id=food_category.category_id  WHERE offer.offer_id= '$id'";
    $query_run=mysqli_query($con,$query);


    while($data = mysqli_fetch_array($query_run))
    {

    ?>

    <center>
        <div class="main" style="margin-top: 100px">
            <form action="update1adminoffer.php" method="post" enctype="multipart/form-data">
                Category Name:
                <input type="text" value="<?php echo $data['category_name']; ?>" name="category_name"><br><br>

               Offer_percentage
                <input type="text" value="<?php echo  $data['offer_percentage'];?>" name="offer_percentage" id="" required><br><br>
                Valid from
                <input type="date" value="<?php echo  $data['valid_from'];?>" name="valid_from" id="" required><br><br><br>
                Valid To
                <input type="date" value="<?php echo  $data['valid_to'];?>" name="valid_to" id="" required><br><br><br>
                Coupon code
                <input type="text" value="<?php echo  $data['coupon_code'];?>" name="coupon_code" id="" required><br><br><br>
                <input type="hidden" name="offerid" value="<?php echo  $data['offer_id']?>">

                <button type="submit" name="update1" style="color: white;background-color: green;width: 120px;height: 50px">UPDATE</button>


            </form>
        </div>
    </center>
    <?php
    }
}
?>
<!--update code-->

</body>
</html>



