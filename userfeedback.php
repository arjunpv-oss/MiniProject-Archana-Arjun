<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
        *{box-sizing:border-box;}
        body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px; background-color:#dadada; padding:100px;}
        .form_box{width:400px; padding:10px; background-color:white;}
        input{padding:5px;  margin-bottom:5px;}
        input[type="submit"]{border:none; outlin:none; background-color:#679f1b; color:white;}
        .heading{background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;}
        .shadow{
            -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
            -moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
            box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
        .pic{text-align:left; width:33%; float:left;}
    </style>
<body>
<div class="form_box shadow">
    <form method="post">
        <div class="heading">
            Feedback
        </div>
        <br/>
        <p>What do you think about the quality of our service?</p>
        <div>
            <div class="pic">
                <img src="bad.jpg" alt="" style="width:50px;height: 50px"> <br/>
                <input type="radio" name="quality" value="0"> Bad
            </div>
            <div class="pic">
                <img src="neutral.jpg" alt="" style="width:50px;height: 50px"> <br/>
                <input type="radio" name="quality" value="1"> Okay
            </div>
            <div class="pic">
                <img src="good.jpg" alt="" style="width:50px;height: 50px"> <br/>
                <input type="radio" name="quality" value="2"> Good
            </div>
        </div>
<br>
        <p><br>We care about you and your opinion.<br>Please drop your opinion here </p>
        <textarea name=" suggestion" rows="8" cols="40" required></textarea>
        <input type="submit" name="submit" value="Submit Form">
    </form>
    <?php
    if(isset($_POST["submit"])) {
        $id = $_GET['order'];


        $q_score = $_POST['quality'];
        $feedback_txt = $_POST['suggestion'];
        $conn = mysqli_connect("localhost", "root", "", "tasteohub");


        $sql = "select * from feedback where (orderid='$id')";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            echo "You have already shared a feedback. ";
            ?>
            <a href="userhomepage.php">Go Back</a>
    <?php




        } else {


            $query = "insert into feedback(orderid,quality_score, feedback)values($id,$q_score, '$feedback_txt')";
            $result = mysqli_query($conn, $query);
            if ($result) {


                echo 'Thank you for your feedback. We\'ll appreciate!';
                echo "<script type='text/javascript'>
window.location.href='userhomepage.php';</script>";
            } else
                die("Something terrible happened. Please try again. ");

        }
    }

    ?>
</div>
</body>
</html>