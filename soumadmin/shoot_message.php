<?php
include("../config2.php");

$msg=$_REQUEST['sms'];
$mob=$_REQUEST['mob'];

$cust_id=$_REQUEST['cust_id'];
$reg_dt=date("Y-m-d H:i:s");

$type = "feedback";

       $message = urlencode($msg);
      $ret = sms_api($mob,$message);
    		        $sql = $db->prepare("insert into customer_msg(cust_id,date,msg,type)values(?,?,?,?)");
					$sql->bind_param("ssss",$cust_id,$reg_dt,$msg,$type);
					$sql->execute();

     //**

     if($ret)
     echo 1;
     else
     print_r($ret);
?>
