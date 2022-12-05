<!doctype html>
<html lang=en>
<head>
<title>Signup</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>

	<div class="top"><img src="images.png" width="40" height="40" class="logo">
		<p class="logotext"style = "font-weight: 600; color:#00203FFF;">Dental Clinic</p></div>
<div id="container">
<div id="content">
<p>
<?php
require ('database.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$errors = array(); 

if (empty($_POST['name'])) {
$errors[] = 'You forgot to enter your Name.';
} else {
$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
}

if (empty($_POST['phone'])) {
$errors[] = 'You forgot to enter your phone number.';
} else {
$phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
}

if (empty($_POST['age']) ) {
$errors[] = 'You forgot to enter your age.';
}
if($_POST['age'] > 90)
{
	$errors[] = 'age should be below 80.';
}
 else {
$age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
}
if (empty($_POST['address'])) {
$errors[] = 'You forgot to enter your address.';
} else {
$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
}
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
} else {
$email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
}
if (!empty($_POST['psword1'])) {
if ($_POST['psword1'] != $_POST['psword2']) {
$errors[] = 'Your two passwords did not match.';
} else {
$p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
}
} else {
$errors[] = 'You forgot to enter your password.';
}
if (empty($errors)) { 
$q = "INSERT INTO signup (userid, name, age, phone, address,email, password, registration_date)
VALUES (' ', '$name', '$age', '$phone','$address','$email', '$p', NOW() )";
$result = @mysqli_query ($dbcon, $q); 
if ($result) {
header ("location: index.html");
exit();
} else { 
echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error!.</p>';

echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} 
mysqli_close($dbcon); 

include ('footer.php');
exit();
} else { 
	echo '<h2 class="error">Error!</h2>
<p class="error">The following error occurred:<br>';
foreach ($errors as $msg) { 
echo "<p class='error'> - $msg<br></p>\n";
}
echo '</p><h3 class="error">Please try again.</h3><p><br></p>';
}
} 
?>
<div class="outer">
<div class="wrap">
<h2 class="title" style = "font-weight: 600; color:#00203FFF;">Register Users</h2>
<form action="signup.php" method="post" class="form">
<p><label class="label" for="name" style = "font-weight: 600; color:#00203FFF;">Name:</label> 
<input id="fname" type="text" name="name" size="30" maxlength="60" 
value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
<p><label class="label" for="phone"style = "font-weight: 600; color:#00203FFF;">Phone:</label>
<input id="lname" type="text" name="phone" pattern="[789][0-9]{9}" size="30" maxlength="60" 
value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"></p>
<p><label class="label" for="age"style = "font-weight: 600; color:#00203FFF;">Age:</label>
<input id="lname" type="number" name="age" size="30" maxlength="60" 
value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>"></p>
<p><label class="label" for="address"style = "font-weight: 600; color:#00203FFF;">Address:</label>
<input id="lname" type="text" name="address" size="30" maxlength="60" 
value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></p>
<p><label class="label" for="email"style = "font-weight: 600; color:#00203FFF;">Email Address:</label>
<input id="email" type="email" name="email" size="30" maxlength="60" 
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
<p><label class="label" for="psword1"style = "font-weight: 600; color:#00203FFF;">Password:</label>
<input id="psword1" type="password" name="psword1" size="30" maxlength="60"
value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" ></p>
<p><label class="label" for="psword2"style = "font-weight: 600; color:#00203FFF;">Confirm Password:</label>
<input id="psword2" type="password" name="psword2" size="30" maxlength="60" 
value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" ></p>
<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
</div>
</div>
</p>
</div>
</div>
</body>
</html>