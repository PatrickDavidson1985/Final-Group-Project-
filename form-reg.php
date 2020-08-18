<!-- SECURITY - sanitze input, form submit, database,  -->

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
    <link rel="stylesheet" href="form.css">
    <title>Form Page</title>
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div id="form">
            <div id="name">
                <div class="inputBox">
                    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Dog's Name">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </div>
            </div>
            <br>

            <div id="breed">
                <div class="inputBox">
                    <input type="text" name="breed" value="<?php echo $breed; ?>" placeholder="Dog's Breed">
                    <span class="error">* <?php echo $breedErr; ?></span>
                </div>
            </div>
            <br>

            <div id="age">
                <div class="inputBox">
                    <input type="text" name="age" value="<?php echo $number; ?>" placeholder="Dog's Age (Human Yrs)">
                    <span class="error">* <?php echo $numberErr; ?></span>
                </div>
            </div>
            <br>

            <div id="gender">
                <p>Gender <span class="error">* <?php echo $genderErr; ?></span></p>
                <li><input type="radio" name="gender" <?php if (isset($gender)  && $gender == "female") echo "checked"; ?> value="female"> Female</li>
                <li><input type="radio" name="gender" <?php if (isset($gender)  && $gender == "male") echo "checked"; ?> value="male"> Male</li>

            </div>
            <br>

            <div id="weight">
                <p>Size <span class="error">* <?php echo $weightErr; ?></span> </p>
                <li><input type="radio" name="weight" <?php if (isset($weight)  && $weight == "small") echo "checked"; ?> value="small"> > 10 lbs</li>
                <li><input type="radio" name="weight" <?php if (isset($weight)  && $weight == "medium") echo "checked"; ?> value="medium"> 10 - 25 lbs</li>
                <li><input type="radio" name="weight" <?php if (isset($weight)  && $weight == "large") echo "checked"; ?> value="large"> 26 - 50 lbs</li>
                <li><input type="radio" name="weight" <?php if (isset($weight)  && $weight == "xlarge") echo "checked"; ?> value="xlarge">
                    < 50 lbs</li> <!-- <select id="selectWeight">
                        <option value="size">Size</option>
                        <option value="S">Small (> 10 lbs)</option>
                        <option value="M">Medium (11 - 25 lbs)</option>
                        <option value="L">Large (26 - 50 lbs)</option>
                        <option value="XL">X Large (< 51 lbs)</option> </select> -->

            </div>
            <br>

            <!-- comment section -->
            <div id="comment">
                <p>Details about your dog:</p>
                <textarea name="comment" rows="5" cols="40" placeholder="Required - Medicine needed, injuries, visits up to date?, etc"><?php echo $comment; ?></textarea>
            </div>
            <br>

            <!-- upload image section -->
            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <!-- fix below -->
                <!-- <input type="submit" value="Upload Image" name="submit"> -->
            </form>
            <br>
            <br>

            <input type="submit" name="submit" value="Submit">
        </div>





</body>

</html>