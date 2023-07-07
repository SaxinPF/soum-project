<?php
    //$db = new mysqli('localhost', 'root', '', 'soum_new');
    $db = new mysqli('localhost', 'ASe5t678s3_dont', 'zfrvFZAt0FU6zT9CqdeN', 'ASe5t678s3_dont');
	date_default_timezone_set('Asia/Kolkata');
	//include("../config2.php");
	$r_cn_number = $_REQUEST['r_cn_number'];
    $sql="select * from soum_receipt_note where imi_no = '$r_cn_number' limit 1";
	$res=$db->query($sql);
    $data = array();
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc())
	{
	    $data['id'] =  $row['id'];
	    $data['receipt_date'] =  date('d/m/Y',$row['date_d']);
	    $data['quantity'] =  $row['quantity'];
	    $data['model'] =  $row['model'];
	    $data['brand'] =  $row['brand'];
	    $data['colour'] =  $row['colour'];
	}
	//header('Content-Type: application/json');
	echo json_encode($data);die;
}
?>
