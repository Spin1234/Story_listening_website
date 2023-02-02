<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunday Suspense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span style="color: yellow;">Sunday</span><span style="color: red;"> সাসপেন্স</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form action="search.php" method="post">
        <input style="border-radius: 5px; outline: none;" type="text" name="str" placeholder="Search">
        <input style="border: none; border-radius: 5px;" type="submit" name="submit" value="Search">
      </form>
    </div>
  </div>
</nav>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images.jpeg" class="d-block w-100" alt="..." style="height: 500px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Radio Mirchi 98.3 FM</h5>
        <p>Listen All Sunday Suspense Stories For Free Online</p>
      </div>
    </div>
   <!-- <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>-->
  </div>
</div>
<div class="container mt-5"><h3>Listen <span style="color: red;">Mirchi</span><span style="color: green;"> Bangla</span> Sunday Suspense All Stories</h3></div>
<div class="container mt-3"><h5><?php if(isset($_GET['page'])){echo "Page No: ". $_GET['page'];} ?></h5></div>
<?php
$con = mysqli_connect("localhost", "root", "", "sunday_suspense");
$sql1 = "SELECT * FROM `videos`";
$result1 = mysqli_query($con,$sql1);
$num = mysqli_num_rows($result1);
$results_per_page = 10;
$number_of_rows = $num; // function to get the total number of rows in the table
$number_of_pages = ceil($number_of_rows / $results_per_page);
//echo $number_of_pages;

if (!isset($_GET['page']) || $_GET['page']<=0) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;
$sql = "SELECT * FROM videos LIMIT " . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);
echo "<table class='table table-striped container mt-5'>";
echo "<tr class='p-3 mb-2 bg-dark text-white'>
        <th>ID</th>
        <th>Story Title</th>
        <th>Listen Now</th>
      </tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .  $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    //echo "<td>" . $row['videolink'] . "</td>";
    ?>
    <td>
        <a href="play.php?id=<?php echo $row['videolink'];?>" target="_blank">Listen Now</a>
    </td>
    <?php
    echo "</tr>";
}
echo "</table>";
echo "<div class='container mt-5'><b>Pages</b></div>";
?>
<div class="container mt-2">
<?php
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a class="container mt-5"  href="index.php?page=' . $page . '">' . $page . '</a> ';
}
?>
</div>
<footer>
    <div style="margin-top: 50px;">
    <center><center>@created by Sayak Pal</center></center>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

