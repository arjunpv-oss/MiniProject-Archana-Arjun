<?php

session_start();

$db = mysqli_connect("localhost","root","","tasteohub");

$bfast = "";
$lunch = "";
$dinner = "";
$special = "";

$get_recent = $db->query("SELECT * FROM food_category");

?>
<div class="parallax" onclick="remove_class()">

    <p align="left"><a href="usercategory.php" style="color: black">Go Back</a></p>
    <div class="parallax_head">
        <p align="right"><a href="basket.php"> <button>CART</button></a></p>
        <h3>FOOD CATEGORIES</h3>


    </div>

</div>
<?php
while($row=mysqli_fetch_array($get_recent)){
    ?>
    <tr>

<br><br><br>

        <td><h2 style="  color: #333;
    margin: 5px auto;
    font-weight: 200;
    text-align: center;
    font-family: lucida handwriting;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;"> <?php echo $row['category_name']?></h2></a></td><br>
        <br></tr>
<?php

$name=$row["category_name"];
$pi = mysqli_query($db,"SELECT food_item.* from food_item inner join food_category on food_item.category_id=food_category.category_id where food_category.category_name='$name'");
while($pic=mysqli_fetch_array($pi)) {
    $view = "<tr><td><div class='parallax_item'>

            <a href='detail.php?fid=" . $pic['food_item_id'] . "'><img src='" . $pic['fooditemimage'] . "' width='80px' height='80px' />
            <div class='detail'>

                <h4>" . $pic['name'] . "</h4>
                <p class='desc'>" . substr($pic['description'], 0, 33) . "...</p>
                <p class='price'>#" . $pic['price'] . "</p>

            </div>
            <p class='clear'></p>
            </a>

        </div></td></tr>";
    echo($view);
}
}
?>
<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>

    <title>Wilton</title>

    <link rel="stylesheet" href="mainn.css" />
    <link rel="stylesheet" href="categorystyle.css">
    <link rel="stylesheet" href="assets/css/main.css" />

    <script src="js/myscript.js"></script>
    <script src="js/jquery.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>

<body>



<div class="content" onclick="remove_class()">

    <div class="inner_content on_parallax">




    </div>

</div>


<!--

<div class="footer_parallax" onclick="remove_class()">

    <div class="on_footer_parallax">

  <font size="10px"></font> <p>&copy; <?php echo strftime("%Y", time()); ?> <span>Wilton Restaurant</span>. All Rights Reserved</p></font>

    </div>

</div>
-->
</body>

</html>