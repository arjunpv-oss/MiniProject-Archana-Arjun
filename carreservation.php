

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
        background-size: cover;
        alignment: center;
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
            <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "tasteohub";


            $conn=mysqli_connect($host,$user,$pass,$db);
            if(!$conn){
                die('Could not connect to mysql: ' .mysql_error());
            }



            $query="SELECT ddate FROM demo WHERE id=(SELECT max(id) FROM demo)";

            $record=mysqli_query($conn,$query);
            if(mysqli_num_rows($record) > 0)
            {
                while ($row = mysqli_fetch_assoc($record))
                {
                    $d=$row['ddate'];

                    $records = mysqli_query($conn,"select * from creservation where date_res='$d'");


            if(isset($_POST['submit'])) {




                $guest = preg_replace("#[^0-9]#", "", $_POST['guest']);

                $time = $_POST['time'];
                $slot=$_POST['slot'];
                $name=$_POST['name'];
                $suggestions = $_POST['suggestions'];
                $dining='Car-dining';
                $status='Reserved';



                $insert ="INSERT INTO creservation(no_of_guest,slot_number, name, date_res, time, suggestions,status) VALUES('$guest', '$slot','$name','$d', '$time', '$suggestions','$status')";

                $conn = mysqli_connect('localhost', 'root', '', "tasteohub");
                $add="update addslot set status='Reserved' where slot_number='$slot'";
                //$insert1 ="INSERT INTO reservation(dining_type,no_of_guest,slot_number, name, date_res, time, suggestions) VALUES('$dining','$guest', '$slot','$name','$d', '$time', '$suggestions')";


                if (mysqli_query($conn, $insert)) {
                    $message = "successful...";

                    if (mysqli_query($conn, $add)) {


                        echo "<script type='text/javascript'>alert('successful...\\n REserved');
              window.location.href='carreservation.php';</script>";

                    }

                }





            }else{

                $msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";




            }


            ?>




                    <?php
                }
            }



            ?>

            <center>
                <p style="color: black" >Time
                    <select name="time" id="time" style="width: 250px; height: 40px" required></center>
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
                        $query= "SELECT time FROM workingtime where time not in(select status='Available' from creservation where date_res='$d')" ;
                        //"SELECT slot_number FROM addslot WHERE dining_type='Car-dining' and status='Available' and slot_number NOT IN ( SELECT slot_number FROM addslot  WHERE addslot.slot_number = reservation.slot_number)";


                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                ?>
                                <option>
                                    <?php echo $row['time'] ?></option>
                                <?php
                            }
                        }

                        ?>

                    </select></p>

                <br>


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
            $query="SELECT slot_number FROM addslot where dining_type='Car-dining' and status='Available' 
                                  and slot_number in(select status='Available' from creservation where date_res='$d')" ;



            //"SELECT slot_number FROM addslot WHERE dining_type='Car-dining' and status='Available' and slot_number NOT IN ( SELECT slot_number FROM addslot  WHERE addslot.slot_number = reservation.slot_number)";


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





            <?php


            //$sql="SELECT time FROM workingtime WHERE time NOT IN ( SELECT time FROM reservation  WHERE workingtime.time = reservation.time)";
            //$result=mysqli_query($conn,$sql);
            //if(mysqli_num_rows($result))
            //{
            //  while ($row = mysqli_fetch_assoc($result))
            //{
            //
            // }
            //}
            ?>




            <div class="left">

                <div class="form_group">

                    <br><center> <label>Name</label>
                        <input type="text" placeholder="Name" min="1" name="name" id="name" style="width: 480px;height: 30px" required><br></center>

                </div>





                <div class="left">

                <div class="form_group">

                    <br><center> <label>No of Guest</label>
                        <input type="number" placeholder="How many guests" min="1" name="guest" id="guest" style="width: 480px;height: 30px" required><br></center>

                </div>




            </div>

            <div class="left">

                <div class="form_group">

                    <br><center><label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label>
                        <br> <br><center><textarea name="suggestions" placeholder="your suggestions" cols="40" rows="5" style="width: 520px;alignment: center"></textarea></center>

                </div>

                <div class="form_group">

                    <br><center><input type="submit" class="submit" name="submit" style="background-color: green;color: white" value="MAKE YOUR BOOKING" /></center>

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
