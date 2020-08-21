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

?>
