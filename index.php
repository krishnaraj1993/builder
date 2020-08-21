<?php
include('class/objects.php');
	
	global $home_obj;
	$home_obj->set('hms','testuser');
	$home_obj->get();
	//$souce = server_request();
	$home_obj->render('index');
	
?>