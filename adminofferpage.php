

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
  }

  .topnav a {
    float:left;
    color: #f2f2f2;
    text-align: center;
    padding: 16px 20px;
    text-decoration: none;
    font-size: 26px;
  }

  .topnav a:hover {
    background-color: #ddd;
    color: orangered;
  }



  body{
    background-image: url("adminofferimage.jpg");
    background-repeat: no-repeat;
    background-size: cover;
  }

  .adminofferpage-form input{
    font-size: 10px;
    width: 100px;

  }

</style>





<body>
<div class="topnav">
  <a class="active" href="adminhomepage.php">Add Image</a>
  <a href="adminofferpage.php">Offers</a>
  <a href="adminaddslot.php">Add Slot</a>
  <a href="#about">Car-dining</a>
  <a href="#about">Outside-dining</a>
  <a href="addfoodcategory.php">Home-delivery</a>
  <a href="#about">Orders</a>
  <a href="dboyreg.php">Delivery boys</a>
  <a href="#about">Report</a>
  <a href="login.php">Logout</a>
</div>

<div style="padding-left:16px">


</div>

<div align="center">
  <div class="adminofferpage-form">



  <center><h1 >OFFERS</h1></center><p align="right"><a href="viewoffer.php">VIEW ALL</a></p>


  <form method="post">



   <b>category Name</b>
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

        </select>   <br><br> <br> <b>Offer percentage</b>
          <input type="number" name="offerpercentage" style="width: 480px;height: 30px" placeholder="offer percentage(%)" required></p><br>
      <b>Valid From</b>
          <input type="date" name="validfrom" style="width: 520px;height: 30px" placeholder="valid from" required></p>
      <br>
     <b>Valid To</b>
          <input type="date" name="validto" style="width: 550px;height: 30px" placeholder="valid to"  required></p>
      <br>
      <b>Coupon code</b>
          <input type="text" name="couponcode" style="width: 510px;height: 30px" placeholder="coupon code" required ></p><br>

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
