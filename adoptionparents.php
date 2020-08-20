<!-- Name -R, Address -R, Email -R, Phone Number -R, Fenced yard -R, other pets in home, children?  -->
<?php
$nameErr = $addressdErr = $emailErr = $numberErr = $childErr = $fenceErr = $petsErr = "";
$name = $address = $email = $number = $child = $fence = $pets = "";

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

    // Validation of Address 
    if (empty($_POST["address"])) {
        $addressErr = "Required";
    } else {
        $address = test_input($_POST["address"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $address)) {
            $addressErr = "Only letters and white space allowed";
        }
    }

    // Validation of Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Validation of Number  
    if (empty($_POST["number"])) {
        $numberErr = "Required";
    } else {
        $number = test_input($_POST["number"]);
        if (!is_numeric($number)) {
            $numberErr = "Only numbers allowed";
        }
    }

    // Validation of Child
    if (empty($_POST["child"])) {
        $childErr = "Required";
    } else {
        $child = test_input($_POST["gender"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $child)) {
            $childErr = "Only letters and white space allowed";
        }
    }

     // Validation of Fence
     if (empty($_POST["fence"])) {
        $fenceErr = "Required";
    } else {
        $fence = test_input($_POST["fence"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fence)) {
            $fenceErr = "Only letters and white space allowed";
        }
    }

      // Validation of Pets
      if (empty($_POST["pets"])) {
        $petsErr = "Required";
    } else {
        $pets = test_input($_POST["pets"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $pets)) {
            $petsErr = "Only letters and white space allowed";
        }
    }

    function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
}
?>



<!DOCTYPE html>
<html lang="en">
<div></div>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./styles/form-app.css">
    <script src="https://kit.fontawesome.com/ffcfe413d5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Form Page</title>
</head>

<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<?php include("nav.php"); ?>
  
 <div id="form">   

        <h1>Application Form</h1>
        <br>

        <h4 class="required"><i class="fas fa-paw"></i> Required</h4>
        <br>
        <br>
        <div id="name">
            <div class="inputBox">
                <input type="text" class="box" name="name" value="<?php echo $name; ?>" placeholder="Your Name">
                <span class="error"><i class="fas fa-paw"></i> <?php echo $nameErr; ?></span>
            </div>
        </div>
        <br>

        <div id="address">
            <input type="text" class="box" name="address" placeholder="Street Address" />
            <span class="error"><i class="fas fa-paw"></i>
                <input type="text" class="box" name="city" placeholder="City" />
                <span class="error"><i class="fas fa-paw"></i>


                    <select name="state" class="state">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY" selected=yes>New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>


                        <input type="text" id="zipcode" class="box" name="zipcode" placeholder="Zip Code" maxlength="5" /><span class="error"><i class="fas fa-paw"></i> <?php echo $nameErr; ?></span>
        </div>
        <br>

        <div id="email">
            <div class="inputBox">
                <input type="text" class="box" name="email" value="<?php echo $email; ?>" placeholder="Email Address">
                <span class="error"><i class="fas fa-paw"></i> <?php echo $emailErr; ?></span>
            </div>
        </div>
        <br>

        <div id="number">
            <div class="inputBox">
                <input type="text" class="box" name="number" value="<?php echo $number; ?>" placeholder="Phone Number">
                <span class="error"><i class="fas fa-paw"></i> <?php echo $numberErr; ?></span>
            </div>
        </div>
        <br>


        <div id="children">
            <p>Children: <span class="error"><i class="fas fa-paw"></i> <?php echo $childErr; ?></span>
                <ul><input type="radio" name="child" <?php if (isset($child)  && $child == "yes") echo "checked"; ?> value="yes"> Yes</ul>
                <ul><input type="radio" name="child" <?php if (isset($child)  && $child == "no") echo "checked"; ?> value="no"> No</ul>

        </div>
        <br>

        <div id="fence">
            <p>Fenced Yard: <span class="error"><i class="fas fa-paw"></i> <?php echo $fenceErr; ?></span></p>
            <ul><input type="radio" name="gender" <?php if (isset($fence)  && $fence == "yes") echo "checked"; ?> value="yes"> Yes</ul>
            <ul><input type="radio" name="gender" <?php if (isset($fence)  && $fence == "no") echo "checked"; ?> value="no"> No</ul>

        </div>
        <br>
        <br>
        <div id="pets">
            <p>Other Pets at Home: <span class="error"><i class="fas fa-paw"></i> <?php echo $petsErr; ?></span></p>
            <ul><input type="radio" name="pets" <?php if (isset($pets)  && $pets == "yes") echo "checked"; ?> value="yes"> Yes</ul>
            <ul><input type="radio" name="pets" <?php if (isset($pets)  && $pets == "no") echo "checked"; ?> value="no"> No</ul>
            <div id="comment">
                <p>If Yes, please describe pets at home:</p>
                <textarea name="comment" class="ta" rows="5" cols="40" placeholder="Pets at home"><?php echo $comment; ?></textarea>
            </div>
            <div id="button">
                <input type="submit" class="submit" name="submit" value="Submit">
            </div>
        </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>