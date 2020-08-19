

<?php

$servername = "127.0.0.1";
$username = "root";
$password = "password";
$db = "final_project_database";
// create connection
$connection =  mysqli_connect($servername,$username,$password,$db);
 // check connection
if(!$connection){
    echo "Connection failed: " . mysqli_connect_error();
}
else{
    echo "The connection was successful";
 }

 $sql = "SELECT id, pet_name, breed, age, comments, image, date_added, gender, size, adopt_status FROM content";
 //$result = $conn->query($sql);
 $result = mysqli_query($connection,$sql);


 if (mysqli_num_rows($result) > 0) {
     //output data of each row
     while($row = mysqli_fetch_assoc($result)){
         echo "id: " . $row["id"]. $row[" pet_name "] .$row["breed"]. $row[" "] . $row["age"].$row["comments"].$row["image"].$row["date_added"].$row["gender"]. $row["size"].$row["adopt_status"]. "<br>";
     }
 }
 else {
     echo "0 results";
 }
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
<?php include("nav.php"); ?>






<?php include("footer.php"); ?>

</body>
</html>