<?php
include('config.php');

$sid=$_REQUEST['sid'];
$user_id=$_REQUEST['uid'];
$btype=$_REQUEST['type'];
$stype=$_REQUEST['stype'];
$user_type='Customer';
$prod_id=$_REQUEST['prod_id'];
$name=$_REQUEST['name'];
$mobile=$_REQUEST['mobile'];
$desc=$_REQUEST['desc'];
$t="CRN";
$dttm=date('Y-m-d H:i:s');




if(isset($_REQUEST['prod_id']))
{
    $sql_1="select * from soum_order_master,soum_order_details
			where soum_order_master.order_id=soum_order_details.order_id
			and soum_order_master.cust_type='$user_type'
			and soum_order_master.cust_id=$user_id
			and soum_order_details.prod_id=$prod_id";
	$res_1=$db->query($sql_1);
	if(mysqli_num_rows($res_1)>0)
	{
	   $r='2';   

	
    }
    else
    {



			$sql1="select * from soum_master_customer where cust_id=$user_id";
			$res=$db->query($sql1);
			$row=$res->fetch_assoc();
			$fname=$row['fname'];
			$mail=$row['email'];
			$mobile=$row['mobile'];
			$address=$row['address'];
			$id=$row['cust_id'];
			$dt=date('Y-m-d H:s:i');
			
			$to = $mail;		
			$a=1;
			$used='used';
			
			$qry=$db->prepare("insert into soum_order_master (order_date,order_type,cust_id,cust_type,fname, mail, mobile, shipping_address,active,description)values(?,?,?,?,?,?,?,?,?,?)");
			$qry->bind_param("ssssssssss",$dt,$used,$id,$user_type,$fname,$mail, $mobile, $address,$a,$desc);
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
					$code=$row_order_item['brand_name']."</br>".$row_order_item['model'];
					$tot=$price*1;
					$sub_tot= $sub_tot + $tot;
				    $phone=$row_order_item['brand_name']." ".$row_order_item['model'];
			
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
  						
  						    /*$mailtype=4;
							$mailsubject="SOUM Order Details";
							$mailtoken=$token;
							$mailto=$mail;
							mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);*/
							$msg1="Hello i am showing interest for buying your phone ". $phone;
							$sqlc="INSERT INTO emp_chat(not_dttm,prod_id,invite_by_type,invite_by,not_to_type,not_to,text,active)VALUES('$dttm','$prod_id','$btype','$user_id','$stype','$sid','$msg1','0')";
		                    $resc=$db->query($sqlc);
							
							 $msg="Thanks $fname, For showing your interest for buying a $phone. Our marketing team would contact to you within 24 working hours.";
							 $message = urlencode($msg);
						     $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
						     $ret = file($url);
						     
						     /*$msg2="Soum portal has received purchase request for".$phone;
							 $message2 = urlencode($msg2);
						     $url2="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=9829300040&sms=".$message2."&senderid=MYSOUM";
						     $ret2 = file($url2);*/
						}	
						
			     $r='1'; 
	           			
  	         }
  	         else
  	         {
  	           $r='0'; 
	            
             }	
  	        

        }				
}

echo $_GET['callback'] . '(' . $r. ')';
?>
