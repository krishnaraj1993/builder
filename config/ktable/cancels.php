<?php 
include('ktables.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	font-family: Arial,sans-serif;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding-left: 9px;
	font-size: small;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
	padding-top: 2px;
	padding-bottom: 0;
    text-align: left;
    background-color: #0f00a5;
    color: white;
}
.pagination {
    display: inline-block;
}

.pagination a {
    color: white;
    float: left;
    padding: 2px 8px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    font-size: 14px;
}

.pagination a.active {
    background-color: #008CBA;
    color: white;
    border: 1px solid #008CBA;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.Blue {background-color: #0E4557;} 
.Red {background-color: #f44336;}
.Gray {background-color: #e7e7e7; color: black;} 
.Black {background-color: #555555;} 
#customers tr td:last-child { width: 7%; }
.tools{
	    background-color: #3614e4 !important;
}
.tools .components{
	    float: right;
}
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 0 0;
    box-sizing: border-box;
}
.inline_table tr td{
	    padding: 0 !important;
}

/*modal popup*/

h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}

/*form design*/
input[type=text], select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 0px;
    margin-bottom: 5px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=button] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.from_container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

/*components*/
.components ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: transparent;
}

.components li {
    float: left;
}

.components li a {
    display: block;
    color: white;
    text-align: center;
    //padding: 14px 16px;
    text-decoration: none;
}

</style>

  <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
  <script src="jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div id="table1_mytable">
  <?php
  $ktables = new ktables();
  $ktables->register("table1",$ktables);
  $ktables->tablename = 'projects';
  $ktables->rows_view = "0,10";
  $ktables->rowactions = "hidden";
  $ktables->table_string = 'SELECT * FROM cancel T1,recipts T2,admin_user T3 WHERE T2.id = T1.r_id AND T1.uid=T3.id';
  $table = $ktables->headers('Receipt Number=receipt_no','Project Name=project_name','Payment Mode=payment_mode','Amout=Amout','Manager Name=manager_name','Customer Name=customer_name','DSC Name=dse_name','Cancel By=firstname');
  $ktables->render();
  ?>
</div> 

<!-------------------modal----------------------->
<div id="popup1" class="overlay">
	<div class="popup">
		<h5>Add/Amend New Record</h5>
		<a class="close" href="#">&times;</a>
		<div class="form_load">
			plug in still loading
		</div>
	</div>
</div>
</body>
<script>
$(document).ready(function(){
    $(".create_new_item").click(function(){
		var id = $(this).attr('id');
        $.post("controller.php",
        {
          id: id,
		  select:'view_from'
        },
        function(data,status){
            $('.form_load').html(data);
			$(".overlay").css('visibility','visible');
			$(".overlay").animate({'opacity': 3}, 800)
        });
    });
	
	$("#popup1").on('click','.insertktable',function(){
		var id = $(this).attr('id');
		var dbid = $(this).data('update');
		$.post("controller.php",
        $('#ktables'+id).serialize()+ "&select=insert_form&id="+id+"&update="+dbid,
        
        function(data,status){
           	$(".overlay").css('visibility','hidden');
			$(".overlay").animate({'opacity': 0}, 100);
			$('#table1_mytable').html(data);
        });
		 
	});
});

$("#table1_mytable").on('click','.edit_rows',function(){
		var id = $(this).data('id');
		var dbid = $(this).data('dbid');
        $.post("controller.php",
        {
          id: id,
          dbid: dbid,
		  select:'edit_from'
        },
        function(data,status){
            $('.form_load').html(data);
			$(".overlay").css('visibility','visible');
			$(".overlay").animate({'opacity': 3}, 800);
        });
    });

$("#table1_mytable").on('click','.dalete_rows',function(){	
		var id = $(this).data('id');
		var dbid = $(this).data('dbid');
		$.post("controller.php",
        {
          id: id,
          dbid: dbid,
		  select:'delete_from'
        },
        function(data,status){
			$('#table1_mytable').html(data);
        });
});		
	
$("#popup1").on('click','.close',function(){
	$(".overlay").css('visibility','hidden');
	$(".overlay").animate({'opacity': 0}, 100);
});


$("#table1_mytable").on('click','#pagination_nxt',function(){
		var num = $('#pagination_val').val();
		var table_id = $(this).data('id');
        $.post("controller.php",
        {
          id	:table_id,
		  select:'next',
		  num	:num
        },
        function(data,status){
			$('#table1_mytable').html(data);
        });
    });
$("#table1_mytable").on('click','#pagination_prv',function(){
		var num = $('#pagination_val').val();
		var table_id = $(this).data('id');
        $.post("controller.php",
        {
          id	:table_id,
		  select:'privs',
		  num	:num
        },
        function(data,status){
			$('#table1_mytable').html(data);
        });
    });
</script>
</html>
