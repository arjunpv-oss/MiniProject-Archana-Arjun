<?php
if($_POST) {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tasteohub";
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=mysqli_connect($host, $user, $pass, $db);
    $query="SELECT * FROM login WHERE username='$username' and password='$password'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1) {
        session_start();
        $_SESSION['tasteohub'] = 'true';
        header('location:menu.html');
    }

    else {
        $message= "Username and/or password incorrect.\\nTry again";
        echo "<script type='text/javascript'>alert('Invalid username or password');</script>";




    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>

<div class="login-form">
    <h1>Login form</h1>
    <form submit="menu.html" method="POST">
        <p>Username</p>
        <input type="text" placeholder="Enter Username" name="username" required>

        <p>Password</p>
        <input type="password" placeholder="Enter Password" name="password" required><br><br><br>

        <button type="submit" name="submit">Login</button>


    </form>
</div>

</body>
</html>