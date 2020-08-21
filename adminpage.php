<?php
//Connection for database
$serverName = "localhost";
$userName = "root";
$password = "activesubwoofer2015";
$dataBase = "final_project_database";

$conn = mysqli_connect($serverName,$userName,$password,$dataBase);
if(!$conn){
    echo "Connection failed:" . mysqli_connect_error();
}
else{
    // echo "<h2>the connection was successful!</h2>";
}
//Select Database
$sql = "SELECT * FROM content";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Me!</title>
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="../styles/disp.css">
    <link rel="stylesheet" href="./styles/finalproject.css">
    <script src="https://kit.fontawesome.com/ffcfe413d5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<header><?php include("nav.php"); ?></header>
<body>
    
<h1 align="center">Update Rescue Me!</h1>
<table border="1" align="center" style="line-height:25px; ">
<tr>

<th>id</th>
<th>pet_name</th>
<th>breed</th>
<th>age</th>
<th>comments</th>
<th>image</th>
<th>date_added</th>
<th>gender</th>
<th>size</th>
<th>adopt_status</th>
<th>Update</th>
<th>Delete</th>

</tr>
<?php

//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>

 <tr>
 <td><?php echo $row['id']; ?></td>
 <td><?php echo $row['pet_name']; ?></td>
 <td><?php echo $row['breed']; ?></td>
 <td><?php echo $row['age']; ?></td>
 <td><?php echo $row['comments']; ?></td>
 <td><?php echo $row['image']; ?></td>
 <td><?php echo $row['date_added']; ?></td>
 <td><?php echo $row['gender']; ?></td>
 <td><?php echo $row['size']; ?></td>
 <td><?php echo $row['adopt_status']; ?></td>
 
 <!--Edit & Dletet option -->
 <td><a href="edit.php?edit_id=<?php echo $row['id']; ?>" alt="edit" >Edit</a></td>
 <td><a href="delete.php?delete_id=<?php echo $row['id']; ?>" alt="delete" >Delete</a></td>
 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
</table>

<footer><?php include("footer.php"); ?></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>