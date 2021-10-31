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
        background-image: url("addfoodcategory.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
<div class="topnav">
    <a class="active" href="adminhomepage.php">Add Image</a>
    <a href="adminofferpage.php">Offers</a>
    <a href="#contact">Add Slot</a>
    <a href="#about">Car-dining</a>
    <a href="#about">Outside-dining</a>
    <a href="addfoodcategory.php">Home-delivery</a>
    <a href="#about">Orders</a>
    <a href="dboyreg.php">Delivery boys</a>
    <a href="#about">Report</a>
    <a href="login.php">Logout</a>
</div>




        <script type="text/javascript">
            document.getElementById("myButton").onclick = function () {
                location.href = "menu.html";
            };
        </script>


<form method="post" action="insertfoodcategory.php">

    <div class="container">
    <h1><center>ADD FOOD CATEGORY</center></h1><br><br>

    <p align="center">Category Name
    <input type="text" name="category_name" placeholder="Category Name" required><br><br>
    <p align="center">

        <input type="file" name="category_image" required></p>
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
             <td> <button type="submit" name="submit"><a href="addfooditems.php?category_id=<?php echo  $row['category_id']?> ">ADD ITEMS</button></td></form>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td> <button type="submit" style="background-color: #0c4128"><a href="deletefoodcategory.php?category_image=<?php echo  $row['category_image']?>" style="color: white">DELETE</a></button>

                </tr>
         <?php
     }
    ?>
        </table>
        </div>
</body>
</html>
