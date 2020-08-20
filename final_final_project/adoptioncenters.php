<?php
// $serverName = "localhost";
// $userName = "root"; 
// $password = "password";
// $dataBase = "final_project_database";
// // Create connection
// $db = mysqli_connect('localhost','username','password','database_name');

// if ($db->connect_error){
//     die("Connection failed: ". $db->connect_error);
// } echo "Connected successfully";




?>

<?php

$nameErr = $breedErr = $numberErr = $genderErr = $weightErr = $commentErr = "";
$name = $breed = $number = $gender = $weight = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation of Name
    if (empty($_POST["name"])) {
        $nameErr = "Required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validation of Breed 
    if (empty($_POST["breed"])) {
        $breedErr = "Required";
    } else {
        $breed = test_input($_POST["breed"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $breed)) {
            $breedErr = "Only letters and white space allowed";
        }
    }


    // Validation of Age  
    if (empty($_POST["age"])) {
        $numberErr = "Required";
    } else {
        $number = test_input($_POST["age"]);
        if (!is_numeric($number)) {
            $numberErr = "Only numbers allowed";
        }
    }

    // Validation of Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Required";
    } else {
        $gender = test_input($_POST["gender"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $gender)) {
            $genderErr = "Only letters and white space allowed";
        }
    }

    //Validation of Size
    if (empty($_POST["weight"])) {
        $weightErr = "Required";
    } else {
        $weight = test_input($_POST["weight"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $weight)) {
            $weightErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $comment)) {
            $commentErr = "Only letters and white space allowed";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Centers</title>
    <link rel="stylesheet" href="./Final-Group-Project-/style.css">
    <link rel="stylesheet" href="finalproject.css">
    <script src="https://kit.fontawesome.com/ffcfe413d5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php include("./nav.php"); ?>







        // <!--just a cute image i inserted, we can delete or replace-->     

        <div class="dog-with-ball">
        <img src="./images/dogwithball.png">
    </div>


    <?php include("./form-reg.php");

     include("footer.php"); ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>