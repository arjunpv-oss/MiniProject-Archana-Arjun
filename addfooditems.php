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
if ($_GET['op']=="delete")
{
   $category_id=$_POST['category_id'];

    $image = $_POST['image'];
    $name = $_POST['Name'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];




    $sql = "INSERT INTO food_item (food_item_id,category_id,image,name,price,quantity) VALUES ('','','$image','$name','$price','$quantity')";


    $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

    if (mysqli_query($conn, $sql)) {
        $message = "successful...";

        echo "<script type='text/javascript'>alert('successful...\\n Category added');
window.location.href='foodcategory.php';</script>";

    }




$result = mysqli_query($conn,"SELECT * FROM food_item");


if (mysqli_num_rows($result) > 0) {
    ?>

    <table class='table table-bordered table-striped' align="center">

        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row["image"]; ?></td>
                <td><?php echo $row["category_name"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["quantity"]; ?></td>


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


}

$conn->close();


?>

?>
<!
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="deliveryreg.css">
</head>
<style>


    body{
        background-image: url("addfooditems.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>


<a href="menu.html" name="back" style="color:white">Back</a>


<body>

<div align="center">

    <br><br>

    <center><h1 style="color: #6a1a21"><u>ADD FOOD CATEGORY</u></h1></center><br><br><br><br><br>


    <form method="post">

        <div class="container">
            <input type="file" name="image" style="color: #0c0b09" required>
        </div><br><br>

        <p style="color: #0c0b09">Name:
        <input type="text" name="Name" style="width: 300px;height: 30px" placeholder="Name" required></p><br><br>
        <p style="color: #0c0b09">price:
        <input type="text" name="Price" style="width: 300px;height: 30px" placeholder="Price" required></p><br><br>
        <p style="color: #0c0b09">Quality:
        <input type="text" name="Quantity" style="width: 300px;height: 30px" placeholder="Quantity" required></p>
        <br><br><br>

        <button type="submit" name ="submit" value="submit" style="background-color: #0c4128; color: white; width: 100px; height: 50px">Register</button>
    </form>
</div>
</body>
</html>

