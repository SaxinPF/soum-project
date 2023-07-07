<?php

include('../config.php');

include('../_mail_fire.php');





$utype1=$_SESSION['poster_type'];

$userid=$_SESSION['poster_id'];



$dt=date('Y-m-d H:s:i');

$cust_id=$_REQUEST['cid'];

$fname=$_REQUEST['name1'];

$mail=$_REQUEST['email'];

$mobile=$_REQUEST['mobile'];

$address=$_REQUEST['address'];

$pincod=$_REQUEST['pincod'];

$city=$_REQUEST['city'];

$dob=$_REQUEST['dob'];

$doa=$_REQUEST['doa'];

$dob = date("Y-m-d", strtotime($dob));

$doa = date("Y-m-d", strtotime($doa));



$pid=$_REQUEST['prod_id'];

$pname=$_REQUEST['prod_name'];

$amt=$_REQUEST['amt'];









if($cust_id=='')

{

$cust="insert into soum_master_customer(user_type,fname,email,user_pass,address,city,mobile,pincod,type,subscribe,active,dob,doa)

 values('Customer','$fname','$mail','','$address','$city','$mobile','$pincod','offline','yes',1,'$dob','$doa')"; 

$custres=$db->query($cust);

$cust_id=mysqli_insert_id($db);

	$rtoken="CWN".str_pad ($cust_id,4,'0', STR_PAD_LEFT);

	

	$token1r="update soum_master_customer set reg_id='$rtoken' where cust_id=$cust_id";

	$db->query($token1r);

}





$qry="insert into soum_order_master (order_date,order_type,cust_id,cust_type, fname, mail, mobile,shipping_address,active)

		  values('$dt','used','$cust_id','Customer','$fname', '$mail', '$mobile', '$address',1)";

	$res=$db->query($qry);

	$ord_id=mysqli_insert_id($db);

	$token="ORD".str_pad ($ord_id,4,'0', STR_PAD_LEFT);

	

	$token1="update soum_order_master set order_token='$token' where order_id=$ord_id";

	$rest=$db->query($token1);

	

	



	if($pid!='')

	{

	

		 $stock="select * from soum_product_master where prod_id=$pid";

		 $ress=$db->query($stock);

		 $rows=$ress->fetch_assoc();

		 $cstock=$rows['current_stock'];

		

		$totstock=$cstock-$quantity;

		

		$upd_stock="update soum_product_master set current_stock=$totstock where prod_id=$pid ";

		$db->query($upd_stock);

	

	}



	$sql="insert into soum_order_details (order_id,prod_id,prod_name,qty,price) values('$ord_id','$pid','$pname','1','$amt')";

	$result=$db->query($sql);



if($result)
//header("location:walking_user.php");
echo "<script>window.location.href='walking_user.php';</script>";



?>