<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die('Could not connect to mysql: ' .mysql_error());
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Addfoodcategory</title>

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



    body{
        background-image: url("addfoodcategory.jpg");
        background-repeat: no-repeat;
        background-size: cover;
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
        <li> <a href="#about">Orders</a></li>


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


        <script type="text/javascript">
            document.getElementById("myButton").onclick = function () {
                location.href = "menu.html";
            };
        </script>


<form method="post" action="insertfoodcategory.php">

    <div class="container">
    <h1><center>ADD FOOD CATEGORY</center></h1><br><br>

    <p align="center">Category Name<br><br>
    <input type="text" name="category_name" placeholder="Category Name" style="width: 250px;height: 40px" required><br><br>

    <center><button type="submit" name ="submit"  style=" background-color:darkblue; height: 30px; width: 90px; color:white">Add</button></center>
    </form>



</body>
<?php
$host='localhost';
$username='root';
$password='';
$dbname = "tasteohub";
$conn=mysqli_connect($host,$username,$password,"$dbname");
if(!$conn)
{
    die('Could not Connect MySql Server:' .mysql_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>


<body>




        <div class="bs-example">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <br><br><h2 class="pull-left"><center>Category List</center></h2><br><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <table class='table table-bordered table-striped' align="center">

    <?php



    $data="SELECT * FROM food_category";


    $result= mysqli_query($conn,$data);

     while($row=mysqli_fetch_array($result)){
         ?>
         <tr>



                    <td><?php echo $row["category_name"]; ?></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td>
             <td> <button type="submit" name="submit" style="background-color: darkgreen;color: white"><a style="color: white" href="addfooditems.php?category_id=<?php echo  $row['category_id']?> ">ADD ITEMS</button></td></form>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td> <button type="submit" style="background-color:darkred;color: white"><a href="deletefoodcategory.php?category_name=<?php echo  $row['category_name']?>" style="color: white">DELETE</a></button>

                </tr>
         <?php
     }
    ?>
        </table>
        </div>
</body>
</html>
