<?php
//include('config/php/config.php');
include('config/php/functions.php');
class index{
	var $title;
	var $user;
	var $content;
	function get(){
		echo $this->content;
	}
	function set($title,$user){
		$this->title	=	$title;
		$this->user 	=	$user;
	}
	function render($file){
		$title = $this->title;
		$file = "views/".$file.".php";
		$file = athentication($file);
		include($file);
	}
}

?>