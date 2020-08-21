<?php

require_once("conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<style>
  .pg_notify{
	display: none;
  }
  </style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body>
<?php
$dg = new C_DataGrid("SELECT * FROM projects", "id", "projects");
$dg -> set_col_title("productCode", "Product Code");
$dg -> set_col_title("productCode", "Product Code");
$dg -> set_col_title("productCode", "Product Code");
$dg -> set_col_title("productCode", "Product Code");
// change default caption
$dg -> set_caption("Projects List");

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