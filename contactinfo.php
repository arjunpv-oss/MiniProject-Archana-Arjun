<html>

<head>

    <title>Place order</title>

</head>
<style>

</style>
<div class="overlay" id="overlay" onclick="hide_overlay()"></div>

<div class="info_holder">

    <p class="close_p"><span class="close_sp" onclick="hide_overlay()"></span></p>

    <h2 style=" margin-top: 150px;
    font-family: lucida handwriting;
    text-transform: capitalize;
    font-size: 35px;"><span class="tag">Complete Your Order</span></h2>

    <form method="post" action="" onSubmit="validate_input(); return false">

        <div class="form_group">

            <div class="form_group">

                <label>Name</label>
                <input style="width: 100%;
    border: 1px solid #CCCCCC;
    padding: 7px;
    height: 40px;
    background: #efefef;
    border-radius: 4px;" type="text" id="name" name="name" placeholder="Enter your full name"  required>

            </div>

            <div class="form_group">

                <label>Address</label>
                <input style="width: 100%;
    border: 1px solid #CCCCCC;
    padding: 7px;
    height: 40px;
    background: #efefef;
    border-radius: 4px;" type="text" id="addr"  name="addr" placeholder="Enter your address"  required>

            </div>

            <div class="form_group">

                <label>Email</label>
                <input style="width: 100%;
    border: 1px solid #CCCCCC;
    padding: 7px;
    height: 40px;
    background: #efefef;
    border-radius: 4px;" type="Email" id="email" name="email" placeholder="Enter your email"  required>

            </div>

            <div class="form_group">

                <label>Phone Number</label>
                <input style="width: 100%;
    border: 1px solid #CCCCCC;
    padding: 7px;
    height: 40px;
    background: #efefef;
    border-radius: 4px;" type="text" id="phone" name="phone" placeholder="Enter your phone number"  required>

                <?php


                if(isset($_POST['submit']))
                {





                    $name 		= preg_replace("#[^a-zA-Z ]#", "", $_POST['name']);
                    $addr 		= preg_replace("#[^a-zA-Z0-9 ]#", "", $_POST['addr']);
                    $email 		= htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
                    $phone 		= preg_replace("#[^0-9]#", "", $_POST['phone']);


                    $chkfood = $_GET['food'];
                    $chkprice = $_GET['price'];
                    $db = mysqli_connect("localhost","root","","tasteohub");
                     $insert = $db->query("INSERT INTO basket(customer_name, contact_number, address, email, total, status, date_made) VALUES('".$name."', '".$phone."', '".$addr."', '".$email."', '".$chkprice."', 'pending', NOW())");

                        if($insert) {

                            $ins_id = $db->insert_id;

                            $food_array = explode(",", $chkfood);

                            foreach($food_array as $key => $value) {

                                if(trim($value) != "") {

                                    $exp = explode("-", $value);

                                    $values .= "('".$ins_id."', '".$exp[0]."', '".$exp[1]."'),";

                                }

                            }

                            $values = rtrim($values, ",");

                            $save_item = $db->query("INSERT INTO items(order_id, food, qty) ".$values." ");

                            if($save_item) {

                                $SESSION['order_id'] = "ORD".$ins_id;
                                $_SESSION['name'] = $name;

                                echo "success";

                            }

                        }

                    }else{

                        echo "Incomplete Form Data";


                }
                ?>


            </div>
<br><br>
            <div class="form_group">

                <input style="width: 100%;
    border: 1px solid #CCCCCC;
    padding: 7px;
    height: 40px;
    background: green;
    color: white;
    border-radius: 4px;" type="submit" class="submit" name="submit" value="PLACE ORDER" />

            </div>

        </div>

    </form>
</div>
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

    function show_overlay() {

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
                url: 'process_order.php',
                type: 'post',
                data: {order_info: 'info', name: cname, addr: caddr, email: cemail, phone: cphone, food: cfood, price: cprice},
                success: function(data) {

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





