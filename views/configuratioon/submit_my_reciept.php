<?php
include('config.php');
session_start();
$rno=$_POST['v1'];
$pname=$_POST['v3'];
$pmode = $_POST['v7'];
$amount =$_POST['v9'];
$mname =$_POST['v5'];
$cname = $_POST['v4'];
$dscname= $_POST['v6'];
$chqno =$_POST['v8'].": ".$_POST['v15'];
$inr =$_POST['v10'];
$siteno =$_POST['v25'];
$remarks =$_POST['v17'];
$user = $_SESSION['userid'];
$sql ="INSERT INTO `recipts`(`id`, `receipt_no`, `project_name`, `payment_mode`, `Amout`, `manager_name`, `customer_name`, `dse_name`, `chq_no`, `inr`, `date`, `sno`,`remarks`,`created_by`) VALUES (NULL,'$rno','$pname','$pmode','$amount','$mname','$cname','$dscname','$chqno','$inr',CURDATE(),'$siteno','$remarks','$user')";
echo runQuery_insert_db($sql);

/*$sql1 ="select MAX(id) from `recipts`";
$data1 = runQuery2($sql1);
$rid = $data1[0]['MAX(id)'];

$sql2 ="INSERT INTO `remarks`(`rid`,`mid`,`remarks`) VALUES(NULL,'$rid','$remarks')";
runQuery_insert_db($sql2);*/


?>