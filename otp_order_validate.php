<?php
include('config.php');


$mobile = mysqli_real_escape_string($db,$_REQUEST['mobile']);
$otp=mysqli_real_escape_string($db,$_REQUEST['otp']);
$ord_id=mysqli_real_escape_string($db,$_REQUEST['order_id']);


$flag =0;
$json = array();
$json['errorMessage'] ='';
$json['error'] =0;
$json['redirect'] =  $_SERVER['HTTP_REFERER'];

if(empty($otp)){
$json['errorMessage'] = 'OTP field is required!<br>';
$flag =1;
}

	if($_SESSION['Order_otp']==$otp){
	             $sql_upd=$db->prepare("update soum_order_master set verified='verified' where order_id=$ord_id");
		    	 $result1=$sql_upd->execute();
	}else{
		 $json['errorMessage'] ='Error message: OTP do not match. ';
         $flag =1;
	}
		
	if($flag==1){
	  $json['error'] =1;
	}	
		

	echo json_encode($json);die;
	
?>

