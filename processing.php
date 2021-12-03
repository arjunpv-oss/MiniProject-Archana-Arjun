
<?php



if ($_GET['op']=="process")
{

    $name=$_GET['name'];
    $id=$_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', "tasteohub");
    $result="UPDATE basket SET status='processing' WHERE id = '$id'";
    $run = mysqli_query($conn, $result);
    if($run)
    {

    }



}
?>

</html>