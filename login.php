<!doctype html>
<html lang=en>
<head>
<title>Login page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="top"><img src="images.png" width="40" height="40" class="logo">
		<p class="logotext"style = "font-weight: 600; color:#00203FFF;">Dental Clinic</p></div>
<div id="container">

<div id="content">

<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				require_once ('database.php'); 
				if (!empty($_POST['email'])) {
				$e = mysqli_real_escape_string($dbcon, $_POST['email']);
				} else {
				$e = FALSE;
				echo '<p class="error">You forgot to enter your email address.</p>';
				}
				if (!empty($_POST['password'])) {
				$p = mysqli_real_escape_string($dbcon, $_POST['password']);
				} else {
				$p = FALSE;
				echo '<p class="error">You forgot to enter your password.</p>';
				}
				if ($e && $p)
				{           
							$q = "SELECT userid, user_level FROM signup WHERE (email='$e' AND password='$p')";
							$result = @mysqli_query ($dbcon, $q);

							if (@mysqli_num_rows($result) == 1) 
							{      
									session_start(); 
									$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
									$_SESSION['user_level'] = (int) $_SESSION['user_level'];
									$_SESSION['userid'];
									$url = ($_SESSION['user_level'] === 1) ? 'admin.php' : 'index1.html';
									header('Location: ' . $url); 
									exit(); 
									mysqli_free_result($result);
									mysqli_close($dbcon);
							} 

							else {
									echo '<p class="error">The e-mail address and password entered do not match our records 
									<br>Perhaps you need to register, just click the Register button on the header menu</p>';
							       }

				} 
				else { 
				        echo '<p class="error">Please try again.</p>';
				       }
				mysqli_close($dbcon);
		} 
?>

<div id="loginfields">
<?php include ('loginpage.php'); ?>
</div><br>

</div>
</div>
</body>
</html>