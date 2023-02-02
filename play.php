<?php
$id=$_GET['id'];
$con = mysqli_connect("localhost", "root", "", "sunday_suspense");
$sql1 = "SELECT * FROM `videos` WHERE videolink='$id'";
$result1 = mysqli_query($con,$sql1);
//$num = mysqli_num_rows($result1);
$row=mysqli_fetch_assoc($result1);
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title'];?></title>
</head>
<body>
<center>
    <p><b>Now Playing</b></p>
    <h1><?php echo $row['title'];?></h1>
    <div style="margin: auto;" data-video="<?php echo $id;?>" data-autoplay="0" data-loop="1" id="youtube-audio"></div>
    <p>If audio player is not loading refresh the page again and again</p>
</center>
<script src="https://www.youtube.com/iframe_api"></script> 
<script src="https://cdn.rawgit.com/labnol/files/master/yt.js"></script>

</body>
</html>-->