<!doctype html>
<html lang=en>
<head>
<title>Edit a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<div id="container">
<div id="content">
<h2></h2>
<?php

		if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
		$id = $_GET['id'];
		} 
		elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
		$id = $_POST['id'];
		} 
		else {
		echo '<p class="error">This page has been accessed in error</p>';
		exit();
		}

require ('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();
        if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your first name';
		} else {
		$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
		}

		if (empty($_POST['age'])) {
		$errors[] = 'You forgot to enter your age.';
		} else {
		$age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
		}

		if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter the phone no.';
		} else {
		$phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
		}
		if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter the email id.';
		} else {
		$email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
		}

		if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter the address.';
		} else {
		$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
		}



		if (empty($errors)) 
		{ 
		$q = "UPDATE signup SET name='$name', age='$age' , phone='$phone' ,email='$email' , address='$address' WHERE userid=$id LIMIT 1";
		$result = @mysqli_query ($dbcon, $q);
		if (mysqli_affected_rows($dbcon) == 1) { 
		echo '<h3>The user has been edited.</h3>';
		} else { 
		echo '<p class="error">The user could not be edited due to a system error. 
		We apologize for any inconvenience.</p>'; 
		echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; 
		} 
		mysqli_close($dbcon); 

		exit();
		} else   { 
		echo '<p class="error">The following error(s) occurred:<br />';
        
		foreach ($errors as $msg) { 
		echo " - $msg<br>\n";
	    }
		echo '</p><p>Please try again.</p>';
		} 
}      



$q = "SELECT userid,name,age,phone,email,address FROM signup WHERE userid=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{  
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	echo '<form action="edit_patientinfo.php" method="post">
	<p><label class="label" for="name">Name:</label>
	<input class="fl-left" id="name" type="text" name="name" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	<p><label class="label" for="age">Age:</label>
	<input class="fl-left" type="text" name="age" size="30" maxlength="50" 
	value="' . $row[2] . '"></p>
	<p><label class="label" for="phone">Phone:</label>
	<input class="fl-left" type="text" name="phone" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>
	<p><label class="label" for="email">Email:</label>
	<input class="fl-left" type="text" name="email" size="30" maxlength="50" 
	value="' . $row[4] . '"></p>
	<p><label class="label" for="address">Address:</label>
	<input class="fl-left" type="text" name="address" size="30" maxlength="50" 
	value="' . $row[5] . '"></p>
	<p><input id="submit" type="submit" name="submit" value="Edit"></p>
	<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} 
else { 
	  echo '<p class="error">This page has been accessed in error</p>';
	 }
mysqli_close($dbcon);

?>
</div>
</div>
</body>
</html>