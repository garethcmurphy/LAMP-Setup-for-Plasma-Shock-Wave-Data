
<?php
function display_db_query($page, $query_string, $connection, $sort, $image, $table_params) {
	$result_id = mysql_query($query_string, $connection) or die("display_db_query:" . mysql_error());
	$column_count = mysql_num_fields($result_id) or die("display_db_query:" . mysql_error());
	// Here the table attributes from the $table_params variable are added
	print("<TABLE $table_params >\n");
	// Print Headers
	print("<TR>");
	for($column_num = 0; $column_num < $column_count; $column_num++) {
		$field_name = mysql_field_name($result_id, $column_num);
		echo ("<TH><a href=\"$page.php?order_by=$field_name&sorting=$sort\">$field_name</a></TH>");
	}
	print("</TR>\n");
	// Print the body
	while($row = mysql_fetch_row($result_id)) {
		print("<TR ALIGN=LEFT VALIGN=TOP>");
		for($column_num = 0; $column_num < $column_count; $column_num++) {
			if($column_num==0 && $image){
			   print("<TD><img src=imageLoader.php?image=violin</TD>\n");
			}
			else{
			   print("<TD>$row[$column_num]</TD>\n");
			}
		}
		print("</TR>\n");
	}
	print("</TABLE>\n"); 
}

function display_db_table($page, $tablename, $connection, $image, $table_params) {
	$order_by = (isset($_GET['order_by'])) ? $_GET['order_by'] : 'Reference';
	$sorting = (isset($_GET['sorting'])) ? $_GET['sorting'] : 'desc';
	switch($sorting){
    case "asc":
        $sort = 'desc'; 
        break;
    case "desc":
        $sort = 'asc'; 
        break;
	}
	$query_string = "SELECT * FROM $tablename ORDER BY $order_by"." $sort";
	display_db_query($page, $query_string, $connection, $sort, $image, $table_params);
}
?>
