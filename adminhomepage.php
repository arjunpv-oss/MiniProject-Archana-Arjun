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
        width: 1500px;
        height: :40px;
        border-bottom: 10px;

    }

    .topnav a {
        float:left;
        color: #f2f2f2;
        text-align: center;
        padding: 16px 20px;
        text-decoration: none;
        font-size: 25px;
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


    .topnav ul
    {
        display: inline-flex;
        list-style: none;
        color: #fff;



    }
    .topnav ul li
    {

        width: 120px;
        height: 70px;
        margin: 2px;
        padding: 8px;
    }
    .topnav ul li a
    {
        text-decoration: none;
        color: #fff;

    }
    .topnav ul li:hover
    {

        border-radius: 10px;
        background-color: darkolivegreen;
        transition: 0.30s linear;
        color: white;

    }
    .topnav li:hover > a{
        color: lightgreen;
    }
    .sub-menu-1
    {
        display: none;
    }
    .topnav ul li:hover .sub-menu-1
    {
        display: block;
        position: absolute;
        background: rgb(0,100,0);
        margin-top: 15px;
        margin-left: -15px;

    }
    .topnav ul li:hover .sub-menu-1 ul
    {
        display: block;
        margin: 10px;

    }
    .topnav ul li:hover .sub-menu-1 ul li
    {
        width: 150px;
        padding: 10px;
        /*border-bottom: 1px dotted #fff;*/
        background: transparent;
        border-radius: 0;
        text-align: left;
    }

</style>
<body>
<div class="topnav">
    <ul>
    <li><a class="active" href="adminhomepage.php">Add Image</a></li>
        <li><a href="adminofferpage.php">Offers</a></li>
        <li><a href="adminaddslot.php">Add Slot</a></li>
        <li><a href="admincardining.php">Car-dining</a></li>
        <li><a href="adminoutsidedining.php">Outside-dining</a></li>
        <li><a href="addfoodcategory.php">Home-delivery</a></li>
        <li> <a href="adminvieworder.php">Orders</a></li>


            <li style="margin-top: 0px"><a href="#">Delivery boys</a>
    <div class="sub-menu-1">
        <ul>
            <li><a href="dboyreg.php">Registration</a></li>
            <li><a href="deliveryboys.php">Available Delivery Boys</a></li>
            <li><a href="allocatedeliveryboy.php">Allocation</a></li>
        </ul>
    </div>
    </li>
        <li><a href="#about">Report</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>



<br>
<div class="container">
    <br><br>
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
