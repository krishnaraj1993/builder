<?php
	session_start();
    define('DB_HOST', 'localhost');
    define('DB_USER', 'admin');
    define('DB_PASSWORD', 'Knp@9845409904');
    define('DB_DATABASE', 'anugraha');
		


	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
 


function runQuery($query) {

	$conn = $GLOBALS['conn'];
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

function runQuery_insert($sql) {
	$conn = $GLOBALS['conn']; 
	if ($conn->query($sql) === TRUE) {
    echo "true";
	} else {
	echo "false(".$sql."Error:".$conn->error.")";
	}
}
	
?>
