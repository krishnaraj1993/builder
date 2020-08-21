<?php
include('config.php');
session_start();
if(empty($_SESSION["user"])){
	header("Location:login/index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>anugraha</title>


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
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


h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

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

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

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

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

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
	
		<script>
	var doc = new jsPDF();
	var specialElementHandlers = {
	  '#editor': function(element, renderer) {
		return true;
	  }
	};
	
	function ex(){
	var options = {
	backgroundColor: "#fffff"};
	var pdf = new jsPDF('p', 'pt', 'a4');
	pdf.addHTML($("#printableArea"), 15, 15, options, function() {
    pdf.save('Recipt.pdf');
  });
}

function printDiv(divName) {
     var printContents = document.getElementById("middle").innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
	</script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                   Anugraha
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>Create Reciept</p>
                    </a>
                </li>
                <li>
                    <a href="view.php">
                        <i class="pe-7s-note2"></i>
                        <p>View Reciept</p>
                    </a>
                </li>
                <li style="display:<?php if($_SESSION["role"]=='user'){ echo 'none'; } ?>">
                    <a href="new_project.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Add Projects</p>
                    </a>
                </li>
                <li style="display:<?php if($_SESSION["role"]=='user'){ echo 'none'; } ?>">
                    <a href="manager.php">
                        <i class="pe-7s-science"></i>
                        <p>Add Manager</p>
                    </a>
                </li>
                <li style="display:<?php if($_SESSION["role"]=='user'){ echo 'none'; } ?>">
                    <a href="des.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Add DES</p>
                    </a>
                </li>
                <li style="display:<?php if($_SESSION["role"]=='user'){ echo 'none'; } ?>">
                    <a href="Reports.php">
                        <i class="pe-7s-bell"></i>
                        <p>Reports</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                      
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
<?php
$id = $_GET['data'];
$sql = "SELECT * FROM `recipts` where id=".$id;
 $data = runQuery($sql);
?>
        <div class="content" id="middle">
            <div class="container-fluid">
                <div class="row" id="printableArea">
				<center>
				<div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
								<header style="width: 88%;">
									<h1>Reciept</h1>		
									<img alt="" src="logo.jpg" style="width: 89%;height: 144px;margin-right: 6%;">
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
											<tr>
												<th><span>Recipient Created By</span></th>
												<td><span data-prefix></span><span><?php  echo $data[0]['created_by']; ?></span></td>
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
												
												<center><button type="button" id="button185" onclick="printDiv('printableArea')" class="btn btn-info btn-fill pull-right" style="margin-right: 41%;">Print Content</button></center>
											</div>
										</div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>