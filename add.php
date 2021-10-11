<?php

$servername="localhost";
$username="root";
$password="";
$dbname="tasteohub";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

if (isset($_POST['submit']))
{
    $file_name=rand(1000,100000)."_".$_FILES['file_name']['name'];
    $file_loc=$_FILES['file_name']['tmp_name'];
    $folder="uploads/";
    $new_file_name=strtolower($file_name);
    $final_file=str_replace('','_',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $sql="INSERT INTO tbl_images(file_name) VALUES  ('$final_file')";
        mysqli_query($conn,$sql);
        ?>
        <script>
            alert('Successfully Uploaded');
            window.location.href='adminhomepage.php?success';

        </script>
        <?php
    }
    else{
        echo "Error uploads";
    }
}
?>
