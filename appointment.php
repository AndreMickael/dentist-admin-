<?php
session_start(); 
$_SESSION['userid'];
?>
<?php
require ('database.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
           
             $codes = trim($_POST['codes']);
             $dent = trim($_POST['dent']);

             $dates = trim($_POST['dates']);

             $time = trim($_POST['time']);

            $q = "INSERT INTO appointement (userid,code,dentist,regdate,regtime,status)
            VALUES ('".$_SESSION['userid']."', '$codes','$dent','$dates','$time','Not Confirmed')";
            $result = @mysqli_query ($dbcon, $q); 

                  if ($result) 
                  { 
                  header ("location: index1.html");
                  exit();
                  } 
                  else 
                  { 
                  echo '<h2>System Error</h2>
                  <p class="error">You could not be registered due to a system error. We apologize 
                  for any inconvenience.</p>';
                  echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
                  } 

            mysqli_close($dbcon); 
       
            exit();
            } 

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="appointement.css">
</head>
<body>
  <img src="images.png" width="40" height="40" class="logo">
    <p class="logotext">Dental Clinic</p>
    <h2 class="page">Make Appointment</h2>
<form action="appointement.php" method="post" class="form">


      <?php
      mysql_connect("localhost", "root", "") or die("Connection Failed");
      mysql_select_db("database")or die("Connection Failed");
      $query = "SELECT concat(code,'-',description) AS codes FROM dentalcode";
      $result = mysql_query($query);
      ?>

      <label for="codes">Dental Codes:<select name="codes" value="<?php if (isset($_POST['codes'])) echo $_POST['codes']; ?>" >
      <?php
      while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      ?>
      <option> <?php echo $line['codes'];?> </option>
      <?php
      }
      ?>
      </select></label><br><br>
      <?php
      mysql_connect("localhost", "root", "") or die("Connection Failed");
      mysql_select_db("database")or die("Connection Failed");
      $query = "SELECT concat(did,'-',name) AS dent FROM dentist";
      $result = mysql_query($query);
      ?>

      <label for="dent">Select Dentist:<select name="dent" value="<?php if (isset($_POST['dent'])) echo $_POST['dent']; ?>" >
      <?php
      while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      ?>
      <option> <?php echo $line['dent'];?> </option>
       
      <?php
      }
      ?>
      </select></label><br><br>

      <?php
      mysql_connect("localhost", "root", "") or die("Connection Failed");
      mysql_select_db("database")or die("Connection Failed");
      $query = "SELECT regdate AS dates FROM adminreg";
      $result = mysql_query($query);
      ?>

      <label for="dates">Select Dates:<select name="dates" value="<?php if (isset($_POST['dates'])) echo $_POST['dates']; ?>" >
      <?php
      while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      ?>
      <option> <?php echo $line['dates'];?> </option>
       
      <?php
      }
      ?>
      </select></label><br><br>

      <label>Time:</label> <select name="time" id="hall" value="<?php if (isset($_POST['time'])) echo $_POST['time']; ?>" >
        <option>9 AM</option>
        <option>10 AM</option>
        <option>11 AM</option>
        <option>12 PM</option>
        <option>1 PM</option>
        <option>2 PM</option>
        <option>3 PM</option>
        <option>4 PM</option>
        <option>5 PM</option>
        <option>6 PM</option>
        <option>7 PM</option> 
      </select>
      <br>
      <br>
      
      <input id="submit" type="submit" name="submit" value="Fix Appointment">

</form>
</body>
</html>