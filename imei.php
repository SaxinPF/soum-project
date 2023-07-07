<?php
	include('config.php');
	
	$val=mysqli_real_escape_string($db,$_REQUEST['val']);
	
 
 
$sqli="select * from soum_product_master where imei_no=$val";
$resi=$db->query($sqli);
if(mysqli_num_rows($resi)>0)
{
  $r=1;
}
else
{
  $r=0;

}

echo $_GET['callback'] . '('. json_encode($r).')';
?>