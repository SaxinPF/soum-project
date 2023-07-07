<?php
include('config.php');


$mobile = mysqli_real_escape_string($db,$_REQUEST['mobile']);
$otp=mysqli_real_escape_string($db,$_REQUEST['otp']);


$flag =0;
$json = array();
$json['errorMessage'] ='';
$json['error'] =0;
$json['redirect'] =  $_SERVER['HTTP_REFERER'];

if(empty($otp)){
$json['errorMessage'] = 'OTP field is required!<br>';
$flag =1;
}

	$sql= "SELECT * FROM soum_master_customer WHERE mobile='$mobile' and OTP='$otp'";

		$result=$db->query($sql);
	    $count = mysqli_num_rows($result);
	
		if($count==1){
		   $row=$result->fetch_assoc();
		   
		       $fname =  $row['fname'];
			   $json['name'] =$fname;
               $json['mobile'] =$mobile;
	
		   
		   
			 $cust_id =  $row['cust_id'];
		     $token1=$db->prepare("update soum_master_customer set active=1 where cust_id=$cust_id");								
									$rest=$token1->execute();
		   
		   
			 $msg="Thanks for registering. Welcome to SOUM.";
			 $message = urlencode($msg);
			 sms_api($mobile,$message);
		   
		   	$_SESSION['poster_id']= $cust_id;
			$_SESSION['poster_type']="Customer";
		
		}else{
		 $json['errorMessage'] ='Error message: OTP do not match. ';
         $flag =1;
		}
		
	if($flag==1){
	  $json['error'] =1;
	}	
		

	echo json_encode($json);die;
	
?>

