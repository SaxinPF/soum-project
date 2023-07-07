﻿<?php
include('../config2.php');

$act=$_REQUEST['act'];
$req_id=$_REQUEST['req_id'];
$enq_name=$_REQUEST['enq_name'];
$enq_mobile=$_REQUEST['enq_mobile'];
$enq_email = $_REQUEST['enq_email'];
$rom = $_REQUEST['rom'];
$color = $_REQUEST['color'];
$drpBrand=$_REQUEST['drpBrand'];
$drpModel=$_REQUEST['drpModel'];
$otherbrand=$_REQUEST['otherbrand'];
$othermodel=$_REQUEST['othermodel'];
$price_field = $_REQUEST['price_field'];
$buyer_date = $_REQUEST['buyer_date'];
$min=mysqli_real_escape_string($db,$_REQUEST['price-min']);
$max=mysqli_real_escape_string($db,$_REQUEST['price-max']);
$desc=mysqli_real_escape_string($db,$_REQUEST['desc']);
$dt=date("Y-m-d H:i:s");
$status=$_REQUEST['status'];
$enq_exchange  = $_REQUEST['enq_exchange'];
$exchange_name = $exchange_mobile = $exchange_desc = $exchange_brand = $exchange_model =  '';
if($enq_exchange=='on'){
$enq_exchange =  1;
$exchange_name    = $_REQUEST['exchange_name'];
$exchange_mobile  = $_REQUEST['exchange_mobile'];
$exchange_desc    = $_REQUEST['exchange_desc'];
$exchange_brand    = $_REQUEST['exchange_brand'];
$exchange_model    = $_REQUEST['exchange_model'];
}else{
$enq_exchange  =  0;
}
//$radio=$_REQUEST['Radio1'];

/* if($radio==1)
$msg=$_REQUEST['sms1'];
else if($radio==2)
$msg=$_REQUEST['sms2'];
else if($radio==3)
$msg=$_REQUEST['sms3'];
else
$msg="Thanks for choosing us for all kind of mobile services. For any further enquiry please contact us on 9828075008/ 9829300040. Team SOUM.";
 */
$msg = mysqli_real_escape_string($db,$_REQUEST['msg']);



    if($act=="add")
	{

	                            $stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $enq_mobile);
								$stmt->execute();
								$res1=$stmt->get_result();
								/** EOF Security Patch IS-002*/
								if(mysqli_num_rows($res1)>0)
								{
                                   $result = $db->query("select * from soum_master_customer where mobile='$enq_mobile'");
							       while ($row = $result->fetch_row()) {
							          $cust_id = (isset($row[0]))?$row[0]:0;
                                   }

								}
							    else
							    {


							        $a=1;
									$utype='Customer';
									$t="CRN";
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,email,mobile,active)values(?,?,?,?,?,?)");
									$sql->bind_param("ssssss",$dt,$utype,$enq_name,$enq_email,$enq_mobile,$a);


									$res=$sql->execute();
									$cust_id = $enq_id=mysqli_insert_id($db);

									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");
									$rest=$token1->execute();
								}





			if($otherbrand!='')
			   $drpBrand=0;

			if($othermodel!='')
			 $drpModel=0;



			$sql = $db->prepare("insert into soum_buyer_requirement(req_dttm,req_name,req_mob,min_price,max_price,brand,model,other_brand,other_model,enq_desc,status,req_email,rom,color,enq_exchange,exchange_name,exchange_mobile,exchange_desc,exchange_brand,exchange_model,buyer_date,price_field,cust_id)
			values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->bind_param('sssssssssssssssssssssss',$dt,$enq_name,$enq_mobile,$min,$max,$drpBrand,$drpModel,$otherbrand,$othermodel,$desc,$status,$enq_email,$rom,$color,$enq_exchange,$exchange_name,$exchange_mobile,$exchange_desc,$exchange_brand,$exchange_model,$buyer_date,$price_field,$cust_id);

			$res=$sql->execute();
			$enq_id=mysqli_insert_id($db);

				$token="ENQ".str_pad ($enq_id,4,'0', STR_PAD_LEFT);


				$token1=$db->prepare("update soum_buyer_requirement set req_token='$token' where req_id=$enq_id");
				$rest=$token1->execute();
		            if($enq_id!='')
		            {

		               $sqlb="select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
							  $resb=$db->query($sqlb);
							  $rowb=$resb->fetch_assoc();
							  $brand=$rowb['prod_subcat_desc'];


							  $sqlm="select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel";
							  $resm=$db->query($sqlm);
							  $rowm=$resm->fetch_assoc();
							  $model=$rowm['prod_subcat_desc'];


							  if($otherbrand!='') $brand=$otherbrand;
							  if($othermodel!='') $model=$othermodel;

		              //$msg= str_replace('~n~',$enq_name,$msg);
		              //$msg= str_replace('~b~',$brand,$msg);
		              //$msg= str_replace('~m~',$model,$msg);
		             // $msg="Thanks ".$enq_name." showing interest in ".$model."(".$brand."). Keep in touch with SOUM for all kind of your mobile services.";
	                  if(!empty($msg)){
					     $message = urlencode($msg);
   					     $ret =  sms_api($enq_mobile,$message);
						}

		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="buyer_requirement.php";
				    </script>
				    <?php

			        }

	    }
		if($act == "edit")
		{

	            $stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $enq_mobile);
								$stmt->execute();
								$res1=$stmt->get_result();
								/** EOF Security Patch IS-002*/
								if(mysqli_num_rows($res1)>0)
								{
								
								  $result = $db->query("select * from soum_master_customer where mobile='$enq_mobile'");
							       while ($row = $result->fetch_row()) {
							          $cust_id = (isset($row[0]))?$row[0]:0;
                                   }
								}
							    else
							    {


							        $a=1;
									$utype='Customer';
									$t="CRN";
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,email,mobile,active)values(?,?,?,?,?,?)");
									$sql->bind_param("ssssss",$dt,$utype,$enq_name,$enq_email,$enq_mobile,$a);


									$res=$sql->execute();
									$cust_id = $enq_id=mysqli_insert_id($db);

									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");
									$rest=$token1->execute();
								}


	          	$sql=$db->prepare("update soum_buyer_requirement set req_name='$enq_name', cust_id='$cust_id', req_mob='$enq_mobile',min_price='$min',max_price='$max',brand='$drpBrand',model='$drpModel',status='$status',color='$color',rom='$rom',req_email='$enq_email' ,enq_exchange='$enq_exchange' ,exchange_name='$exchange_name' ,exchange_mobile='$exchange_mobile' ,exchange_desc='$exchange_desc' ,exchange_model='$exchange_model' ,exchange_brand = '$exchange_brand' ,price_field = '$price_field' ,buyer_date = '$buyer_date' where req_id=$req_id");
				$res=$sql->execute();
				                       if(!empty($msg)){  
										 $message = urlencode($msg);
									     $ret =  sms_api($enq_mobile,$message);
									    }
		            if($res)
		            {

		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="buyer_requirement.php";
				    </script>
				    <?php

			        }


		}

		if($act == "del")
		{
			$sql="delete from soum_buyer_requirement where req_id=$req_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="buyer_requirement.php";
				    </script>
				    <?php

			        }

		}




?>
