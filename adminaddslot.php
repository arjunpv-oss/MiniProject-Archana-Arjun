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
        margin-top: -50px;
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
        background-image: url("addfooditems.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Doc</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
    }
</style>

<body>
<div class="topnav"><br><br><br>
    <a class="active" href="adminhomepage.php">Add Image</a>
    <a href="adminofferpage.php">Offers</a>
    <a href="adminaddslot.php">Add Slot</a>
    <a href="admincardining.php">Car-dining</a>
    <a href="adminoutsidedining.php">Outside-dining</a>
    <a href="addfoodcategory.php">Home-delivery</a>
    <a href="#about">Orders</a>
    <a href="dboyreg.php">Delivery boys</a>
    <a href="#about">Report</a>
    <a href="login.php">Logout</a>
</div><br>

<div align="center" >

    <br><br>

    <center><h1 style="color: #6a1a21"><u>ADD SLOT</u></h1></center><br>




    <form method="post" >



        <p style="color: black" >Category Name
            <select name="category_name"  style="width: 250px; height: 40px" required>
                <option>Select</option>
                <option>Car-dining</option>
                <option>Outside-dining</option>


            </select></p>



            <p style="color: #0c0b09">Add slot
                <input type="text" name="addslot" style="width: 300px;height: 30px" placeholder="Eg:CD1" required></p>
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

