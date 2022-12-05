<?php
session_start();

?>
<!doctype html>
<html lang=en>
<head>
<title>Delete a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">

</head>
<body>
<div id="container">

<div id="content">
<h2>Delete a Record</h2>
<?php
// Check for a valid user ID, through GET or POST
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
$id = $_POST['id'];
} else { 
echo '<p class="error">This page has been accessed in error.</p>';

exit();
}
require ('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST['sure'] == 'Yes') { 
$q = "DELETE FROM signup WHERE userid=$id LIMIT 1";
$result = @mysqli_query ($dbcon , $q);
if (mysqli_affected_rows($dbcon ) == 1) { 

echo '<h3>The record has been deleted.</h3>';
} else { 
echo '<p class="error">The record could not be deleted.<br>Probably 
because it does not exist or due to a system error.</p>'; 
echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>';
}
} else {
echo '<h3>The user has NOT been deleted.</h3>';
}
} else { 
$q = "SELECT name FROM signup WHERE userid=$id";
$result = @mysqli_query ($dbcon , $q);
if (mysqli_num_rows($result) == 1) { 
$row = mysqli_fetch_array ($result, MYSQLI_NUM);
echo "<h3>Are you sure you want to permanently delete $row[0]?</h3>";
echo '<form action="delete.php" method="post"> 
<input id="submit-yes" type="submit" name="sure" value="Yes">
<input id="submit-no" type="submit" name="sure" value="No">
<input type="hidden" name="id" value="' . $id . '">
</form>';
} else { 
echo '<p class="error">This page has been accessed in error.</p>';
echo '<p>&nbsp;</p>';
}
} 
mysqli_close($dbcon );

?>
</div>
</div>
</body>
</html>