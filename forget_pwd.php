<?php
include('config.php');
include('_mail_fire.php');
$utype=$_REQUEST['utype'];
$email=$_REQUEST['email'];

    
   

	$mailtype=11;									   
	$mailsubject="Forget Password";
	$mailtoken=$email;
	$mailto=$email;
	mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);
	
	echo "1";
?>
