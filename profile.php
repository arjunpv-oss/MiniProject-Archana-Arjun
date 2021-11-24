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

    <link rel="stylesheet" href="deliveryreg.css">
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


<p align="left"><a href="userhomepage.php">Go Back</a></p>



    <form action="userprofile1.php?id=<?php echo $row["id"];?>" method="post"><br><br>

<center><h1>PROFILE DETAILS</h1></center><br><br><br>
        <center>  <form id="form">
            <div class="mb-2">
                <label class="form-label">First Name</label>
                <input type="text"  step="any" value="<?php echo $row['First_Name'] ;?>" class="form-control" name="first_name" size="30" id=" extend" required><br><br>

            </div>


              </center>

        <center>
            <label class="form-label">Last Name</label>
        <input type="text" value="<?php echo $row['Last_Name'];?>" name="last_name" size="30" id="" required><br><br>
        </center>
        <center>
            <label class="form-label">User Name</label>
        <input type="text" value=" <?php echo $row['User_Name'];?>" name="user_name" size="30"  id="" required><br><br>


        </center>

        <center>
                <div class="mb-2">
                    <label class="form-label">Email ID</label>

        <input type="text" step="any" value=" <?php echo $row['Email'];?>" name="email" size="30" id="extend"  required><br><br>
        </center>
        </div>
        <center>
            <div class="mb-2">
            <label class="form-label">Address</label>


        <input type="text" value=" <?php echo $row['Address'];?>" name="address" id=""  size="30" style="width:250px;height: 40px" required><br><br>
            </div>
        </center>
        <center>
            <div class="mb-2">
                <label class="form-label">Area(5km)</label>

        <input type="text" value=" <?php echo $row['Area'];?>" name="area" size="30" id=""  required><br><br>
            </div>
        </center>
        <center>
            <div class="mb-2">
                <label class="form-label"> Phone No</label>


        <input type="text" value="<?php echo $row['Phonenumber'];?>" name="phoneno" size="30" id=""  required><br><br>
            </div>
        </center>
        <center>
            <div class="mb-2">
                <label class="form-label"> Password</label>


        <input type="text" value="<?php echo $row['Password'];?>" name="password" size="30" id=""  required><br><br>
            <input type="hidden" name="id" class="txtField" value="<?php echo  $row['id'];?>">
            </div>
        </center>

        <br>
        <center><button type="submit" name="update" class="btn" style="background-color: green;color: white;height: 50px;width: 100px">UPDATE</button></center>
    </form>
</div>
</body>
</html>