<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="adminregview.css">
</head>

<body>
<div id="container">

<div id="content">
<h2 class="page">Appointment Dates Information</h2>


<?php
require('database.php'); 
$q = "SELECT ser,regdate  FROM adminreg";

$result = @mysqli_query ($dbcon, $q);

if ($result) { 

				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Appointment Dates</b></td><td><b class="col head">Edit</b></td>
                <td class="last"><b>Delete</b></td></tr>';
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['regdate'] . '</td>
				
				<td class="col"><a class="und" href="edit_appointinfo.php?id=' . $row['ser'] . '">Edit</a></td>
                <td class="last1"><a class="und" href="deleteappoint.php?id=' . $row['ser'] . '">Delete</a></td></tr>'; }
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