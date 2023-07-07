
<?php
	include('config.php');	
	$imei=$_REQUEST['param'];


	
	$sql = "select id from soum_receipt_note where imi_no =".$imei;


	  $ress = $db->query($sql);
		$coo = $ress->num_rows;
		 echo $coo;
		 ?>

