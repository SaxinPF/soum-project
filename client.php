<?php
	include('config.php');
	
	$mob=mysqli_real_escape_string($db,$_REQUEST['mob']);
	$act=mysqli_real_escape_string($db,$_REQUEST['act']);	
	if($act=='client')
	{
		$stmt =$db->prepare("select * from soum_master_customer where mobile=?");
        $stmt->bind_param('s', $mob);  
	}
	else
	{
		$stmt =$db->prepare("select * from soum_master_dealer where mobile=?");
        $stmt->bind_param('s', $mob);
	}
	
	$r=array();
    $stmt->execute();	
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc())
	{
	  $r[]=$row;
	}
echo $_GET['callback'] . '(' . json_encode($r). ')';
?>
