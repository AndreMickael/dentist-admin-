<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
</head>
<body>
<div id="container">
<div id="content">
<h2>Patient Information</h2>
<?php
require_once('database.php'); 

$q = "SELECT fname AS fname, 
lname AS lname,age AS age ,sex AS sex,phone AS phone,email AS email,address AS address ,userid  FROM signup
";
$result = @mysqli_query ($dbcon, $q);

if ($result) {

				echo '<table>
				<tr><td><b>FirstName</b></td><td><b>LastName</b></td><td><b>Age</b></td><td><b>Sex</b></td><td><b>Email</b></td>
				<td><b>Address</b></td><td><b>Phone</b></td><td><b>Edit</b></td>
                <td><b>Delete</b></td></tr>';
				
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr><td>' . $row['fname'] . '</td><td>' . $row['lname'] .'</td><td>'.  $row['age'] . '</td>
				<td>'.  $row['sex'] . '</td><td>'.  $row['email'] . '</td>
				<td>'.  $row['address'] . '</td><td>'.  $row['phone'] . '</td>
				<td><a href="edit_patientinfo.php?id=' . $row['userid'] . '">Edit</a></td>
                <td><a href="delete_patientinfo.php?id=' . $row['userid'] . '">Delete</a></td></tr>'; }
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