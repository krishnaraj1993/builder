<?php
$page = 0;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
?>
<table>
<tr>
<td>
Search &nbsp;
</td>
<td>
<select id="search_src" onchange="set_dest(this)">
<option value="receipt_no">By Receipt No</option>
<option value="project_name">By Project Name</option>
<option value="payment_mode">By Payment Mode</option>
<option value="manager_name">Manager Name</option>
<option value="customer_name">By Customer Name</option>
<option value="dse_name">By DSE</option>
</select>
</td>
<td>
&nbsp;&nbsp;
<input id="search_dsc" onblur="set_iframe(this)"/>
</td> 
<td>
&nbsp;&nbsp;&nbsp;Order By&nbsp;&nbsp;
</td>
<td>
<button type="button" onclick="odered_list('ASC');">ASC</button>&nbsp;
</td>
<td>
<button type="button" onclick="odered_list('DESC');">DESC</button>&nbsp;
</td>
</tr>
<table>
<iframe id="load_data_frm" src="config/ktable/Reciept.php?page=<?php echo $page ?>" style="width: 103%;height: 668px;border: 1px;">
  <p>Your browser does not support iframes.</p>
</iframe>

<script>
$(document).ready(function(){
  odered_list('DESC');
});
function callmain(id,paged){
	$('#page_loader_div').load('views/invoice.php?data='+id+"&page="+paged);
	//window.open("../../views/invoice2.php?data="+id+"", "_blank");
}

function set_dest(obj){
	var val = obj.value;
	$('#search_dsc').load('config/php/lovs.php?data=dropdown&k='+val+'&v='+val+'&table=recipts&where=0');
}
function set_iframe(obj){
	var f1 = $('#search_src').val();
	var f2 = obj.value;
	$('#load_data_frm').attr('src','config/ktable/Reciept.php?page=1&sort=1&lbl='+f1+'&val='+f2);
}

function odered_list(ord){
	var str = 'ORDER BY recipts.id '+ord;
	$('#load_data_frm').attr('src','config/ktable/Reciept.php?page=1&ord=1&str='+str);
}
</script>

