<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
if(isset($_POST['submit'])) {
    $category = $_POST['category'];
    $dining_type=$_POST['category'];
    $slotnumber = $_POST['slot number'];
    $status = $_POST['status'];


    $sql = "INSERT INTO addslot (slot_id,dining_type,slot_number,status) VALUES ('','$dining_type','$slotnumber','$status')";


        $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful...";

            echo "<script type='text/javascript'>alert('Registration successful...\\n slot added');</script>";
        }


//sql query to perform copying data from one table to another









    //if ($conn->query($sql_query) === true) {
    // echo "";

    // } else {
    // echo "ERROR: Could not able to proceed $sql_query. "
    //  . $conn->error;
    //  }

// Close the  connection
    // $conn->close();


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="deliveryreg.css">
</head>
<style>


    body{
        background-image: url("registration.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        align-content: center;
    }
</style>
<br><br>
<center><h1>SLOT SELECTION</h1></center>



<body>





    <form action="/action_page.php">
        <br><br><br>
        <center><label for="category" style="alignment: center"></label></center>
        <center><select id="category" name="category" style="width: 200px; height: 30px">
            <option value="car-dining">Car-dining</option>
            <option value="outside-dining">Outside-dining</option>

        </select>

    </form>


    <form method="post">
       <br><br>
        <label for="slot number" >
            <input type="text" name="slot number" placeholder="slot number"style="width: 150px;height: 30px" required></label>
        <br><br><br>
        <label for="status" ></label>
        <select id="status" name="status" style="width: 100px; height: 30px">
            <option value="car-dining">Reserved</option>
            <option value="outside-dining">Free</option>
            <option value="under maintenanace">Under Maintenanace</option>

        </select>


<br><br>

        <button type="submit" name ="submit" value="submit" style="background-color: green; color: white;width: 90px; height: 40px">ADD</button>
    </form>

</body>
</html>

