

<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>user notification</title>







</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
    }
</style>
<body style="background-color: palegoldenrod">


<p align="left"><a href="userhomepage.php">Go Back</a></p>


</body>
</html>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Could not connect to mysql: ' . mysqli_error());
}

$result = mysqli_query($conn, "SELECT Phonenumber from register WHERE User_Name='" . $_GET['name'] . "'");
$row = mysqli_fetch_array($result);
$ph=$row['Phonenumber'];

$data="Select id,status from basket where contact_number='$ph'";
$result= mysqli_query($conn,$data);

while($row=mysqli_fetch_array($result)){
?>

    <div class="card bg-success text-white" style="border-radius: 25px">



<tr style="background: #0a5275">
    <div class="card-body"><td style="font-color:white">Your Order number <?php echo $row["id"]; ?> has been <?php echo $row["status"]; ?></td><br><br>
   <br>


<?php
        if($row["status"]=="delivered")
        {
            $id=$row["id"];


?>
        <a href="userfeedback.php?order=<?php echo $row["id"]?>" style="color: white">Give feedback</a>
        <?php
        }
        ?>
    </div>
</tr>
    </div>




    <?php
    $sql="select reply from feedbackreply where orderid='$id'";
    $result1= mysqli_query($conn,$sql);

    while($row1=mysqli_fetch_array($result1)){

    ?>

<div class="card bg-success text-white" style="border-radius: 25px">



    <tr style="background: #0a5275">
        <div class="card-body"><td style="font-color:white">Your have a reply from admin<br><br><?php echo $row1['reply']; ?></td><br><br>
            <br>

<?php

            }
}


    ?>

        </div>
