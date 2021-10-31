

<?php
$con = mysqli_connect("localhost","root","","tasteohub");
$ID = $_GET['image'];
$result=mysqli_query($con,"DELETE FROM food_item WHERE fooditemimage = '$ID'");


if ($result){
    ?>
    <script>
        alert('The Item Has Been Deleted');
        window.location.href='addfooditems.php?deleted';
    </script>
    <?php
    unlink("uploadimage/'$ID'");
}
else{
    ?>
    <script>
        alert('The Message Not Yet Deleted');
        window.location.href='addfooditems.php?error';
    </script>
    <?php

}
?>

