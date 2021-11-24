<?php

session_start();
require "function.php";

//error_reporting(0);


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['fid']) && isset($_GET['qty'])) {
    $fid = $_GET['fid'];
    $qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
    $wasFound = false;
    $i = 0;
    // If the cart session variable is not set or cart array is empty
    if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
        // RUN IF THE CART IS EMPTY OR NOT SET
        $_SESSION["cart_array"] = array(0 => array("item_id" => $fid, "quantity" => $qty));
    } else {

        $qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;

        // RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
        foreach ($_SESSION["cart_array"] as $each_item) {
            $i++;
            foreach ($each_item as $key => $value){
 $$key = $value;
                if ($key == "item_id" && $value == $fid) {
                    // That item is in cart already so let's adjust its quantity using array_splice()
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $fid, "quantity" => $each_item['quantity'] + $qty)));
                    $wasFound = true;
                } // close if condition
            } // close while loop
        } // close foreach loop

        if ($wasFound == false) {
            array_push($_SESSION["cart_array"], array("item_id" => $fid, "quantity" => $qty));
        }
    }
    header("location: basket.php");
    exit();
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}

//if (isset( $_GET['cmd'] )== "checkout" ){

  //  $name=$_POST['foodName'];
    //$p=$_POST['price'];
  //  $q=$_POST['quantity'];
   //  $total=$_POST['pricetotal'];

   //  $sql="INSERT INTO food_order(food_order_id,name,price,quantity,total)VALUES('','$name','$p','$q','$total')";
   //  $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

   //  if (mysqli_query($conn, $sql)) {
      //   $message = "successful...";

//     echo "<script type='text/javascript'>alert('successful...\\n REserved');
         //      window.location.href='contactinfo.php';</script>";

      //   }

// }












/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
    $key_to_remove = $_POST['index_to_remove'];
    if (count($_SESSION["cart_array"]) <= 1) {
        unset($_SESSION["cart_array"]);
    } else {
        unset($_SESSION["cart_array"]["$key_to_remove"]);
        sort($_SESSION["cart_array"]);
    }
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = 0;
$chkbtn = "";
$empty_cart = "";
$chkprice = "";
$product_id_array = "";

