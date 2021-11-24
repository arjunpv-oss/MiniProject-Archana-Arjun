


<?php
if (isset($_POST['update1'])) {

    $host='localhost';
    $username='root';
    $password='';
    $dbname = "tasteohub";
    $conn=mysqli_connect($host,$username,$password,"$dbname");
    $phone = $_POST['phoneno'];

    $status = $_POST['status'];




    $result=mysqli_query($conn,"UPDATE deliveryboy_registration SET phoneno='$phone',status='$status' where phoneno='$phone'");

    if($result) {

        ?>
        <script>
            alert(' updated');
            window.location.href='deliveryboys.php?updated';
            header("location:deliveryboys.php");
        </script>
        <?php

    }


    else{

        ?>
        <script>
            alert('Error');
            window.location.href='updatedeliveryboy.php';
            header("location:updatedeliveryboy.php");
        </script>
        <?php

    }

}
?>











