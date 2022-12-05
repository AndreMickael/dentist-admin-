<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="dentisteditadmin.css">
</head>
<body>
<div id="container">
<div id="content">
<h2 class="page">Dentist Information</h2>
<?php

require_once('database.php'); 


$q = "SELECT name AS name,age AS age ,sex AS sex,phone AS phone,email AS email,address AS address ,dtype AS dtype,did  FROM dentist";

$result = @mysqli_query ($dbcon, $q); 

if ($result) { 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Name</b></td class="col head"><td class="col head"><b>Age</b></td><td class="col head"><b>Sex</b></td>
				<td class="col head"><b>Email</b></td>
				<td class="col head"><b>Address</b></td><td class="col head"><b>Phone</b></td><td class="col head"><b>Type</b></td><td class="col head"><b>Edit</b></td>
                <td class="last"><b>Delete</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td><td class="col">'.  $row['age'] . '</td>
				<td class="col">'.  $row['sex'] . '</td><td class="col">'.  $row['email'] . '</td>
				<td class="col">'.  $row['address'] . '</td><td>'.  $row['phone'] . '</td>
				<td class="col">'.  $row['dtype'] . '</td>
				<td class="col"><a href="edit_dentistinfo.php?id=' . $row['did'] . '">Edit</a></td>
                <td class="last1"><a href="deletedentist.php?id=' . $row['did'] . '">Delete</a></td></tr>'; }
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