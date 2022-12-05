<!doctype html>
<html lang=en>
<head>
<title>Dental Codes</title>
<link rel="stylesheet" type="text/css" href="dentalcodes.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

 $code = trim($_POST['code']);

 $unitcost = trim($_POST['unitcost']);

 $desc = trim($_POST['description']);

 require ('database.php'); 
 
 $q = "INSERT INTO dentalcode (id,code,unitcost, description) VALUES ('','$code','$unitcost','$desc')"; 

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

<h2 class="title">Insert Dental codes</h2> 
<form action="dentalcodes.php" method="post" class="form">
<p><label class="label" for="code">Code</label>
<input  type="text" name="code" size="30" maxlength="30" 
value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>"></p>
<p><label class="label" for="unitcost">Unit Cost</label>
<input  type="text" name="unitcost" size="30" maxlength="40" 
value="<?php if (isset($_POST['unitcost'])) echo $_POST['unitcost']; ?>"></p>
<p><label class="label" for="description">Description</label>
<input  type="text" name="description" size="30" maxlength="60" 
value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>" > </p>
<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
</p>




</body>
</html>