<!doctype html>
<html lang=en>
<head>
<title>Dental Codes</title>
<link rel="stylesheet" type="text/css" href="adminreg.css">
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

 $dates = trim($_POST['dates']);

 require ('database.php'); 

 $q = "INSERT INTO adminreg (regdate) VALUES ('$dates')"; 

 $result = @mysqli_query ($dbcon, $q); 

 if ($result) { 
header ("location: admin.php");
 
 exit(); 

 }
 else {                           
	 echo '<h2 class="error">System Error</h2>
	 <p class="error">You could not be registered due to a system error. We apologize for any 
	 inconvenience.</p>';

      } 

mysqli_close($dbcon); 

exit();
 
} 
?>

<h2 class="title"style = "font-weight: 600; color:#00203FFF;">Insert Appointment Dates</h2> 

<form action="adminreg.php" method="post" class="form">

<p><label class="label" for="dates"style = "font-weight: 600; color:#00203FFF;">Date</label>
<input  type="text" name="dates" size="30" maxlength="30" 
value="<?php if (isset($_POST['dates'])) echo $_POST['dates']; ?>"><br><span class="su"style = "font-weight: 600; color:#00203FFF;">2 December,2022</span></p>

<p><input id="submit" type="submit" name="submit" value="Enter"></p>
</form>
</p>




</body>
</html>