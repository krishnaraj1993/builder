<?php

$servername = "localhost";
$username = "admin";
$password = "Knp@9845409904";
$dbname = "anugraha";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 


function runQuery2($query) {
	//echo $query;
	$conn = $GLOBALS['mysqli'];
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$resultset[] = $row;
		}
	}
	if(!empty($resultset)){
		return $resultset;
	}		
}

function runQuery_insert_db($query) {
	global $mysqli;
	if ($mysqli->query($query) === TRUE) {
		return $last_id = $mysqli->insert_id;
	} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
}

function lastid($id,$table){
		$sqlx = "select max($id) from $table";
		$data = runQuery2($sqlx);
		return $data;
}
?>
