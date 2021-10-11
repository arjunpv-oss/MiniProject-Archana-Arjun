<?php

include 'config.inc.php';

$host = "localhost";
$user = "root";
$pass = "";
$db = "tasteohub";


$conn=mysqli_connect($host,$user,$pass,$db);

// Check whether username or password is set from android
if(isset($_POST['username']) && isset($_POST['password']))
{
    // Innitialize Variable
    $result='';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database for row exist or not
    $sql = 'SELECT * FROM login WHERE  username = :username AND password = :password';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    if(mysqli_num_rows($result)==1) {
        session_start();
        $_SESSION['tasteohub'] = 'true';
        header('location:menu.html');
    }
    if($stmt->rowCount())
    {
        $result="true";
    }
    elseif(!$stmt->rowCount())
    {
        $result="false";
    }

    // send result back to android
    echo $result;
}

