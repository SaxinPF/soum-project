<?php
include('config.php');
//include('_mail_fire.php');
$user_type = mysqli_real_escape_string($db,$_SESSION['poster_type']);

$flag =0;
$json = array();
$json['errorMessage'] ='';
$json['error'] =0;
$json['redirect'] =  $_SERVER['HTTP_REFERER'];

$prod_id=$_REQUEST['prod_id'];
$name=$_POST['name'];
$mobile=$_REQUEST['mobile'];
$desc=$_REQUEST['desc'];
$category_type = $_REQUEST['category_type'];
$t="CRN";

if(empty($name)){
$json['errorMessage'] = 'Name field is required!<br>';
$flag =1;
}

if(empty($mobile)){
$json['errorMessage'] .= 'Mobile number is required!<br>';
$flag =1;
}
$delivery_address = '';
if(isset($_REQUEST['delivery_address'])){
 $delivery_address =    $_REQUEST['delivery_address'];
	  if(empty($delivery_address)){
		 $json['errorMessage'] .= 'Delivery Address is required!<br>';
		$flag =1;
	  }
}


if($flag ==0){
	if($user_type =='Customer'){//Login Customer session.
	   $user_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);

	}else{
	       if($user_type ==''){//No Dealer or No Admin.
	           	$sql= "SELECT * FROM soum_master_customer WHERE mobile='$mobile' order by cust_id asc limit 1";
				$result=$db->query($sql);
	            $count = mysqli_num_rows($result);
			         if($count==1){
		                $row=$result->fetch_assoc();
						 $user_id =  $row['cust_id'];
			         }else{
			  			   $sql1=$db->prepare("insert into soum_master_customer(user_type,fname,mobile)value('Customer','$name','$mobile')");
						   $res=$sql1->execute();
						   $user_id=mysqli_insert_id($db);

							$token=$t."".str_pad ($user_id,4,'0', STR_PAD_LEFT);
						    $token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$user_id");
						    $rest=$token1->execute();
					}
			}else{
			    $json['errorMessage'] = 'Please login as customer!<br>';
			    $json['error'] =1;
			}
	}
}else{
 $json['error'] =1;
}



if($json['error'] ==0){

            $sql_1="select * from soum_order_master,soum_order_details
					where soum_order_master.order_id=soum_order_details.order_id
					and soum_order_master.cust_type='$user_type'
					and soum_order_master.cust_id=$user_id
					and soum_order_details.prod_id=$prod_id";
			$res_1=$db->query($sql_1);
			if(mysqli_num_rows($res_1)>0)
			 {
			    $json['errorMessage'] = 'You are already shown your interest in this product!<br>';
			    $json['error'] =1;
			 }
}


if($json['error'] ==0){

			$sql1="select * from soum_master_customer where cust_id=$user_id";
			$res=$db->query($sql1);
			$row=$res->fetch_assoc();
			$fname = $name; //$row['fname'];
			$mail=$row['email'];
			$mobile=$row['mobile'];
			$address=$row['address'];
			$id=$row['cust_id'];
			$dt=date('Y-m-d H:s:i');

			$to = $mail;
			$a=1;
			$used='used';

				$qry=$db->prepare("insert into soum_order_master (order_date,order_type,cust_id,cust_type,fname, mail, mobile, shipping_address,active,description,category_type)values(?,?,?,?,?,?,?,?,?,?,?)");
				$qry->bind_param("sssssssssss",$dt,$used,$id,$user_type,$fname,$mail, $mobile, $delivery_address,$a,$desc,$category_type);
				$res=$qry->execute();
			if($res)
			{
				$ord_id=mysqli_insert_id($db);
				$token="ORD".str_pad ($ord_id,4,'0', STR_PAD_LEFT);

				$sql_upd=$db->prepare("update soum_order_master set order_token='$token' where order_id=$ord_id");
		    	 $result1=$sql_upd->execute();




				  $selorder_item="select temp2.*,soum_prod_subsubcat.prod_subcat_desc model from (
									select temp.*,soum_prod_subcat.prod_subcat_desc brand_name from (
									select * from soum_product_master where soum_product_master.prod_id=$prod_id order by soum_product_master.prod_id )temp
									left outer join soum_prod_subcat
									on temp.brand=soum_prod_subcat.prod_subcat_id )temp2
									left outer join soum_prod_subsubcat
									on temp2.modal=soum_prod_subsubcat.prod_subsubcat_id";

					$qry_order_item=$db->query($selorder_item);
					$row_order_item=$qry_order_item->fetch_assoc();
					if($row_order_item['appliable_rate']<=$row_order_item['offer_price']){ $price=$row_order_item['appliable_rate'];}else{ $price=$row_order_item['offer_price'];}
					$code=$row_order_item['brand_name']."</br>".$row_order_item['modal_name'];
					$tot=$price*1;
					$sub_tot= $sub_tot + $tot;
				    $phone=$row_order_item['brand_name']." ".$row_order_item['modal_name'];

					 $stock="select * from soum_product_master where prod_id=$prod_id";
					 $ress=$db->query($stock);
					 $rows=$ress->fetch_assoc();
					 $cstock=$rows['current_stock'];


					  $totstock=$cstock;

					$upd_stock=$db->prepare("update soum_product_master set current_stock=$totstock where prod_id=$prod_id");
					$upd_stock->execute();

					$qty=1;
						$sql=$db->prepare("insert into soum_order_details (order_id, prod_id, qty, price) values(?,?,?,?)");
						$sql->bind_param("ssss",$ord_id,$prod_id,$qty,$price);
  						$result=$sql->execute();
  						if($result)
  						{

  						    $mailtype=4;
							$mailsubject="SOUM Order Details";
							$mailtoken=$token;
							$mailto=$mail;
							//mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);

							$OTP = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
							$_SESSION['Order_otp']= $OTP;
							$msg = "Dear Client Your OTP is ".$OTP." Soum 4 u";
							$message = urlencode($msg);
						    sms_api($mobile,$message,1407163256767360184);

						      $msg2="Dear Admin Our Soum portal has received purchase request for ".$phone. " Soum 4 u";
							 $message2 = urlencode($msg2);
						      sms_api(AdminMob,$message2,1407167887977171614);
						}
  	}
   
						   
$json['user_id']  = $name;
$json['order_id'] = $ord_id;
$json['prod_id']  = $prod_id;
$json['mobile']   = $mobile;
}
echo json_encode($json);die;
?>










   <!--  <p style="text-align:center;font-size:16px;font-weight:500;margin-top:20px;"><h4 style="text-align:center;font-weight: 500;font-size: 16px;">Thanks <?=$fname;?>, For showing your interest for buying a "<?=$phone;?>". Our marketing team would<br/> contact to you within 24 working hours</h4>
	<p style="text-align:center">
	<div style='text-align:center'>Would you like to buy another phone - <a href='index.php'>Click here</a>
    </div></p>
    <h2 style="text-align:center">Or, are you in hurry and want to book this phone before anybody does? <a href='pre_book.php?op_id=<?php echo $ord_id; ?>'>Click the link</a> & reserve the phone.</h2> -->




