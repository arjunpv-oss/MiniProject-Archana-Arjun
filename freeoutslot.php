

<?php
$con = mysqli_connect("localhost","root","","tasteohub");
if ($_GET['op']=="update") {
    $ID = $_GET['slotnumber'];
    $result = mysqli_query($con, "UPDATE addslot set status='Available' where slot_number = '$ID'");
    $result1 = mysqli_query($con, "UPDATE oreservation set status='Available' where slot_number = '$ID'");




    if ($result1){

        ?>
        <script>
            alert('Slot updated to available');
            window.location.href='adminoutsidedining.php?deleted';
        </script>
        <?php
    }

    else{
        ?>
        <script>
            alert('The Message Not Yet Deleted');
            window.location.href='adminoutsidedining.php?error';
        </script>
        <?php
    }
}
?>


