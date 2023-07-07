<?php
include("../config2.php");

$ord_det_id=$_REQUEST['ord_det_id'];
$sell_price=$_REQUEST['sell_price'];
  

$update=$db->prepare("update soum_order_details set sell_price=$sell_price where ord_det_id=$ord_det_id");
$res1=$update->execute();    
if($res1){ 
     echo 1;
}else{
     echo 19;
}
  
 
?>