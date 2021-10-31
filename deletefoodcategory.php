<?php
$servername="localhost";
$username="root";
$password="";
$dbname="tasteohub";
$conn= mysqli_connect($servername, $username, $password, $dbname);

    $del_category=$_GET['category_image'];

    $result=mysqli_query($conn,"DELETE FROM food_category WHERE category_image='$del_category'");

    if ($result){
        ?>
        <script>
            alert('Category Deleted');
            window.location.href='addfoodcategory.php?deleted';
        </script>
        <?php
        unlink("food/$del_category");
    }
    else{
        ?>
        <script>
            alert('The Message Not Yet Deleted');
            window.location.href='deletefoodcategory.php?error';
        </script>
        <?php
    }

?>