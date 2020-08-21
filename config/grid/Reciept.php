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
$dg = new C_DataGrid("SELECT * FROM recipts", "id", "recipts");
$dg -> set_col_title("dse_name", "DSE Name");
$dg -> set_col_title("project_name", "Project Name");
$dg -> set_col_title("manager_name", "Manager Name");
// change default caption
$dg -> set_caption("Recipts List");

$dg->set_col_edittype('manager_name',"select","SELECT name,name FROM `managers` WHERE 1",false);
$dg->set_col_edittype('project_name',"select","SELECT pname,pname FROM `projects` WHERE 1",false);
$dg->set_col_edittype('dse_name',"select","SELECT name,name FROM `bde` WHERE 1",false);
// set export type
$dg -> enable_export('EXCEL');


$col_formatter = <<<COLFORMATTER
function(cellvalue, options, rowObject){
	var n1 = parseInt(rowObject[0],0);
	return '<button onclick="print('+n1+')">Print</button>';
}
COLFORMATTER;

$col_formatter_c = <<<COLFORMATTER
function(cellvalue, options, rowObject){
	var n1 = parseInt(rowObject[0],0);
	return '<button onclick="cancel('+n1+')">Cancel</button>';
}
COLFORMATTER;


$dg->add_column('Print', array('name'=>'Print', 'index'=>'Print', 
	'formatter'=>$col_formatter), 
		'Print');

$dg->add_column('Cancel', array('name'=>'Cancel', 'index'=>'Cancel', 
	'formatter'=>$col_formatter_c), 
		'Cancel');		
		
// enable integrated search
$dg -> enable_search(true);
$dg -> enable_edit("FORM", "CRUD"); 
$dg -> set_pagesize(10);
$dg -> display();
?>
</body>
<script type="text/javascript">
function print(id){
	//window.location.assign("../../views/invoice.php?data="+id);
	parent.callmain(id);
}

function cancel(id){
parent.cancel_inv(id);
}
</script>

</html>