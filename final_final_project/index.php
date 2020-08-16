<?php

$nameErr = $breedErr = $ageErr = $genderErr = $weightErr = "";
$name = $breed = $age = $gender = $weight = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])){
        $nameErr = "required";
    } else{
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    
    
    if (empty($_POST["breed"])){
        $breedErr = "required";
    } else{
        $breed = test_input($_POST["breed"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$breed)) {
            $breedErr = "Only letters and white space allowed";
        }
    }

    
    if (empty($_POST["age"])){
        $ageErr = "required";
    } else{
        $age = test_input($_POST["age"]);
        // return preg_match('/^[0-9]{10}+$/',$age);
        if (!preg_match('/^[0-9]{10}+$/',$age)) {
            $ageErr = "Only numbers allowed";
        }
    }

    if (empty($_POST["gender"])){
        $genderErr = "required";
    } else{
        $gender = test_input($_POST["gender"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$gender)) {
            $genderErr = "Only letters and white space allowed";
        }
    }
    
    if (empty($_POST["weight"])){
        $weightErr = "required";
    } else{
        $weight = test_input($_POST["weight"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$weight)) {
            $weightErr = "Only letters and white space allowed";
        }
    }
    
}

function test_input($data) {
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

<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">

    <div id="form">
        <form id="name">
            <div class="inputBox">
                <input type="text" name="name" value="<?php echo $name;?>" placeholder="Dog's Name">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
        </form>
        <br>

        <form id="breed">
            <div class="inputBox">
                <input type="text" name="breed" value="<?php echo $breed;?>" placeholder="Dog's Breed">
                <span class="error">* <?php echo $breedErr;?></span>
            </div>
        </form>
        <br>

        <form id="age">
            <div class="inputBox">
                <input type="text" name="age" value="<?php echo $age;?>" placeholder="Dog's Age (Human Yrs)">
                <span class="error">* <?php echo $ageErr;?></span>
            </div>
        </form>
        <br>

        <div id="gender">
                <input type="radio" name="gender" <?php if (isset($gender)  && $gender=="female") echo "checked";?> value="female"> Female
                <input type="radio" name="gender" <?php if (isset($gender)  && $gender=="male") echo "checked";?> value="male"> Male
                <span class="error">* <?php echo $genderErr;?></span>
        </div>
        <br>

            <div id="weight">
                <select id="select-weight">
                    <option value="club-brand">Size</option>
                    <option value="F">Small (> 10 lbs)</option>
                    <option value="M">Medium (11 - 25 lbs)</option>
                    <option value="M">Large (26 - 50 lbs)</option>
                    <option value="M">X Large (< 51 lbs)</option>
                </select>
                <span class="error">* <?php echo $weightErr;?></span>
            </div>
            <br>

            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
              </form>
              <br>

              <input type="submit" name="submit" value="Submit">
    </div>

   
   


</body>

</html>