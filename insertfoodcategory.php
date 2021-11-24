<?php
if(isset($_POST['submit'])) {

    $category_name = $_POST['category_name'];



    $sql = "INSERT INTO food_category (category_id,category_name) VALUES ('','$category_name')";


    $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

    if (mysqli_query($conn, $sql)) {
        $message = "successful...";

        echo "<script type='text/javascript'>alert('successful...\\n Category added');
window.location.href='addfoodcategory.php';</script>";

    }
}



?>
