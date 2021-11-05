<?php
$servername="localhost";
$username="root";
$password="";
$dbname="tasteohub";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
?>
<html>
<head>
    <title>Admin Homepage</title>
</head>
<style>



    .topnav {
        overflow: hidden;
        background-color: green;

    }

    .topnav a {
        float:left;
        color: #f2f2f2;
        text-align: center;
        padding: 16px 20px;
        text-decoration: none;
        font-size: 26px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: orangered;
    }



    body{
        background-image: url("adminaddimage.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        alignment: center;
    }
</style>
<body>
<div class="topnav">
    <a class="active" href="adminhomepage.php">Add Image</a>
    <a href="adminofferpage.php">Offers</a>
    <a href="adminaddslot.php">Add Slot</a>
    <a href="#about">Car-dining</a>
    <a href="#about">Outside-dining</a>
    <a href="addfoodcategory.php">Home-delivery</a>
    <a href="#about">Orders</a>
    <a href="dboyreg.php">Delivery boys</a>
    <a href="#about">Report</a>
    <a href="login.php">Logout</a>
</div>


<br>
<div class="container">
    <h1 align="center" style="color: maroon"><center>ADD IMAGES</center></h1><br>
<form action="add.php" method="post" enctype="multipart/form-data">
   <center><input type="file"name="file_name" required><br><br><br>
        <button type="submit" name="submit" class="btn btn-sm btn-primary" style="color: white;background-color: blue;width: 100px;height: 30px" >Add</button></center>
</form>


<br><br>
<table class="table table-bordered" align="center">
    <tr>

    </tr>

    <?php
    $data="select * from tbl_images";
    $result= mysqli_query($conn,$data);
    while($row=mysqli_fetch_array($result)){
        ?>
          <tr> <td>


                <img src="<?php echo  'uploads/'.$row['file_name'];?>" width="400px" height="250px"/><br><br><br><br><br>


           <td style="width: 200px"> <td><button style="background-color: #0c4128"><a href="delete.php?op=delete&file_name=<?php echo  $row['file_name']?> " style="color: white">DELETE</a></button></td></tr>


        </td>
        </tr>

        <?php
    }
    ?>
</table>
</div>
</body>
</html>
