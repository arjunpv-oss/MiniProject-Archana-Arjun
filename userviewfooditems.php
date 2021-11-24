
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User view food items</title>
    <link rel="stylesheet">
</head>

<title>user view food items</title>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>user view food items</title>
<link rel="stylesheet" href="mainn.css" />

<script src="jquery.min.js" ></script>

<script src="myscript.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 50px;
    }
</style>

<p align="left"><a href="menu.php" style="color:black">Go Back</a></p>

<?php
$con = mysqli_connect("localhost","root","","tasteohub");


$name = $_GET['name'];

?>
<!--fetch data-->
<div class="container">
    <br><br>

    <?php
    $con = mysqli_connect("localhost","root","","tasteohub");

    $pic = mysqli_query($con,"SELECT food_item.name,food_item.price,food_item.fooditemimage,food_item.description from food_item inner join food_category on food_item.category_id=food_category.category_id where food_category.category_name='$name'");


    while ($row = mysqli_fetch_array($pic)){
        ?>


        <div class="content remove_pad" onclick="remove_class()">

            <div class="inner_content on_parallax">

                <h2><span class="fresh"><?php echo $row['name']?></span></h2>

                <div class="parallax_content">

                    <div class="detail_holder">

                        <div class="detail_img">

                            <img width="150" height="150" src="<?php echo $row['fooditemimage'];?>">
                        </div>

                        <div class="detail_desc">

                            <form class="" method="post" action="">

                                <p style="width: 300px;height: 300px"><span class="bold_desc"><b>Description:</b></span><br><?php echo $row['description']; ?></span></p>


                                <p><span class="bold_desc"><b>Category:</b></span> <?php echo $name; ?></p>
                                <p><span class="bold_desc price"><b>Price:</b></span> #<span id="price"><?php echo $row['price']; ?></span></p>

                                <div class="container">
                                    <input type="button" onclick="decrementValue(<?php echo $row['price']; ?>)" value="-" />
                                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="<?php echo $row['name']; ?>" />
                                    <input type="button" onclick="incrementValue(<?php echo $row['price']; ?>)" value="+" />
                                </div>

                                <p><span class="bold_desc">Total Price:</span> <input type="text" name="quantity" value="<?php echo $row['price']; ?>" maxlength="2" max="10" size="1" id="total_price"> </p>

                                <div class="form_group">

                                    <input type="submit" name="submit" class="submit add_order" value="Add to Order" />

                                </div>


                            </form>

                        </div>

                        <p class="clear"></p>

                    </div>

                </div>

            </div>

        </div>


        <?php

    }
    ?>

</html>
<script>



    function incrementValue(x,y)
    {
        var price=x;
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            document.getElementById('number').value = value;
            document.getElementById('total_price').value=x*value;
        }
    }
    function decrementValue(x)
    {
        var x;
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            document.getElementById('number').value = value;
            document.getElementById('total_price').value=document.getElementById('total_price').value-x;
        }

    }


</script>

