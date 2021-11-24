
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
    $datee = date('y-m-d');
    $time=$_POST['time'];


    $sql = "select * from demo where (ddate='$datee')";
    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);



    $sql = "INSERT INTO demo(id,ddate,time) VALUES ('','$datee','$time')";


    $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

    if (mysqli_query($conn, $sql)) {
        $message = "successful...";

        echo "<script type='text/javascript'>alert('Done...\\n Fetching other details');
window.location.href='adminbookcarslot.php';</script>";


    }
    $conn->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Car-dining reservation</title>
    <link rel="stylesheet">
</head>



<style>
    body{
        background-image: url("usercarreservation.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        height: 600px;

    }


</style>



<form action="" method="post"><br>
    <h1 align="center">SELECT TIME</h1>
<br><br>

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

    <center><a href="adminbookcarslot.php?&datee=<?php echo $row['ddate']?>"> <button style="color: white;background-color: green" value="submit" name="submit"></a>SEARCH</button>
    </center>
    </div>
</form>
</html>
