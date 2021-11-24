

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amin view cardining</title>
    <link rel="stylesheet">
</head>

<style>

    .topnav {
        overflow: hidden;
        background-color: green;
        width: 1600px;
        height: :40px;
        border-bottom: 10px;

    }

    .topnav a {
        float:left;
        color: #f2f2f2;
        text-align: center;
        padding: 16px 20px;
        text-decoration: none;
        font-size: 23px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: orangered;
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
        height: 80px;
        margin: 10px;
        padding: 10px;
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
</style>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Adminoutsidedining</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
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

        </li>
        <li><a href="#about">Report</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>






<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">



                    <center> <h4>CAR DINING RESERVATIONS</h4>  <button style="color: white;background-color: green"><a style="background-color: green;color: white;alignment: right" href="admincarbook.php" >BOOK SLOT</a></button></td>
                    </center><br>


                </div>
                <div class="card-body">

                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Click to Filter</label> <br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-borderd">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Number of Guest</th>
                            <th>Name</th>
                            <th>Slot Number</th>
                            <th>Time</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $con = mysqli_connect("localhost","root","","tasteohub");

                        if(isset($_GET['from_date']) && isset($_GET['to_date']))
                        {
                            $from_date = $_GET['from_date'];
                            $to_date = $_GET['to_date'];

                            $query = "SELECT * FROM creservation WHERE date_res BETWEEN '$from_date' AND '$to_date' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['date_res']; ?></td>
                                        <td><?= $row['no_of_guest']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['slot_number']; ?></td>
                                        <td><?= $row['time']; ?></td>


                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Reservation Found";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>













