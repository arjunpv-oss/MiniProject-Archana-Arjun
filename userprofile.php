<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>User profile</title>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/style.css">
</head>
<?php
$url='localhost';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,'',"tasteohub");
session_start();
$id=$_SESSION['ID'];
$query=mysqli_query($conn,"SELECT * FROM register where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
?>
<h1>User Profile</h1>
<div class="profile-input-field">
    <h3>Please Fill-out All Fields</h3>
    <form method="post" action="#" >
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your Firstname" value="<?php echo $row['first_name']; ?>" required />
        </div>
        <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="lname" style="width:20em;" placeholder="Enter your Lastname" value="<?php echo $row['last_name']; ?>" required />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Enter your Email"  value="<?php echo $row['email']; ?>" required/>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>
        </div>
        <div class="form-group">
            <label>Area</label>
            <input type="number" class="form-control" name="area" style="width:20em;" placeholder="Enter your Area" value="<?php echo $row['area']; ?>">
        </div>
        <div class="form-group">
            <label>Phonenumber</label>
            <input type="number" class="form-control" name="phno" style="width:20em;" placeholder="Enter your Phonenumber" value="<?php echo $row['phonenumber']; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
                <a href="logout.php">Log out</a>
            </center>
        </div>
    </form>
</div>
</html>
<?php
if(isset($_POST['submit'])){
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $phonenumber = $_POST['phonenumber'];
    $query = "UPDATE register SET first_name = '$first_name', last_name='$last_name',
                      email = '$email', address = '$address',area = $area,phonenumber='$phonenumber'
                      WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
        alert("Update Successfull.");
        window.location = "userlogin.php";
    </script>
    <?php
}
?>