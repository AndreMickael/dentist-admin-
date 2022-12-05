<!doctype html>
<html lang=en>
<head>
<title>Edit a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">

</head>

<body>
<div id="container">

	
<div id="content">
<h2>Edit a Record</h2>

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
        if (empty($_POST['code'])) {
		$errors[] = 'You forgot to enter the dental code.';
		} else {
		$code = mysqli_real_escape_string($dbcon, trim($_POST['code']));
		}

		if (empty($_POST['unitcost'])) {
		$errors[] = 'You forgot to enter the unit cost.';
		} else {
		$unitcost = mysqli_real_escape_string($dbcon, trim($_POST['unitcost']));
		}

		if (empty($_POST['description'])) {
		$errors[] = 'You forgot to enter the description.';
		} else {
		$description = mysqli_real_escape_string($dbcon, trim($_POST['description']));
		}

		if (empty($errors)) 
		{ 
		$q = "UPDATE dentalcode SET code='$code', unitcost='$unitcost', description='$description' WHERE id=$id LIMIT 1";
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
       


$q = "SELECT * FROM dentalcode WHERE id=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{ 
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	echo '<form action="editcode.php" method="post">
	<p><label class="label" for="code">Dental Code:</label>
	<input class="fl-left" id="fname" type="text" name="code" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	<br><p><label class="label" for="unitcost">Unit Cost:</label>
	<input class="fl-left" type="text" name="unitcost" size="30" maxlength="40" 
	value="' . $row[2] . '"></p>
	<br><p><label class="label" for="description">Descriptions:</label>
	<input class="fl-left" type="text" name="description" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>
	<br><p><input id="submit" type="submit" name="submit" value="Edit"></p>
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