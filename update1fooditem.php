<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if (isset($_POST['update1'])) {

    $ID =  $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $QUANTITY=$_POST['quantity'];
    $IMAGE = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/" . $img_name;
    move_uploaded_file($img_loc, 'uploadimage/' . $img_name);
    $result=mysqli_query($con,"UPDATE food_item SET name='$NAME',price='$PRICE', quantity='$QUANTITY',fooditemimage='$img_des' WHERE food_item_id = '$ID'");
    if($result) {

?>
<script>
    alert('The Item Has Been updated');
    window.location.href='addfooditems.php?updated';
    header("location:addfooditems.php");
</script>
<?php

    }


    else{

        ?>
        <script>
            alert('Error');
            window.location.href='addfooditems.php';
            header("location:addfooditems.php");
        </script>
        <?php


    }
    }
    ?>

