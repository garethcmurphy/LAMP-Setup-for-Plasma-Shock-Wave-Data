<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PIC Shock Simulation Database</title>



<link href="default.css" rel="stylesheet" type="text/css" media="screen" />




</head>
<?php
include("./SQLTables.php");
?>

<body>

<div align="center">
<img src="plasma_logo.gif">
</div>


<div class="navigation" align="center">
    <table>
        <tr>
            <td><a href="index.html">home</a></td>
            <td>&nbsp;</td>
            <td><a href="about.html">search</a></td>
            <td>&nbsp;</td>
            <td><a href="sort2.php">browse</a></td>
            <td>&nbsp;</td>
            <td><a href="modelling.html">modelling</a></td>
            <td>&nbsp;</td>
            <td><a href="contact.php">contact</a></td>
        </tr>
    </table>
</div>
<div align="center">
<div class="maincontainer" >

<div>
Click on a heading to sort by value
</div>
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
