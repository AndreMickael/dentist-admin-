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
        if (empty($_POST['dates'])) {
		$errors[] = 'You forgot to enter the date';
		} else {
		$dates = mysqli_real_escape_string($dbcon, trim($_POST['dates']));
		}

		if (empty($errors)) 
		{ 
		$q = "UPDATE adminreg SET regdate='$dates' WHERE ser=$id LIMIT 1";
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

$q = "SELECT ser,regdate FROM adminreg WHERE ser=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{   
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	echo '<form action="edit_appointinfo.php" method="post">
	<p><label class="label" for="dates">Enter New Appointment Dates:</label>
	<input class="fl-left" id="name" type="text" name="dates" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	
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