<?php
session_start(); 

$_SESSION['userid']=$use;
?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index1.css">
</head>
<body>
	<div class="top"><img src="download.png" width="40" height="40" class="logo">
	<p class="logotext">Dental Clinic</p></div>
	
	<a href="index.html" class="logout">Logout</a>
	<img src="index1.jpg" class="image">
	<div class="link">
	<a href="dentistuser.php" class="sublink l1">Dentist</a><br><br>
	<a href="dentalcodesviewuser.php" class="sublink l2">Dental codes</a><br><br>
	<a href="viewappointment.php" class="sublink l4">View Appointment</a><br><br>
	<a href="appointement.php" class="sublink l5">Make Appointment</a>
	</div>
</body>
</html>