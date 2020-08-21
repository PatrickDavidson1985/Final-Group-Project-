<?php
//Database Connection
$serverpet_name = "localhost";
$userpet_name = "root";
$password = "activesubwoofer2015";
$dataBase = "final_project_database";

$conn = mysqli_connect($serverpet_name,$userpet_name,$password,$dataBase);
if(!$conn){
    echo "Connection failed:" . mysqli_connect_error();
}
else{
    // echo "<h2>the connection was successful!</h2>";
}
//Get ID from Database
if(isset($_GET['edit_id'])){
 $sql = "SELECT * FROM content WHERE id =" .$_GET['edit_id'];
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
}

if (isset($_GET['edit_id'])) {
    
    $update = true;
    $record = mysqli_query($conn, "SELECT * FROM content WHERE id =" .$_GET['edit_id']);

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $pet_name = $n['pet_name'];
        $breed = $n['breed'];
        $age = $n['age'];
        $comments = $n['comments'];
        $image = $n['image'];
        $date_added = $n['date_added'];
        $gender = $n['gender'];
        $size = $n['size'];
        $adopt_status = $n['adopt_status'];
        
    }
}
//Update Information
if(isset($_POST['btn-update'])){
 $pet_name = $_POST['pet_name'];
 $breed = $_POST['breed'];
 $age = $_POST['age'];
 $comments = $_POST['comments'];
 $image = $_POST['image'];
 $date_added = $_POST['date_added'];
 $gender = $_POST['gender'];
 $size = $_POST['size'];
 $adopt_status = $_POST['adopt_status'];

 $update = "UPDATE content SET pet_name='$pet_name', breed='$breed', age='$age',comments='$comments', image='$image',date_added='$date_added',gender='$gender',size='$size',adopt_status='$adopt_status' WHERE id =".$_GET['edit_id'];
 $up = mysqli_query($conn, $update);
 
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
 header("location: adminpage.php");
 }
}

?>
<!--Create Edit form -->
<!doctype html>
<html>
    <link rel="stylesheet" href="../styles/edit.css">
<body>

<form method="post">

<h1>Edit Rescue Me!</h1>
<label>pet_name:</label><input type="text" name="pet_name" placeholder="pet_name" value="<?php echo $row['pet_name']; ?>"><br/><br/>
<label>breed:</label><input type="text" name="breed" placeholder="breed" value="<?php echo $row['breed']; ?>"><br/><br/>
<label>age:</label><input type="text" name="age" placeholder="age" value="<?php echo $row['age']; ?>"><br/><br/>
<label>comments:</label><input type="text" name="comments" placeholder="comments" value="<?php echo $row['comments']; ?>"><br/><br/>
<label>image: <img src="<?php echo $row ['image'] ?>" alt=""></label><input type="text"   name="image" width="200" height="100"   value="<?php echo $row['image']; ?>"><br/><br/>
<label>date_added:</label><input type="date" name="date_added" placeholder="date_added" value="<?php echo $row['date_added']; ?>"><br/><br/>
<label>gender:</label><input type="text" name="gender" placeholder="gender" value="<?php echo $row['gender']; ?>"><br/><br/>
<label>size:</label><input type="text" name="size" placeholder="size" value="<?php echo $row['size']; ?>"><br/><br/>
<label>adopt_status:</label><input type="text" name="adopt_status" placeholder="adopt_status" value="<?php echo $row['adopt_status']; ?>"><br/><br/>

<a href="adminpage.php"><button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button></a>

<a href="adminpage.php"><button type="button" value="button">Cancel</button></a>
</form>

<!-- Alert for Updating -->
<script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script>
</body>
</html>