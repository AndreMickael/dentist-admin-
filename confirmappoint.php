<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="confirmappoint.css">
</head>
<body>
<div id="container">
<div id="content">
<h2 class="page">Appointment Status</h2>

<?php
require_once('database.php'); 

$q = "SELECT *  FROM appointement";
$result = @mysqli_query ($dbcon, $q);

if ($result) { 

				echo '<table class="table">
				<tr class="heading">
				<td class="col head"><b>Dental Codes</b>
				</td><td class="col head"><b>Dentist</b></td>
				<td class="col head"><b>Registration Date</b></td>
				<td class="col head"><b>Time</b></td>
				<td class="last"><b>Status</b></td></tr>';
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2">
				<td class="col">' . $row['code'] . '</td>
				<td class="col">'.  $row['dentist'] . '</td>
				<td class="col">'.  $row['regdate'] . '</td>
				<td class="col">'.  $row['regtime'] . '</td>
				
				<td class="last1"><a class="und" href="edit_status.php?id=' . $row['ser'] . '">Edit Status</a></td>
                </tr>'; }
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