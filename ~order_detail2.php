<?php
include('config.php');
include('_mail_fire.php');

$user_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);
$user_type=mysqli_real_escape_string($db,$_SESSION['poster_type']);


$prod_id=$_REQUEST['prod_id'];
$name=$_REQUEST['name'];
$mobile=$_REQUEST['mobile'];
$desc=$_REQUEST['desc'];
$t="CRN";
if($user_id=='')
{
	$sql1=$db->prepare("insert into soum_master_customer(user_type,fname,mobile)value('Customer','$name','$mobile')");
	$res=$sql1->execute();
	$user_id=mysqli_insert_id($db);
	
	
		$token=$t."".str_pad ($user_id,4,'0', STR_PAD_LEFT);
        $token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$user_id");
		$rest=$token1->execute();
}
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
			    echo "<script>alert('You are already shown your interest in this product');</script>";
			    echo "<script>window.location.href='detail.php?prod_id=".$prod_id."'</script>";
			    die();
			
            }
           



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
  						
  						    $mailtype=4;
							$mailsubject="SOUM Order Details";
							$mailtoken=$token;
							$mailto=$mail;
							mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);
							
							
							 $msg="Thanks $fname, For showing your interest for buying a $phone. Our marketing team would contact to you within 24 working hours.";
							 $message = urlencode($msg);
						     $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
						     $ret = file($url);
						     
						      $msg2="Soum portal has received purchase request for".$phone;
							 $message2 = urlencode($msg2);
						     $url2="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=9829300040&sms=".$message2."&senderid=MYSOUM";
						     $ret2 = file($url2);
						}	
  	}					
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SOUM | Services Online Used Mobile</title>
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet"`>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
.table-shopping-cart td {
	border:1px solid#ddd;
	padding:10px;
}
</style>
</head>
<body>
<div class="page-wrapper" style="background:#f7f7f7;">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
    
 	<header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
    <!-- Main Header -->
    
    <!--End Main Header -->
    
    
    <!--Feature Section-->
<section class="welcome-section pb-70" id="bottom-70">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="row">
				<div class="col-md-9" style="margin:auto;float:none;">
					<div style="width:100%;float:left;background-color:#fff;padding:10px;box-shadow: 1px 1px 4px -3px;">
						<div style="width:100%;float:left;text-align:center;padding:30px 10px;">
							<img src="images/thanx.jpg" class="thank-img">

<p style="text-align:center;font-size:16px;font-weight:500;margin-top:20px;"><h4 style="text-align:center;font-weight: 500;font-size: 16px;">Thanks <?=$fname;?>, For showing your interest for buying a "<?=$phone;?>". Our marketing team would<br/> contact to you within 24 working hours</h4>
	<p style="text-align:center">		
	<div style='text-align:center'>Would you like to buy Another phone - <a href='index.php'>Click here</a></div></p>
