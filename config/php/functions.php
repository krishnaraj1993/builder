<?php
include('config.php');
function get_lov($key,$value,$table,$defualt){
	$sql = "SELECT `".$key."` as Value,`".$value."` as DisplayText FROM `".$table."` UNION ALL SELECT '#' as Value,'".$defualt."' as DisplayText";
	return $data = runQuery($sql);
	
}

function get_dropdown_lov($label,$table,$key,$value){
	$sql = "SELECT `".$key."` as Value,`".$value."` as DisplayText FROM `".$table."` WHERE `root` =(SELECT id FROM `admin_lookup` WHERE `label` = '".$label."')";
	return $data = runQuery($sql);
}


function get_lov_where($key,$value,$table,$where){
	if($where!=0){
		$sql = "SELECT ".$key." as v FROM ".$table." ".$where;
	}else{
		$sql = "SELECT DISTINCT ".$key." as v FROM ".$table." ";
	}
	return $data = runQuery($sql);
	
}

function athentication($file){
	if(isset($_SESSION['admin_user'])){
		return $file;
	}else
	{
		return "views/login.php";
	}
}

function get_data(){
	return "i got your message";
}

function server_request($request=''){
	if(empty($_POST)){
		return 'index';
	}
	else{
		return $_POST['postaction'];
		exit();
	}
}

function insert($label,$data,$tbllname){
	global $mysqli;
	$n = sizeof($label);
	$str_lbl = '';
	$str_dat = '';
	for($i=0;$i<$n;$i++){
		$str_lbl = $str_lbl."`".$label[$i]."`,";
		if($data[$i]=='APP_PR_K'){
			$str_dat = $str_dat."NULL,";	
		}
		else
		{
			$str_dat = $str_dat."'". $mysqli->real_escape_string($data[$i])."',";		
		}	
	}
	
	$sql = "INSERT INTO ".$tbllname." (".rtrim($str_lbl,',').")values(".rtrim($str_dat,',').");";
	
	
	if ($mysqli->query($sql) === TRUE) {
		return  $mysqli->insert_id;
	} else {
		printf($sql."\nErrormessage: %s\n", $mysqli->error);
		return  0;
	}
}

function delete_row($sql){
	global $mysqli;
	if ($mysqli->query($sql) === TRUE) {
		return  true;
	} else {
		return  0;
	}
}

?>