if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>";

}else{

    $cartOutput = "<div class='single_order_head'>
				
							<h3>Food</h3>
							<h3>Price(N)</h3>
							<h3>Qty</h3>
							<h3>Total</h3>
							<h3>Remove</h3>
							
						</div>";


    $i = 0;
    $user_name=$_SESSION['username'];
    $db = mysqli_connect("localhost","root","","tasteohub");
    $sql = $db->query("SELECT * FROM register WHERE User_Name='$user_name' LIMIT 1");
    $user = $sql->fetch_assoc();
    $uname=$user['First_Name'];
    $ulastname=$user['Last_Name'];
    $uadd=$user['Address'];
    $umail=$user['Email'];
    $uphone=$user['Phonenumber'];



    foreach ($_SESSION["cart_array"] as $each_item) {
        $item_id = $each_item['item_id'];
        $sql = $db->query("SELECT * FROM food_item WHERE food_item_id='$item_id' LIMIT 1");
        while ($row = $sql->fetch_assoc()) {

            $foodName = $row['name'];
            $price = $row['price'];

        }
        $pricetotal = $price * $each_item['quantity'];
        $cartTotal = $pricetotal + $cartTotal;

        // Dynamic Checkout Btn Assembly
        $x = $i + 1;

        $empty_cart = '<div class="empty_cart">
				
								<a href="basket.php?cmd=emptycart">Empty Basket</a>
								
							</div>';

        $chkbtn = '<div class="checkout">
				
							<a href="#" onclick="show_overlay(); return false">Checkout</a></div>
						';

        // Create the product array variable
        $product_id_array .= "$foodName-".$each_item['quantity'].", ";

        $cartOutput .= '<form style="display: inline; padding: 0; margin: 0;" action="basket.php" method="post">
			
				<div class="single_order">
					
					<p>' . $foodName . '</p>
					<p>' . $price . '</p>
					<p>' . $each_item['quantity'].'
					</p>
					<p id="ajax_qty_'.$item_id.'">'.$pricetotal.'</p>
					<p><input  name="deleteBtn' . $item_id . '" class="remove" onclick="return verify_choice();" type="submit" value="x"  /><input name="index_to_remove" type="hidden" value="' . $i . '" /></p>
					
				</div>
			
			</form>';

        $chkprice .= '<input type="hidden" id="chkprice" name="chkprice" value="'.$cartTotal.'" />';
        $chkfood = '<input type="hidden" id="chkfood" name="chkfood" value="'.$product_id_array.'" />';

        $i++;
    }

    $cartTotal = '<p class="p_total"><span>Basket Total</span> : #<span id="cart-total">'.$cartTotal.'</span></p>';

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

    <script src="jquery-3.6.0.min.js" ></script>
    <script src="jquery.min.js"></script>
    <script src="myscript.js" rel="text/javascript"></script>

</head>
<p align="left"><a href="menu.php" style="color: black">Go Back</a></p>
<body>


<div class="parallax_basket" onclick="remove_class()">

    <div class="parallax_head_basket">

        <h2>Your</h2>
        <h3>Basket</h3>

    </div>

</div>

<div class="content remove_pad" onclick="remove_class()">

    <div class="inner_content on_parallax">

        <h2>Food Basket</span></h2>

        <div class="order_holder">

            <?php echo $cartOutput; ?>

        </div>

        <?php echo $cartTotal; ?>

        <div class="checkout_section">

            <?php echo $empty_cart; ?>

            <?php echo $chkbtn; ?>

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

<!---------Contact Information---------->

<div class="overlay" id="overlay" onclick="hide_overlay()"></div>

<div class="info_holder">

   <p align="right"> <button style="color: black;width: 20px;background-color: darkred;color: white" onclick="hide_overlay()" >x</button></p>

    <h2>Complete Your Order</h2>

    <form method="post" action="" onSubmit="validate_input(); return false">
        <div class="form_group">

            <div class="form_group">

                <label>Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo $uname.' '.$ulastname ;?>" required>

            </div>

            <div class="form_group">

                <label>Address</label>
                <input type="text" id="addr"  name="addr" placeholder="Enter your address" value="<?php echo $uadd ;?>" required>

            </div>

            <div class="form_group">

                <label>Email</label>
                <input type="Email" id="email" name="email" placeholder="Enter your email" value="<?php echo $umail ;?>" required>

            </div>

            <div class="form_group">

                <label>Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $uphone ;?>" required>

                <?php echo $chkfood; ?>

                <?php echo $chkprice; ?>

            </div>

            <div class="form_group" >

                <br><br><center> <button type="submit" class="submit" value="PLACE ORDER" style="width:1000px;height:40px;background-color: orangered;color: white">PLACE ORDER</button></a></center>
            </div>

        </div>

    </form>

</div>

</body>

</html>
<script>

    function toggle_class() {

        $(".responive_nav").toggleClass("nav_open");

    }

    function remove_class() {

        $(".responive_nav").removeClass("nav_open");

    }

    function verify_choice() {

        return confirm("Are you sure you want to remove this item from the cart?");

    }

    function show_overla() {

        $("#overlay").fadeIn("slow");
        $(".info_holder").fadeIn("slow");

    }

    function hide_overlay() {

        $("#overlay").fadeOut("slow");
        $(".info_holder").fadeOut("slow");

    }

    function validate_input() {

        cname = $("#name").val();
        caddr = $("#addr").val();
        cemail = $("#email").val();
        cphone = $("#phone").val();
        cfood = $("#chkfood").val();
        cprice = $("#chkprice").val();

        if(cname != "" && caddr != "" && cemail != "" && cphone != "") {
            $.ajax({
                //window.alert();
                url: 'process_order.php',
                type: 'post',
                data: {order_info: 'info', name: cname, addr: caddr, email: cemail, phone: cphone, food: cfood, price: cprice},
                 sucess: function(data) {

                    if(data == 'success') {

                        window.location = "summary.php";

                    }else{

                        alert(data);

                    }

                }
            });

        }else{

            alert('Incomplete form data');

        }

    }

    function update_qty(id, cartTotal, priceTotal) {

        var qty = document.getElementById(id).value;
        var price = 'ajax_qty_'+id;

        $.ajax({

            url: 'process_order.php',
            type: 'post',
            data: {item_id_qty : qty},
            success: function(data) {
                //alert(data);
                document.getElementById(price).innerHTML = data;
                location.reload();
            }
        });

    }
</script>