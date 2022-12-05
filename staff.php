<!doctype html>
<html lang=en>
<head>
<title>Register page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="staff.css">
</head>
<body>
<div id="container">
<div id="content">

<?php
require ('database.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array(); 
		if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your name.';
		} else {
		$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
		}

		if (empty($_POST['age'])) {
		$errors[] = 'You forgot to enter your age.';
		} else {
		$age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
		}
	
		if (empty($_POST['sex'])) {
		$errors[] = 'You forgot to enter your sex.';
		} else {
		$sex= mysqli_real_escape_string($dbcon, trim($_POST['sex']));
		}
		
		if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
		} else {
		$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
		}
	
		if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone no.';
		} else {
		$phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
		}

		if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
		} else {
		$email= mysqli_real_escape_string($dbcon, trim($_POST['email']));
		}

		if (empty($errors)) { 
		$q = "INSERT INTO staff (sid, name, sex, age, phone, address, email,  registration_date)
		VALUES (' ', '$name', '$sex', '$age', '$phone', '$address', '$email' , NOW() )";
		$result = @mysqli_query ($dbcon, $q); 
		if ($result) { 
		header ("location: admin.php");
		exit();
		} else { 
	
		echo '<h2 class="error">System Error</h2>
		<p class="error">You could not be registered due to a system error. We apologize 
		for any inconvenience.</p>';
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} 
		mysqli_close($dbcon); 
		exit();
		} else { 
			echo '<h2 class="error">Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) {
		echo " - $msg<br>\n";
		}
		echo '</p><h3 class="error">Please try again.</h3><p><br></p>';
		}
} 
?>
<h2 class="title" style = "font-weight: 600; color:#00203FFF;">Insert Staff Information</h2>

<form action="staff.php" method="post" class="form">

<p><label class="label" for="name" style = "color:#00203FFF; font-weight: 600;">Name:</label> 
<input  type="text" name="name" size="30" maxlength="30" 
value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"></p>

<p><label class="label" for="sex" style = "color:#00203FFF; font-weight: 600;">Sex:</label>
<input  type="text" name="sex" size="30" maxlength="60" 
value="<?php if (isset($_POST['sex'])) echo $_POST['sex']; ?>" > </p>

<p><label class="label" for="age"style = "color:#00203FFF; font-weight: 600;">Age:</label>
<input  type="number" name="age" size="30" maxlength="60" 
value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>" > </p>

<p><label class="label" for="phone"style = "color:#00203FFF; font-weight: 600;">Phone No:</label>
<input  type="tel" pattern="[789][0-9]{9}" name="phone" size="30" maxlength="60" 
value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" > </p>

<p><label class="label" for="address"style = "color:#00203FFF; font-weight: 600;">Address:</label>
<input  type="text" name="address" size="30" maxlength="60" 
value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" > </p>

<p><label class="label" for="email"style = "color:#00203FFF; font-weight: 600;">Email:</label>
<input id="email" type="text" name="email" size="30" maxlength="60" 
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>

<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>

</p>
</div>
</div>
</body>
</html>