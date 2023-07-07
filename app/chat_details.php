<?php 
include('config.php');
$emp_id=$_REQUEST['bid'];
$uid=$_REQUEST['sid'];
$pid=$_REQUEST['pid'];
$stype=$_REQUEST['stype'];
$d=date('Y-m-d');

$qry="update emp_chat set active=1 where not_to=$emp_id and prod_id=$pid";
$db->query($qry);

$r=array();

 

		$sql="select * from emp_chat where 1=1 and prod_id=$pid and (not_to=$uid or invite_by=$uid) and (not_to=$emp_id or invite_by=$emp_id)";

		

		$result=$db->query($sql);
		while($row=$result->fetch_assoc())

		{

		$r[]=$row;

		}

		

echo $_GET['callback'] . '(' . json_encode($r). ')';



?>