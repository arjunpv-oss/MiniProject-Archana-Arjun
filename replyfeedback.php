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
            Feedback Reply
        </div>
        <br/>

        <p>Reply </p>
        <textarea name=" reply" rows="8" cols="40" required></textarea>
        <input type="submit" name="submit" value="Submit Form">
    </form>
    <?php
    $id=$_GET['order'];
    if(isset($_POST["submit"])) {


        $reply = $_POST['reply'];

        $conn = mysqli_connect("localhost", "root", "", "tasteohub");
        $query = "insert into feedbackreply(orderid,reply)values($id,'$reply')";
        $result = mysqli_query($conn, $query);
        if ($result) {


            echo 'Thank you for your feedback. We\'ll appreciate!';
            echo "<script type='text/javascript'>
window.location.href='adminviewfeedback.php';</script>";
        } else
            die("Something terrible happened. Please try again. ");
    }







    ?>
</div>
</body>
</html>