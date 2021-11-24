<?php

session_start();
require "function.php";
$db = mysqli_connect("localhost","root","","tasteohub");

$name = "";
$desc = "";
$category = "";
$price = "";
$id = "";

if($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(isset($_GET['fid']) && preg_replace("#[^0-9]#", "", $_GET['fid']) != "") {

        $fid = preg_replace("#[^0-9]#", "", $_GET['fid']);

        if($fid != "") {

            $get_detail = $db->query("SELECT * FROM food_item WHERE food_item_id='".$fid."' LIMIT 1");

            if($get_detail->num_rows) {

                while($row = $get_detail->fetch_assoc()) {
                    $pic = $row['fooditemimage'];
                    $id = $row['food_item_id'];
                    $name = $row['name'];
                    $desc = $row['description'];
                    $price  = $row['price'];

                }

            }
            /*else{

                header("location: index.php");

            }*/

        }

    }else{

        header("location: index.php");

    }

}elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['submit'])) {

        $id = preg_replace("#[^0-9]#", "", $_POST['fid']);
        $qty = preg_replace("#[^0-9]#", "", $_POST['amount']);

        header("location: basket.php?fid=".$id."&qty=".$qty."");

    }

}

?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>

    <title>MFORS</title>

    <link rel="stylesheet" href="mainn.css" />

    <script src="js/jquery.min.js" ></script>

    <script src="js/myscript.js"></script>

</head>
<p align="left"><a href="menu.php" style="color: black">Go Back</a></p>

<body>

<!-- <?php require "header.php"; ?> -->

<!--<div class="parallax" onclick="remove_class()">

	<div class="parallax_head">

		<h2>Meal</h2>
		<h3>Description</h3>

	</div>

</div>--><br/><br/><br/>

<div class="content remove_pad" onclick="remove_class()">

    <div class="inner_content on_parallax">

        <h2>Food Description</h2>

        <div class="parallax_content">

            <div class="detail_holder">

                <div class="detail_img">

                    <img src="<?php echo $pic;?>" width="100%" alt="no image found" />

                </div>

                <div class="detail_desc">

                    <form class="" method="post" action="detail.php">

                        <h3 class="desc_header"><?php echo $name; ?></h3>
                        <p class="desc_detail"><?php echo $desc; ?> </p>
                        <p><span class="bold_desc price">Price:</span> #<span id="price"><?php echo $price; ?></span></p>
                        <div class="form_group">

                            <p><span class="bold_desc">Quantity:</span></p>
                            <p class="label_center"><label class="subtract" onclick="decrementValue(<?php echo $price; ?>)">-</label><input readonly type="text" id="number" name="amount" value="1"><label class="add" onclick="incrementValue(<?php echo $price; ?>)">+</label><p>

                        </div>

                        <p><span class="bold_desc">Total Price:</span><input readonly type="text" id="total_price" value="<?php echo $price; ?>"></p>

                        <div class="form_group">
                            <input type="hidden" name="fid" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" class="submit add_order" value="Add to Order" />

                        </div>

                    </form>

                </div>

                <p class="clear"></p>

            </div>

        </div>

    </div>

</div>

<div class="content" onclick="remove_class()">

    <div class="inner_content">




        </div>

    </div>

</div>

<div class="footer_parallax" onclick="remove_class()">

    <div class="on_footer_parallax">

        <p>&copy; <?php echo strftime("%Y", time()); ?> <span>MyRestaurant</span>. All Rights Reserved</p>

    </div>

</div>

</body>

</html>

<script>
    function incrementValue(price)
    {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            document.getElementById('number').value = value;
            document.getElementById('total_price').value=value*price;
        }
    }
    function decrementValue()
    {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            document.getElementById('number').value = value;
            document.getElementById('total_price').value=document.getElementById('total_price').value-100;
        }

    }


</script>
