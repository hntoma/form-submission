<!DOCTYPE HTML>  
<html>
<head>
  <style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$fname = $lname = $gender = $birthday = $religion = $present = $permanent = $phone = $email = $website = $uname = $psw = "";
$fnameErr = $lnameErr = $genderErr = $birthdayErr = $religionErr = $rpresentErr = $rpermanentErr = $phoneErr = $emailErr = $websiteErr = $unameErr = $pswErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
      $fnameErr = "*";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["lname"])) {
      $lnameErr = "*";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
      }
  } 

    if (empty($_POST["gender"])) {
    $genderErr = "*";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
  if (empty($_POST["birthday"])) {
    $birthdayErr = "*";
  } else {
    $birthday = test_input($_POST["birthday"]);
  }

if (empty($_POST["religion"])) {
    $religionErr = "*";
  } else {
    $religion = test_input($_POST["religion"]);
  }
  if (empty($_POST["present"])) {
    $presentErr = "";
  } else {
    $present = test_input($_POST["present"]);

  }if (empty($_POST["permanent"])) {
    $permanentErr = "";
  } else {
    $permanent = test_input($_POST["permanent"]);
  }


if (empty($_POST["phone"])) {
    $phoneErr = "";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if phone number is well-formed
    if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
      $phoneErr = "*Invalid Phone number format";
    }
  }
 
  if (empty($_POST["email"])) {
    $emailErr = "*";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Invalid email format";
    }
  }
if (empty($_POST["website"])) {
    $websiteErr = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }
if (empty($_POST["uname"])) {
      $unameErr = "*";
  } else {
    $uname = test_input($_POST["uname"]);
    // check if name only contains letters 
    if (!preg_match("/^[a-zA-Z-]*$/",$uname)) {
      $unameErr = " *Only letters allowed";
      }
  } 
if (empty($_POST["psw"])) {
      $pswErr = "*";
  } else {
    $psw = test_input($_POST["psw"]);
    // check if name only contains letters and whitespace
    if (!preg_match('#[^a-z0-9]+#i', $psw)) {
      $pswErr = " *Password must have at least 1 Special Character :";
      }
  } 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Registration Form</h1>
<p><span class="error"> *Must fill in all the required fields </span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <fieldset>
    <legend>Basic Information:</legend>
    <br>
   First name:
    <input type="text" name="fname" required>
    <span class="error">*<?php echo $fnameErr;?></span>
  <br><br>
Last name: <input type="text" name="lname" required>
 <span class="error">*<?php echo $lnameErr;?></span>
  <br><br>
Plese select your gender:<br><br>
  <input type="radio" name="gender" value="female" required>Female <br>
  <input type="radio" name="gender" value="male" required>Male <span class="error"><?php echo $genderErr;?></span><br>
  <input type="radio" name="gender" value="other" required>Other<br>

 <br>
    Birthday:
  <input type="date" id="birthday" name="birthday" required="">
   <span class="error"><?php echo $birthdayErr;?></span>
  <br><br>
   Religion:
<select name="religion" id="religion" required>
  <option value="" >...</option>
  <option value="islam" >Islam</option>
  <option value="hinduism" >Hinduism</option>
  <option value="chirstian" >Chirstian</option>
  <option value="othes">Others</option>
</select>
 <span class="error"><?php echo $religionErr;?></span>
  <br><br>
</select> 
</fieldset> <br>
<fieldset><br>

    <legend>Contact Information:</legend>
       Present address: <textarea name="present" rows="5" cols="40" =""></textarea>
  <br>Permanent address: <textarea name="permanent" rows="5" cols="40" =""></textarea>
<br><br>
   Enter your phone number: <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" >
   <span class="error"><?php echo $phoneErr;?></span> <br> <br>
  Email: <input type="text" name="email" required="">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Personal Website: <input type="text" name="website" value="" >
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  </fieldset> 
  <fieldset>
    <legend>Account Information::</legend><br>
   Username :  <input type="text" placeholder="Enter username" name="uname" required> <span class="error"> <?php  echo $unameErr;?></span>
  <br><br>
   Password : <input type="psw" placeholder="Enter password" name="psw" required>
   <span class="error"><?php echo $pswErr;?></span><br><br>
    <input type="submit" name="submit" value="Submit">


  </fieldset>

</form>

<?php
echo "<h2>Your Input:</h2>";
echo "First name is : " . $fname . "<br>";
echo "Last name is : " . $lname . "<br>";
echo "Gender is : " . $gender . "<br>";
echo "Birthday : " . $birthday . "<br>";
echo "Religion : " . $religion . "<br>";
echo "Present Address : " . $present. "<br>";
echo "Permanent Address : " . $permanent. "<br>";
echo "Phone : " . $phone . "<br>";
echo "E-Mail : " . $email . "<br>";
echo "Website : " . $website . "<br>";
echo "Username : " . $uname . "<br>";
echo "Password : " . $psw . "<br>";
?>


</body>
</html>