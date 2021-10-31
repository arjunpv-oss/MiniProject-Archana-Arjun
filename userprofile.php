

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Doc</title>
    <link rel="stylesheet" href="foodstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        input{
            margin: 10px;
        }
    </style>
</head>
<body>

<?php
$con = mysqli_connect("localhost","root","","tasteohub");
$username=$_GET['username'];

    $Record = mysqli_query($con,"SELECT * FROM register where User_Name='$username'");


    $data = mysqli_fetch_array($Record);

    ?>

    <center>
        <div class="main" style="margin: 200px;">
            <form action="" method="post" enctype="multipart/form-data">

                <label>Firstname</label>
                <input type="text" value="<?php echo $data['First_Name']; ?>" required /><br>

            Lastname
            <input type="text" value="<?php echo $data['Last_Name']; ?>" required /><br>

               Username
                <input type="text" value="<?php echo $data['User_Name']; ?>" required /><br>

                Email
            <input type="text"  value="<?php echo $data['Email']; ?>" required/><br>


            Address
            <input type="text" value="<?php echo $data['Address']; ?>"></textarea><br>

            Area
            <input type="text"  value="<?php echo $data['Area']; ?>"><br>

            Phonenumber
            <input type="text" value="<?php echo $data['Phonenumber']; ?>"><br>

            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>




            </form>
        </div>
    </center>


?>
<!--update code-->

</body>
</html>
















