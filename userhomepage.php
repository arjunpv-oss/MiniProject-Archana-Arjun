<?php
$conn = new mysqli('localhost', 'root', '', 'tasteohub')
  or trigger_error('Connection failed.', E_USER_NOTICE);

$conn->set_charset('utf8');
$paths = [];
$dir = "./uploads"; // images directory (change to suit)

$stmt = $conn->prepare("SELECT `file_name` FROM `tbl_images`");
$stmt->execute();
$stmt->bind_result($file);
while ($stmt->fetch()){
  $paths[] = $dir . "/" . $file;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Userhomepage</title>

    <link rel="stylesheet" href="userstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
</label>


<div class="sidebar">
    <header>Taste 'O' Hub</header>
     <ul>
        <li><a href="userprofile.php"><i class=""></i>View Profile</a> </li>
        <li><a href="#"><i class=""></i>Categories</a> </li>
        <li><a href="addslot.php"><i class=""></i>Order history</a> </li>
        <li><a href="#"><i class=""></i>Offers</a> </li>
        <li><a href="#"><i class=""></i>Notifications</a> </li>
        <li><a href="foodcategory.php"><i class=""></i>About Us</a> </li>
        <li><a href="#"><i class=""></i>Share</a> </li>
        <li><a href="#"><i class=""></i>Logout</a> </li>
    </ul>
</div>
  <!-- may set first image src in markup so initially visible -->
  <img id="slide" src="tasteohub.jpg" alt="slideshow" width="350" height="600" style="margin-top: 70px; margin-left: 30px"  align="center">



<script>
var time = 5000,    // time between images
    i = 0,              // index for changing images
    images = [],    // array of img src from PHP
    preloads = [],      // array of preloaded images
    slide = document.getElementById("slide");

images = <?php echo json_encode($paths); ?>; // from PHP to Js array
var len = images.length;

function changeImg(){
  slide.src = preloads[i].src;
  if (++i > len-1){
    i = 0;
  }
  setTimeout(changeImg, time);
}
function preload(){
  for (var c=0; c<len; c++){
    preloads[c] = new Image;
    preloads[c].src = images[c];
  }
}
window.addEventListener("load", function(){
  preload();
  setTimeout(changeImg, time);
});
</script>
</body>
</html>