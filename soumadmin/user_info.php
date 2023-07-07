<?php 
include('../config.php');
$mob=$_REQUEST['mobile'];



$sql="select * from soum_master_customer where mobile='$mob'";
$result=$db->query($sql);
$r=array();
while($row=$result->fetch_assoc())
{
$r[]=$row;
}

echo $_GET['callback'] . '(' . json_encode($r). ')';

?>