<?php
if(isset($_POST['submit'])) {

    $category_name = $_POST['category_name'];
    $category_image = $_FILES['category_image'];


    $img_loc = $_FILES['category_image']['tmp_name'];
    $img_name = $_FILES['category_image']['name'];
    $img_des = "food/" .$img_name;
    move_uploaded_file($img_loc,'food/'.$img_name);


    $sql = "INSERT INTO food_category (category_id,category_name,category_image) VALUES ('','$category_name','$img_des')";


    $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

    if (mysqli_query($conn, $sql)) {
        $message = "successful...";

        echo "<script type='text/javascript'>alert('successful...\\n Category added');
window.location.href='addfoodcategory.php';</script>";

    }
}



?>
