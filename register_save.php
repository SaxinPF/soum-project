<?php
include('config.php');


$mobile=mysqli_real_escape_string($db,$_REQUEST['mobile']);
$password=mysqli_real_escape_string($db,$_REQUEST['password']);
 $pass = md5($password);
 
$json = array();
$json['errorMessage'] ='';
$json['error'] =0;
$json['redirect'] =$_SERVER['HTTP_REFERER'];
	$sql= "SELECT * FROM soum_master_customer WHERE mobile='$mobile' and user_pass='$pass'";

		$result=$db->query($sql);
	    $count = mysqli_num_rows($result);
	
		if($count==1){
		   $row=$result->fetch_assoc();
		   if($row['active']==1){
			  $json['name'] = $row['fname'];
			  $json['mobile'] =$mobile;
			  $_SESSION['poster_id']= $row['cust_id'];
			  $_SESSION['poster_type']="Customer";
		  }else{
		    $json['errorMessage'] ='Error message: your account is not verified.';
            $json['error'] = 1;
		 }	
		
		}else{
		 $json['errorMessage'] ='Error message: mobile number and password do not match. ';
         $json['error'] =1;
		}

	echo json_encode($json);die;
	
?>

