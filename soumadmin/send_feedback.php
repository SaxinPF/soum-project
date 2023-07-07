<?php
include("../config2.php");

$msg=$_REQUEST['sms'];
$mob=$_REQUEST['mob'];
$token=$_REQUEST['token'];
$satisfied=$_REQUEST['satisfied'];
$cust_id=$_REQUEST['cust_id'];
$reg_dt=date("Y-m-d H:i:s");

$type = "feedback";
if(empty($msg)){
   $msg = 'Thanks for being a valuable customer. We go beyond limits to serve you. It would be nice to hear from you. Please click the link below and share your feedback. http://bit.ly/2GQxFZw';
}
       $message = urlencode($msg);
      $ret = sms_api($mob,$message);
        	        $sql = $db->prepare("insert into customer_msg(cust_id,date,msg,type,token,satisfied)values(?,?,?,?,?,?)");
					$sql->bind_param("ssssss",$cust_id,$reg_dt,$msg,$type,$token,$satisfied);
					$sql->execute();

     //**

     if($ret)
     echo 1;
     else
     print_r($ret);
?>
