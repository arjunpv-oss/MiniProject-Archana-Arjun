<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
if (isset($_POST['submit'])) {
    $datee = $_POST['ddate'];


    $sql = "select * from demo where (ddate='$datee')";
    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);



    $sql = "INSERT INTO demo(id,ddate) VALUES ('','$datee')";


    $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

    if (mysqli_query($conn, $sql)) {
        $message = "successful...";

        echo "<script type='text/javascript'>alert('Done...\\n Fetching other details');
window.location.href='outsidereservation.php';</script>";


    }
    $conn->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Outside-dining reservation</title>
    <link rel="stylesheet">
</head>






<form action="" method="post">


    <br><br><br>
    <div class="form_group">

        <br><center><label>Date</label>
            <input type="date" name="ddate" placeholder="Select date for booking" style="width: 350px;height: 30px"
                   required></center>


        <br><br>

        <center><a href="outsidereservation.php?&datee=<?php echo $row['ddate']?>"> <button style="color: white;background-color: green" value="submit" name="submit"></a>SEARCH</button>
        </center>
    </div>
</form>
</html>
