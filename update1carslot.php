


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
            window.location.href='admincardining.php?updated';
            header("location:admincardining.php");
        </script>
        <?php

    }


    else{

        ?>
        <script>
            alert('Error');
            window.location.href='admincardining.php';
            header("location:admincardining.php");
        </script>
        <?php

    }

}
?>











