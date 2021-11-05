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


<!--fetch data-->
<div class="container" style="margin-left: 400px">



<table class="table" style="width: 1500px">

    <tbody>


        <?php



    $data="SELECT * FROM food_category";


    $result= mysqli_query($conn,$data);

    while($row=mysqli_fetch_array($result)){
        ?>
        <tr>



            <td><?php echo $row["category_name"]; ?></td>
            <td> <button type="submit" name="submit"><a href="viewitems.php?category_id=<?php echo  $row['category_id']?> ">VIEW ITEMS</button></td></form>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>