<div style="text-align:center;display:none">Here is your order detail.
	<table class="table table table-shopping-cart" style="border:1px solid#bfbfbf;width:90%;background:#fff;margin:auto;">
	<thead>
	<tr>
		<th colspan="7" style="text-align:center">SOUM ORDER RECIPT</th>
	</tr>
	<tr>
	<th colspan="5">Your Order ID: <?=$token;?></th>
	<th>Order Date</th>
	<th style="text-align:right;"><?=$d1;?></th>
	<tr>
	<th colspan="7">Order Details</th>
	</tr>
	<tr style="background-color:#eb5310;color:#fff;">
	<th style="width:60px;">#</th>
	<th>Image</th>
	<th>Brand</th>
	<th>Model</th>
	<th style="text-align:right">Price (in Rs.)</th>
	<th style="text-align:right">Quantity</th>
	<th style="text-align:right">Total (in Rs.)</th>
	
	</tr>
	</thead>
	<?php
	
	$qry="select temp4.*,soum_prod_subsubcat.prod_subcat_desc model from (
	select temp3.*,soum_prod_subcat.prod_subcat_desc brand_name from (
	select temp2.*,code,images,brand,modal from
	(select temp.*,prod_id,qty,price from
	(select * from soum_order_master where order_id=$ord_id ) temp
	left outer join soum_order_details
	on temp.order_id=soum_order_details.order_id) temp2
	left outer join soum_product_master
	on soum_product_master.prod_id=temp2.prod_id	 )temp3
	left outer join soum_prod_subcat
	on temp3.brand=soum_prod_subcat.prod_subcat_id )temp4 
	left outer join soum_prod_subsubcat
	on temp4.modal=soum_prod_subsubcat.prod_subsubcat_id";
	//echo $qry;
	$res=$db->query($qry);
	$i=0;
	$tot=0;
	$grand_tot=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		$dob_by_chris=$row['order_date'];
		$b_y=substr($dob_by_chris,0,4);							
		$b_m=substr($dob_by_chris,5,2);							
		$b_d=substr($dob_by_chris,8,2);							
		$ord_dt=$b_d."-".$b_m."-".$b_y;
		
		$price=$row['price'];
		$otype=$row['order_type'];
		$ad_amt=$row['advance_amt'];
		$qty=$row['qty'];
		$amt=$price*$qty;
		$tot= $tot+$amt;
		$subtot= $tot;	
		if($otype=='used')
		{
		
		$tot= $tot-$ad_amt;
        }
       
    					
	?>
	<tbody>
     <tr>
     <td><?=$i;?></td>
     <td><img src="upload/<?=$row['images'];?>" title="Image Title" style="width:auto;height:50px;"/></td>              
     <td><?=$row['brand_name'];?></td>
     <td><?=$row['model'];?></td>
     <td style="text-align:right"><?=$price;?></td>
     <td style="text-align:right"><?=$qty;?></td>              
     <td style="text-align:right"><?=$amt;?></td>
     </tr>
     </tbody>                          
     <?php
     } 
     	$grand_tot=$ship_amt + $tax_amt + $discount_amt +$tot;
     ?>
     <tr><td colspan="6" style="text-align:right;"><strong>Sub Total</strong></td><td style="text-align:right"><?=$subtot;?></td></tr>
     <tr><td colspan="6" style="text-align:right;"><strong>Shipping Amount</strong></td><td style="text-align:right"><?=$ship_amt;?></td></tr>
     <tr><td colspan="6" style="text-align:right;"><strong>Tax</strong></td><td style="text-align:right"><?=$tax_amt;?></td></tr>
     <?php if($ad_amt!='0'){?> <tr><td colspan="6" style="text-align:right;"><strong>Advance Amt</strong></td><td style="text-align:right"><?=$ad_amt;?></td></tr><?php } ?>
     <tr><td colspan="6" style="text-align:right"><strong>Total</strong></td><td style="text-align:right"><?=$grand_tot;?></td></tr>
	<tr>
	<th colspan="6"><strong>Shipping Address:</strong> <?=$ship_addr;?></th>
	<tr>
	<?php if($prod_id!=''){?>
	<form method="post" action="confirm.php" style="width:100%;float:left;margin-top:10px;">
		<input type="hidden" name="order_id" value="<?=$ord_id;?>">
		<input type="hidden" name="prod_id" value="<?=$prod_id;?>">
		<table style="width: 70%;margin:auto;background:#fff;margin-top: 10px;padding:10px;display:none">
			<tr>
				<td style="width: 561px;padding:10px">If you want to confirm order,Pl pay confirm amount</td>
				<td style="padding:10px"><input type="text" name="confirm_amt" class="form-control"></td>
				<td style="padding:10px"><button type="submit" name="submit" value="Confirm" class="btn bt1 btn-primary btn-normal btn-inline">Submit</button></td>
			</tr>
		</table>
		<div style="width:100%;float:left;margin-top:10px;text-align:center;"><button type="submit" name="submit" value="Confirm" class="theme-btn btn-style-four" style="padding:5px 15px;">Confirm Order</button></div>
	</form>
<?php } ?>
	<tr>
	
	
	</table>
	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
    <!--Sponsors Section-->
 <?php include('_footer.php');?>
    <!--Main Footer-->
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
</body>
</html>