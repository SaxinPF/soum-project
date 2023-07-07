<?php
include("../config2.php");

$msg=$_REQUEST['sms'];
$mob=$_REQUEST['mob'];
$type=$_REQUEST['type'];
$dt=date("Y-m-d H:i:s");
  
 if($type=='cust')
 {
     $sql="insert into soum_customer_sms_log(sms_log_dt,sms_to,sms_msg)value('$dt','$mob','$msg')";
     $res=$db->query($sql);
  
 }
else if($type=='buy' || $type=='sell' || $type=='repair' || $type=='customer')
 {
     $sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)value('$dt','$type','','','$msg')";
     $res=$db->query($sql);
  
 }

 else
 {
       $sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','Mass','','','$msg')"; 
	   $res=$db->query($sql); 
 
 }
       $message = urlencode($msg);
      $ret = sms_api($mob,$message);
	
      $text = (isset($ret[3]))?$ret[3]:'';	  
      $text2 = (isset($ret[4]))?$ret[4]:'';	  
     //**
  
     if($ret)
     echo 1;
     else
     print_r($ret);
?>