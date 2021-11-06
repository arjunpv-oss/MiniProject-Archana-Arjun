

<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if ($_GET['op']=="update") {
    $ID = $_GET['slotnumber'];
    $result = mysqli_query($con, "UPDATE addslot set status='Available' where slot_number = '$ID'");
    $result1 = mysqli_query($con, "UPDATE creservation set status='Available' where slot_number = '$ID'");




if ($result1){

    ?>
    <script>
        alert('Slot updated to available');
        window.location.href='admincardining.php?deleted';
    </script>
    <?php
    }

else{
    ?>
    <script>
        alert('The Message Not Yet Deleted');
        window.location.href='admincardining.php?error';
    </script>
    <?php
}
}
?>


