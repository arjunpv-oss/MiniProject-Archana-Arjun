
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
<p align="left"><a href="userfoodcategory.php">Go Back</a></p>
<p> <center> <h1>ITEMS</h1></center></p><br><br><br>
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



        </tr>
        </thead>
        <tbody>
        <?php
        $con = mysqli_connect("localhost","root","","tasteohub");
        $id=$_GET['category_id'];
        $pic = mysqli_query($con,"SELECT food_item.food_item_id,food_item.name,food_item.price,food_item.quantity,food_item.fooditemimage,food_category.category_id,food_category.category_name from food_item inner join food_category on food_item.category_id=food_category.category_id where food_item.category_id='$id'");


        while ($row = mysqli_fetch_array($pic)){
            ?>

            <tr>

                <td><?php echo $row['category_name'];?></td>



                <td><?php echo $row['name'];?></td>
                <td><img width="150" height="100" src="<?php echo $row['fooditemimage'];?>"></td>


                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['quantity'];?></td>



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

