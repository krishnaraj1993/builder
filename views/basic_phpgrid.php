<?php

require_once("../config/grid/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body>
fghgf
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

// change default caption
$dg -> set_caption("Orders List");

// set export type
$dg -> enable_export('EXCEL');

// enable integrated search
$dg -> enable_search(true);

// set height and weight of datagrid
$dg -> set_dimension(800, 600); 
$dg -> set_pagesize(10);
$dg -> display();
?>
</body>
</html>