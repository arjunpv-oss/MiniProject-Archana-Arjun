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
    $del_img=$_GET['file_name'];
    $query= "DELETE FROM tbl_images WHERE file_name='$del_img'";
    $result=mysqli_query($conn,$query);

    if ($result){
        ?>
        <script>
            alert('The Image Has Been Deleted');
            window.location.href='adminhomepage.php?deleted';
        </script>
        <?php
        unlink("uploads/$del_img");
    }
    else{
        ?>
        <script>
            alert('The Message Not Yet Deleted');
            window.location.href='adminhomepage.php?error';
        </script>
        <?php
    }
}
?>