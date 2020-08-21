<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anugraha";
$grd_table = "admin_user";
$grd_data = array('id','firstname','lastname','username','password','otp_required','role');

try
{
	//Open database connection
	$con = new mysqli($servername, $username, $password, $dbname);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	} 

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		$sql = "SELECT COUNT(*) FROM `".$grd_table."`;";
		$result = $con->query($sql);
		$recordCount = 	$result->num_rows;
				
		$sql2 = "SELECT * FROM ".$grd_table." LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";";
		$result2 = $con->query($sql2);		
		$rows = array();		
		if ($result2->num_rows > 0) {
			while($row = $result2->fetch_assoc()) {
				$rows[] = $row;
			}
		} 	

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$sql = get_insert_string($grd_data,$grd_table);
		//$sql = "INSERT INTO people(Name, Age, RecordDate) VALUES('" . $_POST["Name"] . "', " . $_POST["Age"] . ",now());";
		$result = $con->query($sql);
		
		
		//Get last inserted record (to return to jTable)
		
		$sql = "SELECT * FROM ".$grd_table." WHERE ".$grd_data[0]." = LAST_INSERT_ID();";
		$result = $con->query($sql);		
		$row = $result->fetch_assoc();

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$sql = get_update_string($grd_data,$grd_table);
		$result = $con->query($sql);
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$sql = "DELETE FROM ".$grd_table." WHERE ".$grd_data[0]." = " . $_POST["".$grd_data[0].""] . ";";
		$result = $con->query($sql);
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	$con->close();

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}

function get_insert_string($grd_data,$grd_table){
	$sql = "INSERT INTO ".$grd_table;
	$label = "";
	$data = "";
	$i = 0;
	foreach($grd_data as $value){
		if($i!=0){
			$label = $label.$value.",";
			$data = $data."'".$_POST[$value]."',";
			$i++;
		}
		$i++;
	}
	$label = rtrim($label,',');
	$data = rtrim($data,',');
	$sql = $sql."(".$label.") VALUES(" . $data . ");";
	return $sql;
}

function get_update_string($grd_data,$grd_table){
	$sql = "UPDATE ".$grd_table." SET";
	$i = 0;
	foreach($grd_data as $value){
		if($i!=0){
			$sql = $sql." ".$value."='".$_POST[$value]. "',";
			$i++;
		}
		$i++;
	}
	$sql = rtrim($sql,',');
	return $sql."WHERE ".$grd_data[0]." = ".$_POST["".$grd_data[0].""] . ";";
}

?>