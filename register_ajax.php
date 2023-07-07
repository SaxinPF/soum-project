<?php
include('config.php');
/** BOF Security Patch IS-002*/
$name=mysqli_real_escape_string($db,$_REQUEST['fname']);
$mobile=mysqli_real_escape_string($db,$_REQUEST['mobile']);

$reg_dt=date('Y-m-d H:i:s');
/** EOF Security Patch IS-002*/
$flag =0;
$json = array();
$json['errorMessage'] ='';
$json['error'] =0;
$json['redirect'] =$_SERVER['HTTP_REFERER'];
if(empty($name)){
$json['errorMessage'] = 'Name field is required!<br>';
$flag =1;
}
if(empty($mobile)){
$json['errorMessage'] .= 'Mobile field is required!<br>';
$flag =1;
}

$json['name'] =$name;
$json['mobile'] =$mobile;
    if($flag==0){
		$stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $mobile); 
								$stmt->execute();
								$res1=$stmt->get_result();
								
								if(mysqli_num_rows($res1)>0)
								{
								     $row=$res1->fetch_assoc();
									 $json['name'] = $row['fname'];
									   $_SESSION['poster_id']= $row['cust_id'];
			                           $_SESSION['poster_type']="Customer";
								}else{
								
							        $a=1;   
									$utype='Customer';									
									$t="CRN";
								
									
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,mobile,active)values(?,?,?,?,?)");
									$sql->bind_param("sssss",$reg_dt,$utype,$name,$mobile,$a); 									
							    									
										
									$res=$sql->execute();
									$enq_id=mysqli_insert_id($db);
								
									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);						        
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");								
									$rest=$token1->execute();
									
									

									
									if($res)
									{
							         $msg="Thanks for registering. Welcome to SOUM.";
									 $message = urlencode($msg);
								
									 sms_api($mobile,$message);
									
									 $msg2="Register a customer with soum portal Id#".$token;
									 $message2 = urlencode($msg2);
								     sms_api(AdminMob,$message2);
	
									    
									  
										$_SESSION['poster_id']= $enq_id;
										$_SESSION['poster_type']="Customer";
										
										?>
									
							<?php }
									
							}
	
	
	}else{
	 $json['error'] =1;
	}							

	echo json_encode($json);die;
?>
