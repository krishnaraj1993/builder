<?php
include("configuratioon/config.php"); 
?>
<div class="container" style="width: 100%;">
	<div class="panel-group">
	  <div class="panel panel-default">
		<div class="panel-heading">
		  <h4 class="panel-title">
			<a data-toggle="collapse" href="#collapse1">Apply Filter</a>
		  </h4>
		</div>
		<div id="collapse1" class="panel-collapse collapse">
		  <div class="panel-body">
	<table class="table">
    <tbody>
      <tr>
        <td>Project Name</td>
        <td> 
		<select class="form-control" id="pname">
		<option>select</option>
		<?php
		$sql2 = "select * from projects";
		$dat = runQuery2($sql2);
		$n = sizeof($dat);
		for($i=0;$i<$n;$i++){
			echo "<option data-optionval='".$dat[$i]['pname']."'>".$dat[$i]['pname']."</option>";
		}
		?>
		</select>
		</td>
        <td>payment Mode</td>
		<td> 
		<select class="form-control" id="pmode">
			<option>select</option>
			<option>Cash</option>
			<option>Card</option>
			<option>Cheque</option>
			<option>DD</option>
			<option>NEFT</option>
		</select>
		</td>
      </tr>
      <tr>
        <td>manager_name</td>
        <td> 
		<select class="form-control" id="mname">
		<option>select</option>
			<?php
			$sql2 = "select * from 	managers";
			$dat = runQuery2($sql2);
			$n = sizeof($dat);
			for($i=0;$i<$n;$i++){
				echo "<option>".$dat[$i]['name']."</option>";
			}
			?>
		</select>
		</td>
        <td>customer_name</td>
		
		<td> 
		<select class="form-control" id="cname">
		<option>select</option>
		<?php
			$sql2 = "SELECT DISTINCT customer_name FROM `recipts` WHERE 1";
			$dat = runQuery2($sql2);
			$n = sizeof($dat);
			for($i=0;$i<$n;$i++){
				echo "<option>".$dat[$i]['customer_name']."</option>";
			}
			?>
		</select>
		</td>
      </tr>
	 <tr>
        <td>BDE Name</td>
        <td> 
		<select class="form-control" id="dname">
		<option>select</option>
			<?php
			$sql2 = "select * from 	bde";
			$dat = runQuery2($sql2);
			$n = sizeof($dat);
			for($i=0;$i<$n;$i++){
				echo "<option>".$dat[$i]['name']."</option>";
			}
			?>
		</select>
		</td>
        <td>Date</td>
		<td> 
		  <table style="width: 100%;"><tr>
		  <td><input type="text" class="form-control" id="date1"></td>
		  <td>To</td>
		  <td><input type="text" class="form-control" id="date2"></td>
		  </tr></table>
		</td>
      </tr>
	  <tr>
	  <td>
	  Site Number
	  </td>
	  <td>
		<select class="form-control" id="siteno">
		<option>select</option>
		<?php
			$sql2 = "SELECT DISTINCT sno FROM `recipts` WHERE 1";
			$dat = runQuery2($sql2);
			$n = sizeof($dat);
			for($i=0;$i<$n;$i++){
				echo "<option>".$dat[$i]['sno']."</option>";
			}
			?>
		</select>
	  </td>
	  </tr>
    </tbody>
  </table></div>
		  <div class="panel-footer">
		  <button class="btn btn-success" type="button" onclick="submit_to_frame()">Submit</button>
		  <button class="btn btn-primary" type="button" onclick="asc_to_frame()">Asc Order</button>
		  <button class="btn btn-primary" type="button" onclick="disc_to_frame()">Disc Order</button>
		  
		  </div>
		</div>
	  </div>
	</div>
	<iframe src="views/test.php" id="loadframe" style="width: 100%;height: 580px;border: 0;"></iframe>
</div>
<script>
$(document).ready(function(){
               //$( "#date1" ).datepicker();
               //$( "#date2" ).datepicker();
});

$(function () {
  $("#date1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker();
  
  $("#date2").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker();
});

function asc_to_frame(){
	$('#loadframe').attr('src','views/test.php?filter=true&ord=ASC');
}

function disc_to_frame(){
	$('#loadframe').attr('src','views/test.php?filter=true&ord=DESC');
}

function submit_to_frame(){
	var pname = $('#pname').val();
	var pmode = $('#pmode').val();
	var mname = $('#mname').val();
	var cname = $('#cname').val();
	var dname = $('#dname').val();
	var date1 = $('#date1').val();
	var date2 = $('#date2').val();
	var siteno = $('#siteno').val();
	
	$('#loadframe').attr('src','views/test.php?act=src&pname='+pname+'&pmode='+pmode+'&mname='+mname+'&cname='+cname+'&dname='+dname+'&date1='+date1+'&date2='+date2+'&siteno='+siteno)
}

function viewrecipt(id){
	//$('#page_loader_div').load('views/invoice.php?data='+id+"&remarks=1");
	window.open("invoice2.php?data="+id+"&remarks=1", "_blank");
}
</script>