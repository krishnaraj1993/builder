<?php
include('ktables.php');
$id = $_POST['id'];
$select = $_POST['select'];
if($select=='view_from'){
	$object = $_SESSION[$id];
	$object->render_form();
}
if($select=='insert_form'){
	$object = $_SESSION[$id];
	$update = $_POST['update'];
	$object->insert_data($_POST,$update);
}

if($select=='edit_from'){
	$dbid = $_POST['dbid'];
	$object = $_SESSION[$id];
	$object->form_edit($dbid);
}
if($select=='delete_from'){
	$dbid = $_POST['dbid'];
	$object = $_SESSION[$id];
	$object->form_delete($dbid);
}
if($select=='next'){
	$object = $_SESSION[$id];
	$num = $_POST['num'];
	$num = ($num*10)-10; 
	$nxt = $num+10;
	$object->rows_view = $nxt.",10";
	$object->render($nxt);
}
if($select=='privs'){
	$object = $_SESSION[$id];
	$num = $_POST['num'];
	$nxt = $num-10;
	if($nxt<0){ $nxt = 1; $num=0; }
	$object->rows_view = $nxt.",10";
	$object->render();
}

?>