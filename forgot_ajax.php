<?php
include('config.php');


$mobile=mysqli_real_escape_string($db,$_REQUEST['mobile']);


 
$json = array();
$json['errorMessage'] ='';
$json['error'] =0;
$json['redirect'] =$_SERVER['HTTP_REFERER'];

	$sql= "SELECT * FROM soum_master_customer WHERE mobile='$mobile' order by cust_id asc limit 1";

		$result=$db->query($sql);
	    $count = mysqli_num_rows($result);
	
		if($count==1){
		   $row=$result->fetch_assoc();
		 
		   
		   $random = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		   
		    $fname =  $row['fname'];
			
		   if(!empty($fname)){
		        $fname  =  explode(' ',$fname);
				$fname  = (isset($fname[0]))?$fname[0]:'';
				$fname  = strtolower($fname);
		    $random =  $fname.$row['mobile'];
		   }
		   
		     $pass     =  md5($random);
			 $cust_id =  $row['cust_id'];
		     $token1=$db->prepare("update soum_master_customer set user_pass='$pass' where cust_id=$cust_id");								
									$rest=$token1->execute();
		   
		   
            $msg="Hi ".$row['fname']." your password has been changed, your password is: ".$random;
		   $message = urlencode($msg);
		   sms_api($mobile,$message);
		
		}else{
		 $json['errorMessage'] ='Error message: mobile number do not match. ';
         $json['error'] =1;
		}

	echo json_encode($json);die;
	
?>

