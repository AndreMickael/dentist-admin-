<!doctype html>
<html lang=en>
<head>
<title>Dental Codes</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

 $code = trim($_POST['code']);

 $unitcost = trim($_POST['unitcost']);

 $description = trim($_POST['description']);

 require ('database.php'); 

 $q = "UPDATE dentalcode SET code='$code', unitcost='$unitcost', description='$description' ";

 $result = @mysqli_query ($dbcon, $q);

 if ($result) { 

 echo '<p>SUCCESSFUL entered</p>'; 

 exit(); 

 }

 else {                                                
	 echo '<h2>System Error</h2>
	 <p class="error">You could not be registered due to a system error. We apologize for any 
	 inconvenience.</p>';

      } 

mysqli_close($dbcon);
exit();
 
} 
?>
<h2>Dental codes</h2> 
<form action="editdental.php" method="post">

<p><label class="label" for="code">Code</label>
<input  type="text" name="code" size="30" maxlength="30" 
value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>

<p><label class="label" for="unitcost">Unit Cost</label>
<input  type="text" name="unitcost" size="30" maxlength="40" 
value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>

<p><label class="label" for="description">Description</label>
<input  type="text" name="description" size="30" maxlength="60" 
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>



<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form><!-- End of the page content. -->
</p>




</body>
</html>