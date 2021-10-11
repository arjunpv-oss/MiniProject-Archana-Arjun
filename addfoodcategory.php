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

    $category_name = $_POST['category_name'];
    $category_image = $_POST['category_image'];




        $sql = "INSERT INTO food_category (category_id,category_name,category_image) VALUES ('','$category_name','$category_image')";


        $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

        if (mysqli_query($conn, $sql)) {
            $message = "successful...";

            echo "<script type='text/javascript'>alert('successful...\\n Category added');
window.location.href='addfoodcategory.php';</script>";

        }
    }
    $conn->close();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Addfoodcategory</title>

</head>
<style>
    body{
        background-image: url("addfoodcategory.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>

<br>
<br>
<form method="post">
    <p align="left">
        <a href="menu.html" name="back" style="color:blue">Back</a>

        <script type="text/javascript">
            document.getElementById("myButton").onclick = function () {
                location.href = "menu.html";
            };
        </script>





    <h1><center>ADD FOOD CATEGORY</center></h1><br><br>
    <p align="center">Category Name:
    <input type="text" name="category_name" placeholder="Category Name" required><br><br>
    <p align="center">
        <input type="file" name="category_image" required></p>
    </div></p><br>

    <center><button type="submit" name ="submit" value="submit" style=" background-color:darkblue; height: 30px; width: 90px; color:white">Add</button></center>






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
                            <br><br><br><br><h2 class="pull-left"><center>Category List</center></h2><br><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>






    <?php

    $result = mysqli_query($conn,"SELECT * FROM food_category");
    ?>
    <?php
    if (mysqli_num_rows($result) > 0) {
        ?>

        <table class='table table-bordered table-striped' align="center">

            <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td> <button><a href="addfooditems.php?op=add&category_name=<?php echo  $row['category_id']?> ">ADD ITEMS</button></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td> <button style="background-color: #0c4128"><a href="deletefoodcategory.php?op=delete&category_name=<?php echo  $row['category_name']?> " style="color: white">DELETE</a></button>


                </tr>
                <?php
                $i++;
            }
            ?>
        </table>

        <?php
    }
    else{
        echo "No result found";
    }
    ?>
    </div>
    </div>
    </div>
    </div>
</font>
</body>
</html>

</html>
