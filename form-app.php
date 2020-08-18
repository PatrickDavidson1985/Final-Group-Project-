<!-- Name -R, Address -R, Email -R, Phone Number -R, Fenced yard -R, other pets in home, children?  -->

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
                <div class="inputBox"> <p>Name:</p>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </div>
            </div>
            <br>

            <div id="address">
                <div class="inputBox"> <p>Address:</p>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                    <span class="error">* <?php echo $addressErr; ?></span>
                </div>
            </div>
            <br>

            <div id="Email">
                <div class="inputBox"> <p>Email:</p>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </div>
            </div>
            <br>

            <div id="child">
                <p>Children in home: <span class="error">* <?php echo $genderErr; ?></span></p>
                <li><input type="radio" name="child" <?php if (isset($gender)  && $child == "yes") echo "checked"; ?> value="yes"> Yes</li>
                <li><input type="radio" name="child" <?php if (isset($gender)  && $child == "no") echo "checked"; ?> value="no"> No</li>

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

            <input type="submit" name="submit" value="Submit">
        </div>





</body>

</html>