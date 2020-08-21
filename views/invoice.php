<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<style>
	/* reset */


/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }


h1 { font: bold 100% sans-serif; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */
/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */


/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
	#button185{		display:none;	}	
	
	
}

@page { margin: 0; }



	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<?php
include("configuratioon/config.php"); 
$id = $_GET['data'];
$remarks = 0;
if(isset($_GET['remarks'])){
	$remarks = $_GET['remarks'];
}
$sql = "SELECT * FROM `recipts` where id=".$id;
$data = runQuery2($sql);

?>
        <div class="content" id="printTable">
            <div class="container-fluid">
                <div class="row" id="printableArea" data-print-content>
				<center>
				<div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width" style="background-color: white;border: 1px solid;">
								<header style="width: 88%;">
									<u><h1 style="font: bold 100% sans-serif;letter-spacing: 1.5em;text-align: center;text-transform: uppercase;">Reciept</h1>		</u>
									<img alt="" src="imgs/logo.jpg" style="width: 89%;height: 144px;margin-right: 6%;">
								</header>
								
								
									<article style="width: 88%;">
										<h1>Recipient</h1>

										<table class="meta">
											<tr>
												<th><span>Invoice #</span></th>
												<td><span><?php  echo $data[0]['receipt_no']; ?></span></td>
											</tr>
											<tr>
												<th><span>Date</span></th>
												<td><span><?php  echo $data[0]['date']; ?></span></td>
											</tr>
										</table>
										<table class="inventory">
											<thead>
												<tr>
													<th><span>Customer Name</span></th>
													<th><span>Project Name</span></th>
													<th><span>Payment mode</span></th>
													<th><span>Chq Card Ref Number</span></th>
													<th><span>Amount</span></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><span><?php  echo $data[0]['customer_name']; ?></span></td>
													<td><span><?php  echo $data[0]['project_name']; ?></span></td>
													<td><span data-prefix></span><span><?php  echo $data[0]['payment_mode']; ?></span></td>
													<td><span><?php  echo $data[0]['chq_no']; ?></span></td>
													<td><span data-prefix>Rs:&nbsp;</span><span><?php  echo $data[0]['Amout']; ?></span></td>
												</tr>
											</tbody>
										</table>
										<?php
										if($remarks==1){
										?>
										<table class="">
											<tr>
												<th style="width: 125px;"><span>Manager Name</span></th>
												<td><span><?php  echo $data[0]['manager_name']; ?></span></td>
											</tr>
											<tr>
												<th><span>DSE Name</span></th>
												<td><span><?php  echo $data[0]['dse_name']; ?></span></td>
											</tr>
											<tr>
												<th><span>Remarks</span></th>
												<td><span><?php  echo $data[0]['remarks']; ?></span></td>
											</tr>
										</table>
										<br/>
										<?php
										}
										?>
										<table class="balance" style="width: 55% !important;">
											<tr>
												<th><span>Total</span></th>
												<td><span data-prefix>Rs:&nbsp;</span><span><?php  echo $data[0]['Amout']; ?></span></td>
											</tr>
											<tr>
												<th><span>Amount Paid</span></th>
												<td><span data-prefix>Rs:&nbsp;</span><span><?php  echo $data[0]['Amout']; ?></span></td>
											</tr>
											<tr>
												<th><span>INR</span></th>
												<td><span data-prefix></span><span><?php  echo $data[0]['inr']; ?></span></td>
											</tr>
										</table>
										<br/>
										<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<p style="float: left;">Receipted by : <?php  echo getuser_details($data[0]['created_by']); ?></p>
										<p style="float: right;">Anugraha Properties</p>
									</article>
									
									
										<aside>
											<h1><span></span></h1>
											<div>
												
											</div>
										</aside>				

															</div>
														</div>
													</div>
													
													</center>
												</div>
												
												<center><button type="button" id="button185" class="btn btn-info btn-fill pull-right" onclick="print_div()" style="margin-right: 41%;" >Print Content</button><?php if(isset($_GET['page'])){ ?><button type="button" class="btn btn-danger btn-fill" onclick="gotoback(<?php echo $_GET['page']; ?>)">Back</button><?php } ?></center>
											</div>
										</div>

<script>
function print_div(){
	window.print();
}

function gotoback(id){
	$('#page_loader_div').load('views/Reciept.php?page='+id);
	
}
</script>
<?php
function getuser_details($userid){
	$sql = "SELECT * FROM admin_user where id=".$userid;
	$data = runQuery2($sql);
	if(empty($data)){
		return $userid;
	}else{
		return $data[0]['firstname']." ".$data[0]['lastname'];
	}
}	
?>