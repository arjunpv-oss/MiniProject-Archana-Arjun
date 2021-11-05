<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";

$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die('Could not connect to mysql: ' .mysqli_error());
}
if(isset($_POST['r_id'])){

    $query="SELECT time FROM workingtime WHERE time NOT IN ( SELECT time FROM reservation  WHERE workingtime.time = reservation.time)";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        echo '<option value="">Select time</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value='.$row['r_id'].'>'.$row['time'].'</option>';
        }
    }else{
        echo '<option>No time found</option>';
    }
}
?>

