<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="patienteditadmin.css">
</head>
<body>
<div id="container">
<div id="content">
<h2 class="page">Patient Information</h2>

<?php
require('database.php'); 
$q = "SELECT name AS name,age AS age ,phone AS phone,email AS email,address AS address ,userid  FROM signup";

$result = @mysqli_query ($dbcon, $q);

if ($result) {
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Name</b></td><td class="col head"><b>Age</b></td><td class="col head"><b>Email</b></td>
				<td class="col head"><b>Address</b></td><td class="col head"><b>Phone</b></td><td><b class="col head">Edit</b></td>
                <td class="last"><b>Delete</b></td></tr>';
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td><td class="col">'.  $row['age'] . '</td>
				<td class="col">'.  $row['email'] . '</td>
				<td class="col">'.  $row['address'] . '</td><td class="col">'.  $row['phone'] . '</td>
				<td class="col"><a href="edit_patientinfo.php?id=' . $row['userid'] . '">Edit</a></td>
                <td class="last1"><a href="delete.php?id=' . $row['userid'] . '">Delete</a></td></tr>'; }
				echo '</table>'; 
				mysqli_free_result ($result); 
			   } 

else { 
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
     } 
mysqli_close($dbcon);
?>
</div>
</div>
</body>
</html>