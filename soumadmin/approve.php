<?php
include("../config2.php");
$pid=$_REQUEST['prod_id'];
$act=$_REQUEST['act'];
$mob=$_REQUEST['mob'];
$token="PRD".str_pad ($pid,4,'0', STR_PAD_LEFT); 
  
  if($act==1)
  {
  $sql="update soum_product_master set active=1,visiable=1 where prod_id=$pid";
    //***************************************************************************************************     
       $msg='Status for Token Id '.$token.' has been updated to "Approved".  Thank you - Team Soum.';
       $message = urlencode($msg);
       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mob."&sms=".$message."&senderid=MYSOUM";
       $ret = file($url);       
     //**
  }
  else if($act==0)
  {
  $sql="update soum_product_master set active=0,visiable=0 where prod_id=$pid";
    //***************************************************************************************************     
       $msg='Status for Token Id '.$token.' has been updated to "Disapproved".  Thank you - Team Soum.';
       $message = urlencode($msg);
       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mob."&sms=".$message."&senderid=MYSOUM";
       $ret = file($url);       
     //**
  }
  else if($act==2)
  {
  $sql="update soum_product_master set priority=1 where prod_id=$pid";
   //***************************************************************************************************     
       $msg='Status for Token Id '.$token.' has been updated to "Set Priority".  Thank you - Team Soum.';
       $message = urlencode($msg);
       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mob."&sms=".$message."&senderid=MYSOUM";
       $ret = file($url);       
     //**
  }
  else if($act==3)
  {
  $sql="delete from soum_product_master where prod_id=$pid";
   //***************************************************************************************************     
       $msg='Status for Token Id '.$token.' has been updated to "Deleted".  Thank you - Team Soum.';
       $message = urlencode($msg);
       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mob."&sms=".$message."&senderid=MYSOUM";
       $ret = file($url);       
     //**
  }
  //echo $sql;
   $res=$db->query($sql);
     if($res)
     echo $act;
     else
     echo 0;
?>