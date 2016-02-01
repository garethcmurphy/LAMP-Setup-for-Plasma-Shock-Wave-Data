<?php
/* set the allowed order by columns */
$default_sort = 'shockspeed';
$allowed_order = array ('Reference', 'shockspeed','bxl');

/* if order is not set, or it is not in the allowed
 * list, then set it to a default value. Otherwise, 
 * set it to what was passed in. */
if (!isset ($_GET['order']) || 
    !in_array ($_GET['order'], $allowed_order)) {
    $order = $default_sort;
} else {
    $order = $_GET['order'];
}

/* connect to db */
mysql_connect ('localhost','root','');
mysql_select_db ('PICSimulations');

/* construct and run our query */
$query = "SELECT * FROM Shock ORDER BY $order";
$result = mysql_query ($query);

/* make sure data was retrieved */
$numrows = mysql_num_rows($result);
if ($numrows == 0) {
    echo "No data to display!";
    exit;
}

/* now grab the first row and start the table */
$row = mysql_fetch_assoc ($result);
echo "&lt;TABLE border=1&gt;\n";
echo "&lt;TR&gt;\n";
foreach ($row as $heading=&gt;$column) {
    /* check if the heading is in our allowed_order
     * array. If it is, hyperlink it so that we can
     * order by this column */
    echo "&lt;TD&gt;&lt;b&gt;";
    if (in_array ($heading, $allowed_order)) {
        echo "&lt;a href=\"{$_SERVER['PHP_SELF']}?order=$heading\"&gt;$heading&lt;/a&gt;";
    } else {
        echo $heading;
    }                
    echo "&lt;/b&gt;&lt;/TD&gt;\n";
}
echo "&lt;/TR&gt;\n";

/* reset the $result set back to the first row and 
 * display the data */
mysql_data_seek ($result, 0);
while ($row = mysql_fetch_assoc ($result)) {
    echo "&lt;TR&gt;\n";
    foreach ($row as $column) {
        echo "&lt;TD&gt;$column&lt;/TD&gt;\n";
    }
    echo "&lt;/TR&gt;\n";
}
echo "&lt;/TABLE&gt;\n";
?>

