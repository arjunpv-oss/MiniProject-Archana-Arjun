


<?php
if (isset($_POST['update1'])) {

    $host='localhost';
    $username='root';
    $password='';
    $dbname = "tasteohub";
    $conn=mysqli_connect($host,$username,$password,"$dbname");
    $name = $_POST['dining_type'];
    $slot = $_POST['slot_number'];
    $status = $_POST['status'];




    $result=mysqli_query($conn,"UPDATE addslot SET dining_type='$name',slot_number='$slot',status='$status' where slot_number='$slot'");

    if($result) {

        ?>
        <script>
            alert('Slot updated');
            window.location.href='adminoutsidedining.php?updated';
            header("location:adminoutsidedining.php.php");
        </script>
        <?php

    }


    else{

        ?>
        <script>
            alert('Error');
            window.location.href='adminoutsidedining.php';
            header("location:adminoutsidedining.php");
        </script>
        <?php

    }

}
?>











