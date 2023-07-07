<?php
    //$db = new mysqli('localhost', 'root', '', 'soum_new');
    $db = new mysqli('localhost', 'ASe5t678s3_soum1', 'zDEyFw6Tgi', 'ASe5t678s3_soum1');
	date_default_timezone_set('Asia/Kolkata');
	//include("../config2.php");
	$t_number = $_REQUEST['t_number'];
    $sql="select * from soum_phone_repairing where token_id = '$t_number' limit 1";
	$res=$db->query($sql);	
    $data = array();
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc())
	{
	    $data['name'] =  $row['fname'];
	    $data['mobile_no'] =  $row['mobile_no'];
	    $data['model'] =  $row['modal'];
	    $data['brand'] =  $row['brand'];
	 
	}
	//header('Content-Type: application/json');
	echo json_encode($data);die;
}
?>
