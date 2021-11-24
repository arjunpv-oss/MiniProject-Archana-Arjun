<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add slot</title>
    <link rel="stylesheet">
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
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Doc</title>


<style>
    input{
        margin: 10px;
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
</div><br>

<div align="center" >

    <br><br>

   <br><br><br><br>




    <form method="post" >



        <p style="color: black" >Category Name<br><br>
            <select name="category_name"  style="width: 350px; height: 40px" required>
                <option>Select</option>
                <option>Car-dining</option>
                <option>Outside-dining</option>


            </select></p>



            <p style="color: #0c0b09">Add slot<br>
                <input type="text" name="addslot" style="width: 350px;height: 40px" placeholder="Eg:CD1" required></p>
            <br>
            <button type="submit" name ="submit"  style="background-color: #0c4128; color: white; width: 100px; height: 50px">ADD SLOT</button>

        <?php
        if (isset($_POST['submit'])) {
            //$category_id=$_POST['category_id'];


            $name = $_POST['category_name'];
            $slot = $_POST['addslot'];
            $status = $_POST['status'];

            $host='localhost';
            $username='root';
            $password='';
            $dbname = "tasteohub";
            $conn=mysqli_connect($host,$username,$password,$dbname);


            $sql = "select * from addslot where (slot_number='$slot')";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)) {
                // output data of each row
                $row = mysqli_fetch_assoc($res);
                if ($slot == $row['slot_number']) {
                    $message = "failed...";

                    echo "<script type='text/javascript'>alert('failed...\\nslot already exists');
            window.location.href='adminaddslot.php';</script>";
                }
            } else {


                $sql = "INSERT INTO addslot(slot_id,dining_type,slot_number,status) VALUES ('','$name','$slot','$status')";


                $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

                if (mysqli_query($conn, $sql)) {
                    $message = "successful...";

                    echo "<script type='text/javascript'>alert('successful...\\n item added');
window.location.href='adminaddslot.php';</script>";

                }

            }
            $conn->close();

        }
        ?>




    </form>

</div>






<p style="margin-top: 300px"> <center> <h1>SLOT DETAILS</h1></center></p>
<!--fetch data-->
<div class="container">



    <table class="table" style="width: 1500px">
        <thead>
        <tr>
            <th>Id</th>


            <th>Category Name</th>
            <th>Slot Number</th>
            <th>Status</th>




        </tr>
        </thead>
        <tbody>


        <?php
        $con = mysqli_connect("localhost","root","","tasteohub");
        $pic = mysqli_query($con,"SELECT * FROM addslot");


        while ($row = mysqli_fetch_array($pic)){
        ?>

        <tr>
            <td><?php echo $row['slot_id'];?></td>
            <td><?php echo $row['dining_type'];?></td>
            <td><?php echo $row['slot_number'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><button style="color: white;background-color: green"><a style="background-color: green;color: white" href="updateadminslot.php?op=update&slotnumber=<?php echo  $row['slot_number']?>" >UPDATE</a></button></td>


            <td></td>
        </tr>
        <?php
        }
        ?>




        </tbody>
    </table>
</div>
</body>
</html>
</body>
</html>

