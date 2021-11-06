




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

<?php
$con = mysqli_connect("localhost","root","","tasteohub");


if ($_GET['op']=="update")
{
    $no= $_GET['slotnumber'];
    $Record ="SELECT * FROM addslot WHERE slot_number= '$no'";

    $query_run=mysqli_query($con,$Record);


    while($data = mysqli_fetch_array($query_run))
    {

        ?>

        <center>
            <div class="main" style="margin-top: 100px">
                <form action="update1adminslot.php" method="post" enctype="multipart/form-data">
                    <br><br> <p><center><h1>UPDATE SLOT</h1></center></p><br><br>
        Dining Type
        <input type="text" value="<?php echo $data['dining_type']; ?>" name="dining_type"><br><br>

        Slot Number
        <input type="text" value="<?php echo  $data['slot_number'];?>" name="slot_number" required><br><br>
        Status
        <select name="status"  style="width: 250px; height: 40px" required><option value="<?php echo  $data['status'];?>"></option>
            <option>Available</option>
            <option>Reserved</option>

            <option>Under-maintenance</option></select><br><br><br>

        <button type="submit" name="update1" style="color: white;background-color: green;width: 120px;height: 50px">UPDATE</button>


        </form>
        </div>
        </center>
        <?php


    }
    ?>


    <?php
}
?>
<!--update code-->

</body>
</html>
































