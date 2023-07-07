<?php
 include('config.php');
 include('../_mail_fire.php');
			        	
$name=mysqli_real_escape_string($db,$_REQUEST['name']);
$email=mysqli_real_escape_string($db,$_REQUEST['email']);
$msg=mysqli_real_escape_string($db,$_REQUEST['msg']);						
$subject=mysqli_real_escape_string($db,$_REQUEST['sub']);
$mobile=mysqli_real_escape_string($db,$_REQUEST['mob']);
$dt=date('Y-m-d H:s:i');
$type=mysqli_real_escape_string($db,$_REQUEST['type']);
						
					
						
	 $sql13=$db->prepare("insert into soum_feedback(dttm,enquiry_type,fname,email,mobile,msg,subject)values(?,?,?,?,?,?,?)");
	 $sql13->bind_param("sssssss",$dt,$type,$name,$email,$mobile,$msg,$subject);
	 $res=$sql13->execute();
	 $enq_id=mysqli_insert_id($db);
		$token="FBN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
		
		$token1=$db->prepare("update soum_feedback set token_id='$token' where feedback_id=$enq_id");
		$rest=$token1->execute();
	    $mailtype=10;
		$mailsubject="SOUM feedback & ContactUs";
		$mailtoken=$token;
		$mailto=$email;
		mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);
		
 $msg="Thank you for contacting Soum for enquiry/ feedback.";
 $message = urlencode($msg);
 $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
 $ret = file($url);
	 
	 if($res)
	 $r=1;
	 else
	 $r=0;
	 
	 
	 
echo $_GET['callback'] . '(' . $r. ')';
								           
?>
			        	