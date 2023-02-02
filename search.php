<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<?php
$keyword = $_POST['str'];

//connect to the database
$conn = new mysqli('localhost', 'root', '', 'sunday_suspense');

if(isset($keyword) && !empty($keyword)){
    //query to search for keyword in the "items" table
    $sql = "SELECT * FROM videos WHERE title LIKE '%$keyword%'";
    $result = $conn->query($sql);
    echo '<div class="container mt-5"><h3>Stories Related To Keyword: '. $keyword.'</h3></div>';
    if ($result->num_rows > 0) {
        echo "<table class='table table-striped container mt-5'>";
        echo "<tr class='p-3 mb-2 bg-dark text-white'>
        <th>ID</th>
        <th>Story Title</th>
        <th>Listen Now</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
    echo "<td>" .  $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    ?>
    <td>
        <a href="play.php?id=<?php echo $row['videolink'];?>" target="_blank">Listen Now</a>
    </td>
    <?php
    echo "</tr>";
        }
    } else {
        echo "No results found.";
    }
}
else {
    echo "Please provide a keyword to search.";
}

$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
