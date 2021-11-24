
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
    $time=$_POST['time'];


    $sql = "select * from demo where (ddate='$datee')";
    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);



    $sql = "INSERT INTO demo(id,ddate,time) VALUES ('','$datee','$time')";


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
<style>
    body{
        background-image: url("usercarreservation.jpg");
        background-repeat: no-repeat;
        background-size: 1000px;
        height: 600px;

    }


</style>

<p align="left"><a href="usercategory.php">Go Back</a></p>



<form action="" method="post"><br><br>
    <h1 align="center">SELECT DATE AND TIME</h1><br>
    <center><h3>NB: slot reservation can be done for one hour only</h3></center>


    <br><br><br>
    <div class="form_group">

        <br><center><label>Date</label>
            <input type="date" name="ddate" placeholder="Select date for booking" style="width: 250px;height: 30px"
                   required></center></div>




    <br><br><br>
    <div class="form_group">

        <br><center><label>Time</label>
            <select name="time"  style="width: 250px; height: 40px" required>
                <option>select time</option>
                <option>9:00:00</option>
                <option>10:00:00</option>
                <option>11:00:00</option>
                <option>12:00:00</option>
                <option>13:00:00</option>
                <option>14:00:00</option>
                <option>15:00:00</option>
                <option>16:00:00</option>
                <option>17:00:00</option>
                <option>18:00:00</option>
                <option>19:00:00</option>
                <option>20:00:00</option>
                <option>21:00:00</option>
                <option>22:00:00</option>
                <option>23:00:00</option>

            </select></center></div>


    <br>



    <br><br>

    <center><a href="outsidereservation.php?&datee=<?php echo $row['ddate']?>"> <button style="color: white;background-color: green; width: 100px" value="submit" name="submit"></a>SEARCH</button>
    </center>
    </div>
</form>
</html>
