
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3 .org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3 .org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PIC Shock Simulation Database</title>
</head>
<?php
include("./SQLTables.php");
?>

<body>

<div align="center">
<img src="plasma_logo.gif">
</div>

<div align="center">
  <h2>Plasma Shock Simulations</h2>


  The database contains information on the initial conditions of PIC plasma shock simulations, counterstreaming, piston-type and shock-tube type configurations.
<p><?php
  //Connection
	$global_dbh = mysql_connect('localhost','root','') or die("Unable to connect: " . mysql_error() . "<br>");
	$database = mysql_select_db("PICSimulations") or die( "Unable to select database<br>");
	$table = "Shock";
	$page = "sort2";
	display_db_table($page, $table, $global_dbh, FALSE, "border='5'");
	?></p>


</body>
</html>