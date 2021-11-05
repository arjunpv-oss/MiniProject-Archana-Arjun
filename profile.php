<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Could not connect to mysql: ' . mysqli_error());
}

    $result = mysqli_query($conn, "SELECT * from register WHERE id='" . $_GET['id'] . "'");
    $row = mysqli_fetch_array($result);



?>
<html>
<head>
    <link rel="stylesheet" href="foodstyle.css">
    <title>view profile</title>







</head>
<style>

    body{
        background-image: url("update.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        alignment: center;
    }
</style>
<body>






    <form action="userprofile1.php?id=<?php echo $row["id"];?>" method="post"><br><br>

<center><h1>PROFILE DETAILS</h1></center>
<br>

              <center> First Name

                <input type="text" value="<?php echo $row['First_Name'] ;?>" name="first_name" id="" required><br><br>

              </center>
        <center>
            Last Name
        <input type="text" value="<?php echo $row['Last_Name'];?>" name="last_name" id="" required><br><br>
        </center>
        <center>
                user Name
        <input type="text" value=" <?php echo $row['User_Name'];?>" name="user_name" id="" required><br><br>


        </center>
        <center>
           Email
        <input type="text" value=" <?php echo $row['Email'];?>" name="email" id="" required><br><br>
        </center>
        <center>
               Address

        <input type="text" value=" <?php echo $row['Address'];?>" name="address" id="" style="width: 400px;height: 50px" required><br><br>
        </center>
        <center>

        Area
        <input type="text" value=" <?php echo $row['Area'];?>" name="area" id="" required><br><br>

        </center>
        <center>

        Phone Number
        <input type="text" value="<?php echo $row['Phonenumber'];?>" name="phoneno" id="" required><br><br>
        </center>
        <center>
        Password
        <input type="text" value="<?php echo $row['Password'];?>" name="password" id="" required><br><br>
            <input type="hidden" name="id" class="txtField" value="<?php echo  $row['id'];?>">

        <br>
        <center><button type="submit" name="update" class="btn" style="background-color: green;color: white;height: 50px;width: 100px">UPDATE</button></center>
    </form>
</div>
</body>
</html>