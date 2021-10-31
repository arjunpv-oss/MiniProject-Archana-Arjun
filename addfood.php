<?php
$con = mysqli_connect("localhost","root","","tasteohub");

if (isset($_POST['upload'])){
    $ID=$_POST['quantity'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];

    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc,'uploadimage/'.$img_name);

    //insert data


    $sql = "select * from food_item where (Name='$NAME')";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res)) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if ($NAME == $row['name']) {
            $message = "failed...";

            echo "<script type='text/javascript'>alert('failed...\\nItem already exists');
            window.location.href='addfooditems.php';</script>";
        }
    } else {


        //insert data
        $sql = "INSERT INTO food_item( 'food_item_id','category_id','fooditemimage',`name`, `price`, `quantity`) VALUES ('',''$NAME','$PRICE','$img_des')";
        $result = mysqli_query($con, $sql);

        echo "<script type='text/javascript'>alert('successful...\\n Category added');
window.location.href='index.php';</script>";

        if (mysqli_query($con, $sql)) {
            $message = "successful...";

            echo "<script type='text/javascript'>alert('successful...\\n Category added');
window.location.href='index.php';</script>";

        }
    }
    $con->close();
}
?>