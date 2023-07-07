<?php
	include('config.php');
	
	$mid=mysqli_real_escape_string($db,$_REQUEST['mid']);
	
 
 
$sqli="select * from soum_prod_subsubcat where prod_subsubcat_id=$mid";
$resi=$db->query($sqli);
$rowi=$resi->fetch_assoc();
$prom=$rowi['p_rom'];
$c=substr_count($prom,"/");
$rom=explode("/",$prom);

$r="[";

	foreach($rom as $a=>$b)
	{	
	 $r.='{"rom":"'.$b.'"},';
	}
	$r=substr($r,0,(strlen($r)-1));
	
	$r.="]";

	
 echo $_GET['callback'] . '' .$r. '';
 ?>