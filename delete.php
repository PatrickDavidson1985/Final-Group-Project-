<?php

$serverpet_name = "localhost";
$userpet_name = "root";
$password = "activesubwoofer2015";
$dataBase = "final_project_database";

$conn = mysqli_connect($serverpet_name,$userpet_name,$password,$dataBase);
if(!$conn){
    echo "Connection failed:" . mysqli_connect_error();
}
else{
    echo "<h2>the connection was successful!</h2>";
}



$id = $_GET['delete_id']; // get id through query string

$del = mysqli_query($conn,"delete from content where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:adminpage.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>