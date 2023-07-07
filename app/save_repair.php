<?php
include('config.php');

$cid=$_REQUEST['cid'];
$dt=date('Y-m-d H:s:i');
$name=$_REQUEST['name'];
$mob=$_REQUEST['mob'];
$mail=$_REQUEST['mail'];
$add=$_REQUEST['add'];
$brand=$_REQUEST['brand'];
$model=$_REQUEST['model'];
$msg=$_REQUEST['msg'];
$ptype=$_REQUEST['ptype'];
$ptype=substr($ptype,0,(strlen($ptype)-1));
	
    $sql=$db->prepare("insert into soum_phone_repairing(rep_ddtm,fname,email,mobile_no,adress,prob_type,brand,modal,description) 
	values(?,?,?,?,?,?,?,?,?)"); 
	$sql->bind_param("sssssssss",$dt,$name,$mail,$mob,$add,$ptype,$brand,$model,$msg);
	//echo $sql;
	$res=$sql->execute();
	$enq_id=mysqli_insert_id($db);
	$token="RPN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
	
	$token1=$db->prepare("update soum_phone_repairing set token_id='$token' where repairing_id=$enq_id");
	$rest=$token1->execute();

    
    
    
    if($res)
    $id=$enq_id;
    else
    $id=0;
 echo $_GET['callback'] . '(' . $id. ')';

?>
