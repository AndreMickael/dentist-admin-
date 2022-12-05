<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="dentalcodesviewuser.css">
</head>
<body>
	<img src="images.png" width="40" height="40" class="logo">
		<p class="logotext">Dental Clinic</p>
<div id="container">

<div id="content">
<h2 class="page">Dental Codes</h2>
<?php
require('database.php'); 

$q = "SELECT code AS code, 
unitcost AS cost,description AS descriptions, id As id FROM dentalcode 
";

$result = @mysqli_query ($dbcon, $q);

if ($result) {
				echo '<table>
				<tr class="heading"><td class="col head"><b>Codes</b></td><td class="col head"><b>Unit Cost</b></td><td class=" last"><b>Descriptions</b></td>
				
				</tr>';
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['code'] . '</td>
				<td class="col">' . $row['cost'] .'</td>
				<td class="last1">'.  $row['descriptions'] . '</td>
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