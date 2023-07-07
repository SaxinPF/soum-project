<?php
include("../config2.php");
$oid=$_REQUEST['oid'];
$val=$_REQUEST['val'];  
  $sql="update soum_order_master set calls='$val' where order_id=$oid";    
   $res=$db->query($sql);
     if($res)
     echo $act;
     else
     echo 0;
?>