<?php
include('functions.php');

$pick = $_GET['data'];


if($pick=='menu'){
	$menu = get_lov('id','sub_menu','admin_menus','Main menu');
	$main_Data = array("Result"=>"OK","Options"=>$menu);
	//array_push($main_Data,	$menu);
	//print_r($main_Data);
	echo json_encode($main_Data);
}
if($pick=='lookup'){
	$menu = get_lov('id','label','admin_lookup','Root');
	$main_Data = array("Result"=>"OK","Options"=>$menu);
	echo json_encode($main_Data);
}
if($pick=='pages'){
	$menu = get_dropdown_lov('page','admin_lookup',"value","label");
	$main_Data = array("Result"=>"OK","Options"=>$menu);
	echo json_encode($main_Data);
}

if($pick=='dropdown'){
	$list = '';
	$drpdwn = get_lov_where($_GET['k'],$_GET['v'],$_GET['table'],$_GET['where']);
	foreach($drpdwn as $key=>$value){
		$list = $list."<option value='".$value['v']."'>".$value['v']."</option>";
	}	
	echo $list;
}

?>