<?php
include('config.php');
$emp_id=$_REQUEST['bid'];
$btype=$_REQUEST['btype'];

$user_id=$_REQUEST['sid'];
$stype=$_REQUEST['stype'];

$msg=mysqli_real_escape_string($db,$_REQUEST['msg']);
$pid=$_REQUEST['pid'];
$dttm=date('Y-m-d H:i:s');

		$sql="INSERT INTO emp_chat(not_dttm,prod_id,invite_by_type,invite_by,not_to_type,not_to,text,active)VALUES('$dttm','$pid','$btype','$emp_id','$stype','$user_id','$msg','0')";
		$res=$db->query($sql);
			if($res)
			{
			$r=1;
			}
			else
			{
			$r=0;
			}
					
echo $_GET['callback'] . '{"res":"' . $r. '"}';
					
?>