<!doctype html>
<html lang=en>
<head>
<title>View dentist </title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="dentistuser.css">
</head>
<body>
	<img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">Dental Clinic</p>
<div id="container">
<div id="content">
<h2 class="page">Dentist Information</h2>
<?php
require('database.php'); 
$q = "SELECT name AS name,age AS age,dtype AS dtype FROM dentist ";
$result = @mysqli_query ($dbcon, $q); 
if ($result) { 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Dentist Name</b></td><td class="col head"><b>Age</b></td><td class=" last"><b>Dentist Type</b></td>
				</tr>';
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td>
				<td class="col">' . $row['age'] .'</td>
				<td class="last1">'.  $row['dtype'] . '</td>
				</tr>'; }
				echo '</table>';
				mysqli_free_result ($result);
			   } 
else {
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
     } 

mysqli_close($dbcon); 
?>

</div>

</div>
</body>
</html>