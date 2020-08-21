<?php

require_once("conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
<style>
  .pg_notify{
	display: none;
  }
  </style>
</head>
<body>
<?php
$dg = new C_DataGrid("SELECT * FROM managers", "id", "managers");
//$dg -> set_col_title("productCode", "Product Code");
// change default caption
$dg -> set_caption("Manager List");

// set export type
$dg -> enable_export('EXCEL');

// enable integrated search
$dg -> enable_search(true);
$dg -> enable_edit("FORM", "CRUD"); 
$dg -> set_pagesize(10);
$dg -> display();
?>
</body>
</html>