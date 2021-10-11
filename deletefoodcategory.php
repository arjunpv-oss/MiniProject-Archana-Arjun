<?php
$servername="localhost";
$username="root";
$password="";
$dbname="tasteohub";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

if ($_GET['op']=="delete")
{
    $del_category=$_GET['category_name'];
    $query= "DELETE FROM food_category WHERE category_name='$del_category'";
    $result=mysqli_query($conn,$query);

    if ($result){
        ?>
        <script>
            alert('Category Deleted');
            window.location.href='addfoodcategory.php?deleted';
        </script>
        <?php
        unlink("uploads/$del_category");
    }
    else{
        ?>
        <script>
            alert('The Message Not Yet Deleted');
            window.location.href='deletefoodcategory.php?error';
        </script>
        <?php
    }
}
?>