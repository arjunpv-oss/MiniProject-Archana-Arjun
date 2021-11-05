
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add food items</title>
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

    <center><h1 style="color: #6a1a21"><u>ADD FOOD ITEMS</u></h1></center><br>




    <form method="post" >



        <p style="color: black" >category Name
            <select name="category_id"  style="width: 250px; height: 40px" required>
                <option>Select</option>
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
                $food_category_query= "SELECT * FROM food_category";
                $result=mysqli_query($conn,$food_category_query);
                if(mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <option value="<?php echo $row['category_id'] ?>">
                            <?php echo $row['category_name'] ?></option>
                        <?php
                    }
                }
                ?>

            </select></p>








        <br><br>
        <div class="container">


            <input type="file" name="image" style="color: #0c0b09" required>
            <br>


            <p style="color: #0c0b09">Name
                <input type="text" name="name" style="width: 300px;height: 30px" placeholder="Name" required></p><br>
            <p style="color: #0c0b09">price
                <input type="number" name="price" style="width: 300px;height: 30px" placeholder="Price" min="0" max="1000" required></p><br>

            <p style="color: #0c0b09">Quantity
                <input type="number" name="quantity" style="width: 300px;height: 30px" placeholder="Quantity" min="0" max="100" required></p>
            <br><br><br>


            <button type="submit" name ="submit"  style="background-color: #0c4128; color: white; width: 100px; height: 50px">ADD ITEM</button>

        </div>
        <?php
        if (isset($_POST['submit'])) {
            //$category_id=$_POST['category_id'];

            $image = $_POST['image'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $category_id = $_POST['category_id'];

            $IMAGE = $_FILES['image'];

            $img_loc = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $img_des = "uploadimage/".$img_name;
            move_uploaded_file($img_loc,'uploadimage/'.$img_name);



            $sql = "select * from food_item where (name='$name')";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)) {
                // output data of each row
                $row = mysqli_fetch_assoc($res);
                if ($name == $row['name']) {
                    $message = "failed...";

                    echo "<script type='text/javascript'>alert('failed...\\nItem already exists');
            window.location.href='addfooditems.php';</script>";
                }
            } else {


                $sql = "INSERT INTO food_item(food_item_id,category_id,fooditemimage,name,price,quantity) VALUES ('','$category_id','$image','$name','$price','$quantity')";


                $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

                if (mysqli_query($conn, $sql)) {
                    $message = "successful...";

                    echo "<script type='text/javascript'>alert('successful...\\n item added');
window.location.href='addfooditems.php';</script>";

                }
            }
            $conn->close();

        }
        ?>




</form>

</div>


<p style="margin-top: 300px"> <center> <h1>ITEMS</h1></center></p><br><br><br>
<!--fetch data-->
<div class="container">



    <table class="table" style="width: 1500px">
        <thead>
        <tr>

            <th>Category Name</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>

            <th>Delete</th>
            <th>Update</th>


        </tr>
        </thead>
        <tbody>
        <?php
        $con = mysqli_connect("localhost","root","","tasteohub");
        $pic = mysqli_query($con,"SELECT food_item.food_item_id,food_item.name,food_item.price,food_item.quantity,food_item.fooditemimage,food_category.category_id,food_category.category_name from food_item inner join food_category on food_item.category_id=food_category.category_id");


        while ($row = mysqli_fetch_array($pic)){
            ?>

            <tr>

                <td><?php echo $row['category_name'];?></td>



                <td><?php echo $row['name'];?></td>
                <td><img width="150" height="100" src="<?php echo $row['fooditemimage'];?>"></td>


                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['quantity'];?></td>



                <td><button style="color: white;background-color: red"><a style="background-color: red;color: white" href="deletefooditem.php?op=delete&image=<?php echo  $row['fooditemimage']?>">DELETE</a></button></td>
                <td><button style="color: white;background-color: green"><a style="background-color: green;color: white" href="updatefooditem.php?op=update&name=<?php echo  $row['name']?>" >UPDATE</a></button></td>

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

