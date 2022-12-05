<!doctype html>
<html lang=en>
<head>
<title>Change The Status</title>
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
        if (empty($_POST['status'])) {
		$errors[] = 'You forgot to enter status';
		} else {
		$status = mysqli_real_escape_string($dbcon, trim($_POST['status']));
		}


		if (empty($errors)) 
		{ 
		$q = "UPDATE appointement SET status='$status' WHERE ser=$id LIMIT 1";
		$result = @mysqli_query ($dbcon, $q);
		if (mysqli_affected_rows($dbcon) == 1) { 
		echo '<h3>The status has been updated.</h3>';
		
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

$q = "SELECT regdate,status FROM appointement WHERE ser=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
    echo "<h3>Are you sure you want to update the status of registraion date $row[0]?</h3>";

	echo '<form action="edit_status.php" method="post">
	<p><label class="label" for="status">Status:</label>
	<select name="status" id="name"  >
        <option>Confirmed</option>
        <option>Cancelled</option>
    </select></p>   
	
	<p><input id="submit" type="submit" name="submit" value="Enter"></p>
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