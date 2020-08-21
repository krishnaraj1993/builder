<?php
include('config.php');
$action = $_POST['action'];
if($action == 1){
	$id = $_POST['id'];
	$user = $_SESSION['userid'];
	global $mysqli;
	$sql = 'INSERT INTO cancel(r_id,uid) VALUES ('.$id.','.$user.')';
	echo runQuery_insert($sql);

}
?>