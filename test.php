<?php

//  create connection
$servername = "127.0.0.1";
$username = "root";
$password = "Pat0713Dav!";
$db = "final_project_database";

$connection =  mysqli_connect($servername,$username,$password,$db);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 
 $result = mysqli_query($connection,"SELECT * FROM content");
 
$table_head = "<table border='1'>
 <tr>
 <th>id</th>
 <th>petname</th>
 <th>breed</th>
 <th>age</th>
 <th>comments</th>
 <th>image</th>
 <th>date_added</th>
 <th>gender</th>
 <th>size</th>
 <th>adopt_status</th>
 </tr>";
 $table_body = "";
 while($row = mysqli_fetch_array($result))
 {
 $table_body .= "<tr>";
 $table_body .= "<td>" . $row['id'] . "</td>";
 $table_body .= "<td>" . $row['pet_name'] . "</td>";
 $table_body .= "<td>" . $row['breed'] . "</td>";
 $table_body .= "<td>" . $row['age'] . "</td>";
 $table_body .= "<td>" . $row['comments'] . "</td>";
 $table_body .= "<td>" . $row['image'] . "</td>";
 $table_body .= "<td>" . $row['date_added'] . "</td>";
 $table_body .= "<td>" . $row['gender'] . "</td>";
 $table_body .= "<td>" . $row['size'] . "</td>";
 $table_body .= "<td>" . $row['adopt_status'] . "</td>";
 $table_body .= "</tr>";
 }
 $table_body .= "</table>";
 
 mysqli_close($connection);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rescue Me!</title>
  <link rel="stylesheet" href="finalproject.css">
  <script src="https://kit.fontawesome.com/ffcfe413d5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php include("nav.php");
echo $table_head;
echo $table_body;
?>







<!-- <?php// include("footer.php"); ?> -->

</body>
</html>