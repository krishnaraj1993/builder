<?php
require_once("config.php"); 
$table = $_GET['gn'];
global $mysqli;

$act = 	$_POST['oper'];
$label = '';
$value = '';
if($act=='add'){
	$id = 0;
	foreach($_POST as $key=>$data){
		if($key!='oper'){
			if($key!='id'){  }
			$label = $label.$key.",";
			$value = $value."'".$data."',";
		}
	}
	$label = rtrim($label,',');
	$value = rtrim($value,',');
	$sql =  "INSERT INTO $table($label) VALUES ($value)";
	$mysqli->query($sql);
}
if($act=='edit'){
	$str = '';
	$id = 0;
		foreach($_POST as $key=>$data){
			if($key!='add'){
			if($key=='id'){ $id = $data; }
				if($key!='oper'){
					$str = $str.$key."='".$data."',";
				}
			}
		}
	$str = rtrim($str,',');
	$sql =  "UPDATE $table SET $str WHERE id = $id";
	$mysqli->query($sql);
}
if($act=='del'){
		$id = $_POST['id'];
		$sql = "DELETE FROM $table WHERE id=".$id;
		$mysqli->query($sql);
}
?>