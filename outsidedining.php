

<?php

session_start();
function excape($string)
{

    echo isset($_POST[$string]) ? htmlentities($_POST[$string], ENT_QUOTES, 'UTF-8') : "";

}

function escape($string)
{

    return htmlentities(trim($string), ENT_QUOTES, 'UTF-8');

}

function generate_option($lower_limit, $upper_limit)
{

    $option = "";

    for ($i = (int)$lower_limit; $i <= (int)$upper_limit; $i++) {

        $option .= "<option value='" . $i . "'>$i</option>";

    }

    return $option;

}

function render_options($qty, $id)
{

    $option = "";

    for ($x = 1; $x <= 50; $x++) {

        if ($x == $qty) {

            $option .= "<option value='" . $x . "_" . $id . "' selected>$x</option>";

        } else {

            $option .= "<option value='" . $x . "_" . $id . "'>$x</option>";

        }

    }

    return $option;

}


$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {


    if(isset($_POST['submit'])) {




        $guest = preg_replace("#[^0-9]#", "", $_POST['guest']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
        $date_res = htmlentities($_POST['date_res'], ENT_QUOTES, 'UTF-8');
        $time = htmlentities($_POST['time'], ENT_QUOTES, 'UTF-8');
        $suggestions = htmlentities($_POST['suggestions'], ENT_QUOTES, 'UTF-8');

        if($guest != "" && $email && $phone != "" && $date_res != "" && $time != "" && $suggestions != "") {

            $check = $conn->query("SELECT * FROM reservation WHERE no_of_guest='".$guest."' AND email='".$email."' AND phone='".$phone."' AND date_res='".$date_res."' AND time='".$time."' LIMIT 1");

            if($check->num_rows) {

                $msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";

            }else{

                $insert = $conn->query("INSERT INTO reservation(no_of_guest, email, phone, date_res, time, suggestions) VALUES('".$guest."', '".$email."', '".$phone."', '".$date_res."', '".$time."', '".$suggestions."')");

                if($insert) {

                    $ins_id = $conn->insert_id;

                    $reserve_code = "UNIQUE_$ins_id".substr($phone, 3, 8);

                    $msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Reservation placed successfully. Your reservation code is $reserve_code. Please Note that reservation expires after one hour</p>";

                }else{

                    $msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Could not place reservation. Please try again</p>";

                }

            }

        }else{

            $msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";

            print_r($_POST);

        }

    }

}

?>

<!Doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>

    <title>User reservation</title>

    <link rel="stylesheet" href="css/main.css" />

    <script src="js/jquery.min.js" ></script>

    <script src="js/myscript.js"></script>

</head>
<style>

    body{
        background-image: url("userreservation.jpg");
        background-repeat: no-repeat;
        background-size: 1500px;

    }
</style>
<body>



<div class="parallax" onclick="remove_class()">

    <div class="parallax_head">

        <center> <h2>Reserve</h2></center>
        <center><h3>Table Space</h3> </center>

    </div>

</div>

<div class="content" onclick="remove_class()">

    <div class="inner_content">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">

            <center> <h2 class="form_head"><span class="book_icon">BOOK A TABLE</span></h2></center>
            <center><p class="form_slg">We offer you the best reservation services</p></center>

            <?php echo "<br/>".$msg; ?>

            <center> <p style="color: black">Choose slot
                    <select name="slot"  style="width: 250px; height: 40px" required></center>
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
            $query= "SELECT slot_number FROM addslot where dining_type='Outside-dining' and status='Available'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <option>
                        <?php echo $row['slot_number'] ?></option>
                    <?php
                }
            }

            ?>

            </select></p>
            <form>
                <div class="form_group">

                    <br><center><label>Date</label>
                        <input type="date" name="date_res" id="date" placeholder="Select date for booking" style="width: 250px;height: 40px" onchange="FetchTime(this.value)" required></center>




                </div>
            </form>

            <p style="color: black" >Time
                <select name="time" id="time" style="width: 250px; height: 40px" required>
                    <option value="">Select</option>




                    <?php


                    $sql="SELECT time FROM workingtime WHERE time NOT IN ( SELECT time FROM reservation  WHERE workingtime.time = reservation.time)";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                    {
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            ?>
                            <option value="<?php echo $row['time'] ?>">
                                <?php echo $row['time'] ?></option>
                            <?php
                        }
                    }
                    ?>


                </select></p>


            <div class="left">

                <div class="form_group">

                    <br><center> <label>No of Guest</label>
                        <input type="number" placeholder="How many guests" min="1" name="guest" id="guest" style="width: 250px;height: 40px" required><br></center>

                </div>

                <div class="form_group">

                    <br>  <center>  <label>Email</label>
                        <input type="email" name="email" placeholder="Enter your email" style="width: 250px;height: 40px" required><br></center>

                </div>

                <div class="form_group">

                    <br>  <center><label>Phone Number</label>
                        <input type="number" name="phone" placeholder="Enter your phone number" max="10" min="10" style="width: 250px;height:40px"  required><br></center>
                    <script>
                        function fncValidate()
                        {
                            var p = document . phone . value;
                            if (isNaN(p)) {
                                alert("Enter only numbers");
                                return false;
                            }
                            if (p == "") {
                                alert("Enter 10 digits");
                                return false;
                            }
                            if (p . length > 10) {
                                alert("Enter 10 digits");
                                return false;
                            }
                            if (p . length < 10) {
                                alert("Enter 10 digits");
                                return false;
                            }
                        }
                    </script>
                </div>




            </div>

            <div class="left">

                <div class="form_group">

                    <br><center><label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label>
                        <br> <br><center><textarea name="suggestions" placeholder="your suggestions" cols="20" rows="5" style="width: 200px;alignment: center" required></textarea></center>

                </div>

                <div class="form_group">

                    <br><center><input type="submit" class="submit" name="submit" style="background-color: green;color: white;width: 250px; height: 50px" value="MAKE YOUR BOOKING" /></center>

                </div>

            </div>


            <p class="clear"></p>


        </form>

    </div>

</div>
<script type="text/javascript">
    function FetchTime(id){
        $('#time').html('');
        $.ajax({
            type:'post',
            url: 'ajaxdata.php',
            data : { 'r_id' : id},
            success : function(data){
                $('#time').html(data);
            }

        })
    }
</script>


</body>

</html>
