<!-- SECURITY - sanitze input, form submit, database,  -->

<?php
// $serverName = "localhost";
// $userName = "root"; 
// $password = "Murrda0629";
// $dataBase = "final_project_database";
// // Create connection
// $db = mysqli_connect('localhost','root','Murrda0629','final_project_database');

// if ($db->connect_error){
//     die("Connection failed: ". $db->connect_error);
// } echo "Connected successfully";

$nameErr = $breedErr = $numberErr = $genderErr = $sizeErr = $commentsErr = $imageErr = $date_addedErr = "";
$name = $breed = $number = $gender = $size = $comments = $image = $date_added = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation of Name
    if (empty($_POST["pet_name"])) {
        $pet_nameErr = "Required";
    } else {
        $pet_name = ($_POST["pet_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $pet_name)) {
            $pet_nameErr = "Only letters and white space allowed";
        }
    }

    // Validation of Breed 
    if (empty($_POST["breed"])) {
        $breedErr = "Required";
    } else {
        $breed = ($_POST["breed"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $breed)) {
            $breedErr = "Only letters and white space allowed";
        }
    }


    // Validation of Age  
    if (empty($_POST["age"])) {
        $numberErr = "Required";
    } else {
        $number = ($_POST["age"]);
        if (!is_numeric($number)) {
            $numberErr = "Only numbers allowed";
        }
    }

    // Validation of Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Required";
    } else {
        $gender = ($_POST["gender"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $gender)) {
            $genderErr = "Only letters and white space allowed";
        }
    }

    //Validation of Size
    if (empty($_POST["size"])) {
        $sizeErr = "Required";
    } else {
        $size = ($_POST["size"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $size)) {
            $sizeErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["comments"])) {
        $comments = "";
    } else {
        $comments = ($_POST["comments"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $comments)) {
            $commentsErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["image"])) {
        $image = "";
    } else {
        $image = ($_POST["image"]);
        echo $image;
        if (!preg_match("/^[a-zA-Z ]*$/", $image)) {
            $imageErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["date_added"])) {
        $date_added = "";
    } else {
        $date_added = ($_POST["date_added"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $date_added)) {
            $date_addedErr = "Only letters and white space allowed";
        }
    }


    // function($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }



    $servername = "127.0.0.1";
    $username = "root";
    $password = "Murrda0629";
    $db = "final_project_database";
    // create connection
    $connection =  mysqli_connect($servername, $username, $password, $db);
    // check connection
    if (!$connection) {
        echo "Connection failed: " . mysqli_connect_error();
    } else {
        echo "The connection was successful";


        $sql = "INSERT INTO content(pet_name, breed, age, comments, image, date_added, gender, size)
            VALUES (?,?,?,?,?,?,?,?)";
        $statement = mysqli_prepare($connection, $sql);
        $statement->bind_param("ssdsssss", $pet_name, $breed, $age, $comments, $image, $date_added, $gender, $size);
        $statement->execute();
        $result = $statement->get_result();
        if ($result) {
            echo "Was not successfully added to the database!";
        }
        // $parsed_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($parsed_results);
        $statement->close();
    }
    mysqli_close($connection);
}

// --  $result = mysqli_query($connection,$sql);



//  if (mysqli_num_rows($result) > 0) {
//      //output data of each row
//      while($row = mysqli_fetch_assoc($result)){
//          echo "id: " . $row["id"]. $row[" pet_name "] .$row["breed"]. $row[" "] . $row["age"].$row["comments"].$row["image"].$row["date_added"].$row["gender"]. $row["size"].$row["adopt_status"]. "<br>";
//      }
//  }
//  else {
//      echo "0 results";
//  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Centers Form Registration Page</title>

    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/finalproject.css">
    <link rel="stylesheet" href="./styles/form-reg.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ffcfe413d5.js" crossorigin="anonymous"></script>
</head>
<header><?php include("nav.php"); ?></header>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div id="form">
            <h1>Registration Form</h1>
            <br>
            <h4 class="required"><i class="fas fa-paw"></i> Required</h4>
            <br>
            <br>
            <div id="pet_name">
                <div class="inputBox">
                    <input type="text" class="box" name="pet_name" value="<?php echo $pet_name; ?>" placeholder="Dog's Name">
                    <span class="error"><i class="fas fa-paw"></i> <?php echo $pet_nameErr; ?></span>
                </div>
            </div>
            <br>

            <div id="breed">
                <div class="inputBox">
                    <input type="text" class="box" name="breed" value="<?php echo $breed; ?>" placeholder="Dog's Breed">
                    <span class="error"><i class="fas fa-paw"></i> <?php echo $breedErr; ?></span>
                </div>
            </div>
            <br>

            <div id="age">
                <div class="inputBox">
                    <input type="text" class="box" name="age" value="<?php echo $number; ?>" placeholder="Dog's Age (Human Yrs)">
                    <span class="error"><i class="fas fa-paw"></i> <?php echo $numberErr; ?></span>
                </div>
            </div>
            <br>

            <div id="gender">
                <p>Gender <span class="error"><i class="fas fa-paw"></i> <?php echo $genderErr; ?></span></p>
                <ul><input type="radio" name="gender" <?php if (isset($gender)  && $gender == "female") echo "checked"; ?> value="female"> Female</ul>
                <ul><input type="radio" name="gender" <?php if (isset($gender)  && $gender == "male") echo "checked"; ?> value="male"> Male</ul>
            </div>
            <br>
            <div id="size">
                <p>Size <span class="error"><i class="fas fa-paw"></i> <?php echo $sizeErr; ?></span> </p>
                <ul><input type="radio" name="size" <?php if (isset($size)  && $size == "small") echo "checked"; ?> value="small"> > 10 lbs</ul>
                <ul><input type="radio" name="size" <?php if (isset($size)  && $size == "medium") echo "checked"; ?> value="medium"> 10 - 25 lbs
                </ul>
                <ul><input type="radio" name="size" <?php if (isset($size)  && $size == "large") echo "checked"; ?> value="large"> 26 - 50 lbs
                </ul>
                <ul><input type="radio" name="size" <?php if (isset($size)  && $size == "xlarge") echo "checked"; ?> value="xlarge">
                    < 50 lbs</ul> <!-- <select id="selectWeight">
                        <option value="size">Size</option>
                        <option value="S">Small (> 10 lbs)</option>
                        <option value="M">Medium (11 - 25 lbs)</option>
                        <option value="L">Large (26 - 50 lbs)</option>
                        <option value="XL">X Large (< 51 lbs)</option> </select> -->
            </div>
           
            <!-- comment section -->
            <div id="comments">
                <p>Details about your dog:</p>
                <textarea name="comments" class="ta" rows="5" cols="40" placeholder="Required - Medicine needed, injuries, visits up to date?, etc"><?php echo $comments; ?></textarea>
            </div>
            
            <!-- upload image section -->
            <div id="image">
                <p>Image url:</p> 
                <input type="text" name="image" id="fileToUpload">
                <!-- fix below -->
                <!-- <input type="submit" value="Upload Image" name="submit"> -->
            </div>
            
            <!-- Date added section -->
            <div id="date">
               <p> Date:</p>
                <input type="date" name="date_added" placeholder="Date Added">
            </div>
            <br>
            <div id="button">
                <input type="submit" class="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>

    <footer><?php include("footer.php"); ?></footer>
</body>

</html>

<!-- sanitization, escape output -->