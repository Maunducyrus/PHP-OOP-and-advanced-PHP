<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l") . "<br>";
?>
&copy; 2023-<?php echo date("Y") . "<br>";?>

<?php
// getting your time zone
date_default_timezone_set("America/New_York");
echo "The time is " . date("h:i:sa") . "<br>";
?>

<?php
// creating a date from a string with strtotime()
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>

Outputting the date for the next Six saturdays

<?php
// $startdate = strtotime("Saturday");
// $enddate = strtotime("+6 weeks", $startdate);

// while ($startdate < $enddate){
//     echo date("M d", $startdate) . "<br>";
//     $startdate = strtotime("+1 week", $startdate) . "<br>";
// }
?>

Outputting the number of days until 4th July

<?php
$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 . " days until 4th of July.";
?>

<!-- Linking a php file with in a file -->
<?php //include 'practice.php'?>
<?php //require 'practice.php'?>


<!DOCTYPE html>
<html>
<body>

<form action="PHP-Advanced.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
$target_dir = "PHP-Advanced/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>


Complete Upload File PHP Script

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

How to create Cookies
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>

<?php
//start the session
session_start();
?>
<!DOCTYPE html>
<html>
  <body>
    
  <?php
  //set session variables
  $_SESSION["favcolor"] = "green";
  $_SESSION["favanimal"] = "cat";
  echo "Session variables are set." . "<br>" . "<br>";
  ?>
  </body>
</html>

php Filter Extension
<table>
  <tr>
    <td>Filter Name</td>
    <td>Filter ID</td>
  </tr>
<?php
  // foreach (filter_list() as $id => $filter){
  //   echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . 
  //     '</td></tr>';
  // }

?>

</table><br>

Validate an IP address
<?php

$ip = "127.0.0.0.1" . "<br>";

if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
  echo("$ip is a valid IP address");
} else {
  echo("$ip is not a valid IP address") . "<br>" . "<br>";
}
?>

Sanitize and Validate an Email Address <br>
<?php
$email = "john.doe@gmail.com"; 

// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL) . "<br>";

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address") . "<br>" . "<br>";
}
?>

Validate an Integer within a Range <br>
<?php

 $int = 120;
 $min = 1;
 $max = 200;

 if (filter_var($int, FILTER_VALIDATE_INT, array("options" =>
 array("min_range" =>$min, "max_range"=>$max)))=== false ) {
  echo("Variable value is not within the legal range");
 }
 else{
  echo("Variable value is within the legal range") . "<br>" . "<br>";
 }
?>

Validate URL - Must Contain QueryString <br>
<?php
$url = "https://www.w3schools.com" . "<br>";

if (!filter_var($url, FILTER_SANITIZE_URL, FILTER_FLAG_QUERY_REQUIRED) === false){
  echo("$url is a valid URL with a query string") . "<br>";
}else{
  echo("$url is not a valid URL with a query string") ;
}
?>

PHP and JSON encode() <br>
<?php
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43) . "<br>";

echo json_encode($age);
?>

PHP - json_decode() <br>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}' . "<br>";

var_dump(json_decode($jsonobj));
?>

<html>
  <h1>PHP Exceptions</h1>
</html>
Throwing an Exception <br>
<?php

// function divide($dividend, $divisor) {
//   if($divisor == 0) {
//   throw new Exception("Division by zero");
// }
// return $dividend / $divisor;
// }

// echo divide(5, 0) . "<br>";
?>

The try...catch Statement <br>
<?php

function divide($dividend, $divide){
  if($divisor == 0) {
    throw new Exception("Division by zero");
  }
  return $dividend / $divisor;
}

try{
  echo divide(5,0);
} catch (Exception $e) {
  echo "Unable to divide";
}
?>
