<?php  
$whrestr = '';
$i = 0;
$flag = 0;
if(isset($_GET['act'])){
	
	$whrestr = 'WHERE ';
	if($_GET['act']=='src'){
		if($_GET['pname']!='select'){
			$flag = 1;
			$whrestr = $whrestr.'project_name="'.$_GET['pname'].'"';
			$i = 1;
		}
		if($_GET['pmode']!='select'){
			$flag = 1;
			if($i==1){
			$whrestr = $whrestr." ".'AND payment_mode="'.$_GET['pmode'].'"';
			$i = 1;
			}else{
			$whrestr = $whrestr." ".'payment_mode="'.$_GET['pmode'].'"';
			$i = 1;
			}
			
		}
		if($_GET['siteno']!='select'){
			$flag = 1;
			if($i==1){
			$whrestr = $whrestr." ".'AND sno="'.$_GET['siteno'].'"';
			$i = 1;
			}else{
			$whrestr = $whrestr." ".'sno="'.$_GET['siteno'].'"';
			$i = 1;
			}
			
		}
		
		if($_GET['mname']!='select'){
			$flag = 1;
			if($i==1){
				$whrestr = $whrestr." ".'AND manager_name="'.$_GET['mname'].'"';
				$i = 1;
			}else{
				$whrestr = $whrestr." ".'manager_name="'.$_GET['mname'].'"';
				$i = 1;
			}			
		}
		if($_GET['cname']!='select'){
			$flag = 1;
			if($i==1){
				$whrestr = $whrestr." ".'AND customer_name	="'.$_GET['cname'].'"';
				$i = 1;
			}else{
				$whrestr = $whrestr." ".'customer_name	="'.$_GET['cname'].'"';
				$i = 1;
			}
		}
		if($_GET['dname']!='select'){
			$flag = 1;
			if($i==1){
				$whrestr = $whrestr." ".'AND dse_name	="'.$_GET['dname'].'"';
				$i = 1;
			}else{
				$whrestr = $whrestr." ".'dse_name	="'.$_GET['dname'].'"';
				$i = 1;
			}
		}
		if(!empty($_GET['date1'])){
			$flag = 1;
			$date1 = $_GET['date1'];
			$date2 = $_GET['date2'];
    		 $date1 = format_date($date1);
	    	 $date2 = format_date($date2);
			if($i==1){
				$whrestr = $whrestr." "."AND date between '".$date1."' and '".$date2."'";
			}else{
				$whrestr = $whrestr." "."date between '".$date1."' and '".$date2."'";
			}
		}
	}
}


if(isset($_GET['filter'])){
	$flag = 1;
	$whrestr = ' ORDER BY `recipts`.`id` '.$_GET['ord'];
}

if($flag==0){
	$whrestr = '';
}

function format_date($date){
	$d = explode('/',$date);
	$real_d = $d[2]."-".$d[0]."-".$d[1];
	return $real_d;
}
 $connect = mysqli_connect("localhost", "admin", "Knp@9845409904", "anugraha");  
 $query ="SELECT * FROM recipts ".$whrestr;  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		   
		   
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
           <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />  
		   
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> 
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script> 
      </head>  
      <body>   
           <div class="">  

                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered" style="font-size: smaller;">  
                          <thead>  
                               <tr>  
                                    <td>receipt_no</td>  
                                    <td>project_name</td>  
                                    <td>payment_mode</td>  
                                    <td>Amout</td>  
                                    <td>manager_name</td>  
                                    <td>customer_name</td>  
                                    <td>dse_name</td> 
                                    <td>inr</td>  
                                    <td>Site Number</td>  
                                    <td>date</td>  
                                    <td>view</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          { 

							 $queryx ="SELECT * FROM cancel WHERE r_id=".$row["id"];  
							 $resultx = mysqli_query($connect, $queryx); 
							 //$rowx = mysqli_fetch_array($resultx);
							 $nrows = mysqli_num_rows($resultx);
							 $color = '';
							 if($nrows==1){
								$color = '#ffd6d6';
							 }
                               echo '  
                               <tr style="background-color: '.$color.'">  
                                    <td>'.$row["receipt_no"].'</td>  
                                    <td>'.$row["project_name"].'</td>  
                                    <td>'.$row["payment_mode"].'</td> 
                                    <td>'.$row["Amout"].'</td> 
                                    <td>'.$row["manager_name"].'</td> 
                                    <td>'.$row["customer_name"].'</td> 
                                    <td>'.$row["dse_name"].'</td> 
                                    <td>'.$row["inr"].'</td> 
                                    <td>'.$row["sno"].'</td> 
                                    <td>'.$row["date"].'</td> 
                                    <td><button type="button" onclick="parent.viewrecipt('.$row["id"].')">view</button></td> 
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  

 <script>  
 $(document).ready(function(){  
 
 $.extend($.fn.dataTable.defaults, {
  dom: 'frtip'
});
 
 
      $('#employee_data').DataTable({
		"order": [[ 0, "desc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
			{
				text: 'Ascending',
                action: function ( e, dt, node, config ) {
                    dt.order([0, 'asc']).draw();
                }
			},
			{
				text: 'Descending',
                action: function ( e, dt, node, config ) {
                   dt.order([0, 'desc']).draw();
                }
			}
        ]
    });  
 });  
 </script>  