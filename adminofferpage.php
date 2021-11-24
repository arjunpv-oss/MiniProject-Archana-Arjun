

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>adminaddoffer</title>

</head>
<style>



    .topnav {
        overflow: hidden;
        background-color: green;
        width: 1500px;
        height: :40px;
        border-bottom: 10px;

    }

    .topnav a {
        float:left;
        color: #f2f2f2;
        text-align: center;
        padding: 16px 20px;
        text-decoration: none;
        font-size: 25px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: orangered;
    }



    body{
        background-image: url("adminaddimage.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        alignment: center;
    }


    .topnav ul
    {
        display: inline-flex;
        list-style: none;
        color: #fff;



    }
    .topnav ul li
    {

        width: 120px;
        height: 70px;
        margin: 2px;
        padding: 8px;
    }
    .topnav ul li a
    {
        text-decoration: none;
        color: #fff;

    }
    .topnav ul li:hover
    {

        border-radius: 10px;
        background-color: darkolivegreen;
        transition: 0.30s linear;
        color: white;

    }
    .topnav li:hover > a{
        color: lightgreen;
    }
    .sub-menu-1
    {
        display: none;
    }
    .topnav ul li:hover .sub-menu-1
    {
        display: block;
        position: absolute;
        background: rgb(0,100,0);
        margin-top: 15px;
        margin-left: -15px;

    }
    .topnav ul li:hover .sub-menu-1 ul
    {
        display: block;
        margin: 10px;

    }
    .topnav ul li:hover .sub-menu-1 ul li
    {
        width: 150px;
        padding: 10px;
        /*border-bottom: 1px dotted #fff;*/
        background: transparent;
        border-radius: 0;
        text-align: left;
    }

</style>
<body>
<div class="topnav">
    <ul>
        <li><a class="active" href="adminhomepage.php">Add Image</a></li>
        <li><a href="adminofferpage.php">Offers</a></li>
        <li><a href="adminaddslot.php">Add Slot</a></li>
        <li><a href="admincardining.php">Car-dining</a></li>
        <li><a href="adminoutsidedining.php">Outside-dining</a></li>
        <li><a href="addfoodcategory.php">Home-delivery</a></li>
        <li> <a href="adminvieworder.php">Orders</a></li>


        <li style="margin-top: 0px"><a href="#">Delivery boys</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="dboyreg.php">Registration</a></li>
                    <li><a href="deliveryboys.php">Available Delivery Boys</a></li>
                    <li><a href="allocatedeliveryboy.php">Allocation</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#about">Report</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>


<div align="center">
  <div class="adminofferpage-form">



  <p align="right"><a href="viewoffer.php">VIEW ALL</a></p>


  <form method="post">



   <b>Category Name</b><br>
        <select name="category_id" style="width: 500px;height: 30px" required>
            <option disabled selected>-- Select category --</option>
            <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "tasteohub";


            $conn=mysqli_connect($host,$user,$pass,$db);
            // Using database connection file here
            $records = mysqli_query($conn, "SELECT * From food_category");  // Use select query here

            while ($row = mysqli_fetch_assoc($records))
            {
                ?>
                <option value="<?php echo $row['category_id'] ?>">
                    <?php echo $row['category_name'] ?></option>
                <?php
            }

            ?>

        </select>   <br><br> <b>Offer Percentage</b><br>
          <input type="number" name="offerpercentage" style="width: 490px;height: 30px" placeholder="offer percentage(%)" required></p>
      <b>Valid From</b><br>
          <input type="date" name="validfrom" style="width: 500px;height: 30px" placeholder="valid from" required></p>

     <b>Valid To</b><br>
          <input type="date" name="validto" style="width: 500px;height: 30px" placeholder="valid to"  required></p>

      <b>Coupon code</b><br>
          <input type="text" name="couponcode" style="width: 500px;height: 30px" placeholder="coupon code" required ></p>

      <b>Description</b><br>
      <textarea placeholder="Description"    name="description"   cols="40" rows="5" style="width: 500px;alignment: center"></textarea>
          <br><br>


          <button type="submit" name ="submit" value="submit" style="background-color: #0c4128; color: white; width: 100px; height: 50px">ADD OFFER</button>
<?php
          if (isset($_POST['submit'])) {

          $category_id = $_POST['category_id'];
          $offer_percentage = $_POST['offerpercentage'];
          $valid_from = $_POST['validfrom'];
          $valid_to = $_POST['validto'];
          $coupon_code = $_POST['couponcode'];
          $description = $_POST['description'];


          $sql = "INSERT INTO offer (offer_id,category_id,offer_percentage,valid_from,valid_to,coupon_code,description) VALUES ('','$category_id','$offer_percentage','$valid_from','$valid_to','$coupon_code','$description')";


          $conn = mysqli_connect('localhost', 'root', '', "tasteohub");

          if (mysqli_query($conn, $sql)) {
          $message = "successful...";

          echo "<script type='text/javascript'>alert('successful...\\n offer added');
              window.location.href='adminofferpage.php';</script>";

          }


          }


?>


  </form>
      <!DOCTYPE html>
      <html lang="en">
      <head>

          <style type="text/css">
              .bs-example{
                  margin: 20px;
              }
          </style>
          <script type="text/javascript">
              $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();
              });
          </script>
      </head>


      <body>




      <div class="bs-example">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="page-header clearfix">

                      </div>

                  </div>
              </div>
          </div>
      </div>

  </div>
</body>
</html>



</div>
</div>
</body>
</html>
