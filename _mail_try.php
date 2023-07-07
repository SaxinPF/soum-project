<head>
<link href="css/bootstrap.css" rel="stylesheet">

<style type="text/css">
.auto-style1 {
	border: 1px solid #bfbfbf;
}
.auto-style2 {
	border: 1px solid #bfbfbf;
	border-collapse: collapse;
}
.auto-style2 td {
	border: 1px solid #bfbfbf;
	padding:5px;
}
.auto-style3 {
	text-align: left;
}
#mobile-mail1{width:49%;float:left;}

/* MOBILE STYLES */
			@media only screen and (max-width: 480px){
				/*////// CLIENT-SPECIFIC STYLES //////*/
				body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */
				
				td[class=buttonContent] a{padding:15px !important;}
				#mobile-mail1{width:100% !important;float:left;}
				

			}
</style>
</head>

<div style="width:100%;float:left;" class="col-md-12">
<div style="margin:auto;float:none" class="col-md-10">
	<div style="float:left;border:2px solid#303030;">
		
	<div style="width:100%;float:left;background-color:#fff;text-align:center;padding:15px 0px;">
		<img src="http://soum.co.in/images/logo_black.png" style="width:270px;margin:auto;float:none;">
	</div>	

	<div style="float:left;padding:15px;background-color:#FFFFCC">
<?php
include("config.php");
$mailtype=mysqli_real_escape_string($db,$_REQUEST['mailtype']);
$token=mysqli_real_escape_string($db,$_REQUEST['tokenid']);
?>
<?php
if($mailtype==1)
{
 $token_type=substr($token,0,1);
    if ($token_type=="C")
	{	
   	 $stmt =$db->prepare("select * from soum_master_customer where reg_id=?");
   	 $type='Customer';
   	 $url='http://www.soum.co.in';
    }
    if ($token_type=="D")
    {
      $stmt =$db->prepare("select * from soum_master_dealer where reg_id=?");
     $type='Dealer';
     $url='http://www.soum.in';
    }
     $stmt->bind_param('s', $token);
	 $stmt->execute();	
	$result = $stmt->get_result();
	$row=$result->fetch_assoc();
	$name=$row['fname'];
	$email=$row['email'];
    $pass=$row['user_pass'];
    $add=$row['address'];
    $id=$row['cust_id'];

?>
<p><strong>Dear <?=$name;?>,</strong><br />
We'd like to thank you for registering with us as <strong> <?=$type;?> .</strong> We aim to create a better 
community by providing mobile sale/ services at <strong>SOUM</strong>.<br />
Our unique service allows you to access following features through our web 
portal:<br /></p>
<ul>
	<li>Activities on Dashboard</li>
	<li>Upload Your Mobile for Sale and after approval on air.</li>
	<li>Check your Product status.</li>
	<li>Check your Orders and track them.</li>
	<li>Check the lifecycle of your product.</li>
	<li>earby search of on the basis of your location.</li>
	<li>Online support 24x7.</li>
</ul>	
<p>If you have any questions or concerns, please take a look and do not hesitate to 
email us.<br />We're here to help your everyday become better. Here are the credentials for 
managing with us using your personalized dashboard.  
</p>
<p><a href="<?=$url;?>">Click here to visit us!</a><br />
    <?php if($type=='Dealer'){ ?>
	<strong>Your User id&nbsp;&nbsp;&nbsp;&nbsp; : <?=$email;?><br />Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
: <a href="http://soum.in/change_pwd.php?poster_id=<?=$id;?>">click here to reset your password</a></strong>
	<?php } ?>
	
</p>
<?php } 
if($mailtype==2)
{
$stmt =$db->prepare("select *,
if(poster_type='Dealer',(select fname from soum_master_dealer where cust_id=soum_product_master.poster_id),
if(poster_type='Customer',(select fname from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) fname,
if(poster_type='Dealer',(select email from soum_master_dealer where cust_id=soum_product_master.poster_id),
if(poster_type='Customer',(select email from soum_master_customer where cust_id=soum_product_master.poster_id),'info@soum.in')) email
from soum_product_master where code=?");
    
     
	$stmt->bind_param('s', $token);
	$stmt->execute();	
	$res= $stmt->get_result();
	$row=$res->fetch_assoc();
	$name=$row['fname'];
	$email=$row['email'];
    $prod_id=$row['prod_id'];
    $posterid=$row['poster_id'];
    
    $url='http://www.soum.co.in/soumadmin/phone_detail.php?prod_id='.$prod_id.'&poster_id='.$posterid;
?>
<p><strong>Dear <?=$name;?></strong>,<br />
We'd like to thank you for placing an advertisement with <strong>SOUM</strong>. </p>
<p>
&nbsp;<strong>Your product token Id is <?=$token;?></strong>, and&nbsp; details of 
advertisement&nbsp;&nbsp; is&nbsp; available here for ready reverence, on following 
link.</p>
<p>
<strong><a href="<?=$url;?>">Click here to review your product.</a> </strong> 
</p>
<p>We would review and once approve it, it would be on public portal&nbsp; to 
connect  community to get real client and Value for Money.</p>
<p>&nbsp;</p>
<p>If you have any questions or concerns, please take a look and do not hesitate to 
email us.<br />We're here to help your everyday become better. Here are the credentials for 
managing with us using your personalized dashboard. Click here to visit us!<br />
	 
</p>
<?php
}
if($mailtype==3)
{
 $stmt=$db->prepare("select * from soum_enquire where enq_token=?");   
	$stmt->bind_param('s', $token);
	$stmt->execute();	
	$res= $stmt->get_result();
	$row=$res->fetch_assoc();
	$name=$row['enq_name'];
	$model=$row['model'];
	$brand=$row['brand'];
	 $otherb=$row['other_brand'];
    $otherm=$row['other_model'];
    
 if($brand!='0')
 {   
   $sqlb=$db->prepare("select * from soum_prod_subcat where prod_subcat_id=?");
	$sqlb->bind_param("s", $brand);
	$sqlb->execute();
    $resb=$sqlb->get_result();
    $rowb=$resb->fetch_assoc();
    $brand1=$rowb['prod_subcat_desc'];
   
	$sqlm=$db->prepare("select * from soum_prod_subsubcat where prod_subsubcat_id=?");
	$sqlm->bind_param("s", $model);
	$sqlm->execute();
    $resm=$sqlm->get_result();
    $rowm=$resm->fetch_assoc();
    $model11=$rowm['prod_subcat_desc'];
    
    if(model==0)    
    $model1=$brand1." ".$otherm;
    else
    $model1=$brand1." ".$model11;
    
 }
 else
 {
    $model1=$otherb." ".$otherm;
 }	
?>
<p><strong>Dear <?=$name;?></strong>,<br />
We'd like to thank you for placing your interest on <?=$model1;?> with <strong>SOUM</strong>. </p>
<p>
&nbsp;Your reference token Id is <strong><?=$token;?></strong></p>
<p>We would soon contact with you and vendor to review and make it a deal on 
availability.</p>
<p>If you have any questions or concerns, please take a look and do not hesitate to 
email us. We're here to help your everyday become better. Here are the credentials for 
managing with us using your personalized dashboard. Click here to visit us!<br />
	 
</p>
<?php
}
if($mailtype==4)
{
  $stmt1=$db->prepare("select * from soum_order_master where order_token=?");   
	$stmt1->bind_param('s',$token);
	$stmt1->execute();	
	$res= $stmt1->get_result();
	$row=$res->fetch_assoc();
	$name=$row['fname'];
    $model=$row['model'];
    $date=$row['order_date'];
    $newDate = date("d-m-Y H:s:i", strtotime($date));
?>
<p><strong>Dear Customer <?=$name;?></strong>,<br />
We'd like to thank you for placing your interest on product with <strong>SOUM</strong>. </p>
<p>Your reference token Id is <strong><?=$token;?></strong>, and&nbsp; details of product&nbsp; 
for ready reverence.</p>
<p>We would soon update you on your order as per following details on receipt of 
payment and on availability.</p>
<p><strong><a href="http://soum.co.in/track_order.php?token=<?=$token?>">Click 
here to track your order status.</a> </strong> 
</p>
<div style="width:100%;float:left">
<table class="auto-style2" style="width:80%; background:#fff;float:left">
	<thead>
		<tr>
	<th colspan="6" style="width: 100%;text-align:center"><span class="auto-style4"><strong>SOUM ORDER RECIPT</strong></span><br></th>
		</tr>
		<tr>
	<th colspan="2" class="auto-style5">Your Order ID:</th>
	<th class="auto-style6"><?=$token;?></th>
	<th class="auto-style5" colspan="1">&nbsp;</th>
	<th style="text-align:right" class="auto-style5">Order Date</th>
	<th style="text-align:right" class="auto-style5"><?=$newDate;?></th>
	
		</tr>
		<tr>
	<th class="auto-style1" colspan="6">Order Details</th>
		</tr>
	<tr style="background-color:#bfbfbf;">
	<th style="width:60px;" class="auto-style1">#</th>
	
	<th class="auto-style1">Brand</th>
	<th class="auto-style1">Model</th>
	<th style="text-align:right" class="auto-style1">Price (in Rs.)</th>
	<th style="text-align:right" class="auto-style1">Quantity</th>
	<th style="text-align:right" class="auto-style1">Total (in Rs.)</th>
	
	</tr>
	</thead>
	<?php
	$ord_id=$_REQUEST['ord_id'];
	$stmt=$db->prepare("select temp4.*,if(temp4.modal=0,temp4.prod_name,soum_prod_subsubcat.prod_subcat_desc)model,	
    if (temp4.order_type='new', soum_prod_subsubcat.p_img1, temp4.images) imagesx    from (
	select temp3.*,soum_prod_subcat.prod_subcat_desc brand_name from (
	select temp2.*,code,images,brand,modal from
	(select temp.*,prod_id,qty,price,prod_name from
	(select * from soum_order_master where order_token=? ) temp
	left outer join soum_order_details
	on temp.order_id=soum_order_details.order_id) temp2
	left outer join soum_product_master
	on soum_product_master.prod_id=temp2.prod_id	 )temp3
	left outer join soum_prod_subcat
	on temp3.brand=soum_prod_subcat.prod_subcat_id )temp4 
	left outer join soum_prod_subsubcat
	on temp4.modal=soum_prod_subsubcat.prod_subsubcat_id");
	//echo $qry;
	$stmt->bind_param("s", $token);
	$stmt->execute();	
	$res=$stmt->get_result();
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
		if($otype=='used')
		{
		
		$tot= $tot-$ad_amt;
        }
        $desc=$row['description'];
    					
	?>
	<tbody>
     <tr>
     <td class="auto-style1"><?=$i;?></td>
     <td class="auto-style1"><?=$row['brand_name'];?></td>
     <td class="auto-style1"><?=$row['model'];?></td>
     <td style="text-align:right" class="auto-style1"><?=$price;?></td>
     <td style="text-align:right" class="auto-style1"><?=$qty;?></td>              
     <td style="text-align:right" class="auto-style1"><?=$amt;?></td>
     </tr>
     </tbody>                          
     <?php
     } 
     	$grand_tot=$ship_amt + $tax_amt + $discount_amt +$tot;
     ?>
     <?php if($otype=='used'){?> <?php } ?>
        <tr>
			<td colspan="5" style="text-align:right" class="auto-style1"><strong>Total</strong></td>
			<td style="text-align:right" class="auto-style1"><?=$grand_tot;?></td>
		</tr>
     <tr><td colspan="6" style="text-align:right" valign="top">
		 <table style="width: 100%">
			 <tr>
				 <td style="width: 20%" class="auto-style3" valign="top"><strong>Quoted Price/ Message:</strong></td>
				 <td class="auto-style3" style="width: 80%" valign="top"><?=$desc;?></td>
				 </tr>
		 </table>
		 </td></tr>
	
	
	</table></div>
<div style="width:100%;float:left;margin-top:10px;">	
	<p>If you have any questions or concerns, please take a look and do not hesitate to 
email us. <br>We're here to help your everyday become better. Please use your credentials for 
managing personalized dashboard. <br><a href="http://www.soum.co.in">Click here to visit us!</a><br />
	
</p>
</div>
<?php
}
if($mailtype==5)
{
$sql=$db->prepare("select * from soum_phone_repairing where token_id=?");
    $sql->bind_param("s", $token);
    $sql->execute();   
	$res=$sql->get_result();
	$row=$res->fetch_assoc();
	$name=$row['fname'];
	$mobile=$row['mobile_no'];
    $email=$row['email'];
    $desc=$row['description'];
    $model=$row['modal'];
    $brand=$row['brand'];
    $otherb=$row['other_brand'];
    $otherm=$row['other_model'];
    
 if($brand!='0')
 {   
   $sqlb=$db->prepare("select * from soum_prod_subcat where prod_subcat_id=?");
	$sqlb->bind_param("s", $brand);
	$sqlb->execute();
    $resb=$sqlb->get_result();
    $rowb=$resb->fetch_assoc();
    $brand1=$rowb['prod_subcat_desc'];
   
	$sqlm=$db->prepare("select * from soum_prod_subsubcat where prod_subsubcat_id=?");
	$sqlm->bind_param("s", $model);
	$sqlm->execute();
    $resm=$sqlm->get_result();
    $rowm=$resm->fetch_assoc();
    $model11=$rowm['prod_subcat_desc'];
    
    if(model==0)    
    $model1=$brand1." ".$otherm;
    else
    $model1=$brand1." ".$model11;
    
 }
 else
 {
    $model1=$otherb." ".$otherm;
 }	
 
						  
?>
<p><strong>Dear Customer <?=$name;?></strong>,<br />
We'd like to thank you for placing your phone information with <strong>SOUM</strong>.</p>
<p>
&nbsp;Your reference token Id is <strong><?=$token;?></strong>, and&nbsp; details of 
product&nbsp; for ready reverence.</p>
<b>Phone Details (Repairing)</b><hr />
<table align="center" style="width:100%">
	<tr>
		<td>Name</td>
		<td><?=$name;?></td>
	</tr>
	<tr>
		<td>Mobile No.</td>
		<td><?=$mobile;?></td>
	</tr>
	<tr>
		<td>Email Id</td>
		<td><?=$email;?></td>
	</tr>
	<tr>
		<td>Phone Details</td>
		<td><?=$model1;?></td>
	</tr>
	<tr>
		<td>Repairing issue</td>
		<td><?=$desc;?></td>
	</tr>
</table>
<p>&nbsp;</p>
<p><strong><a href="http://soum.co.in/track_order.php?token=<?=$token?>">Track your Repairing status at.</a></strong> 
</p>
<p>If you have any questions or concerns, please take a look and do not hesitate to 
email us. We're here to help your everyday become better. Here are the credentials for 
managing with us using your personalized dashboard. Click here to visit us!<br />
	
</p>
<?php
}
if($mailtype==6)
{
$sql=$db->prepare("select * from soum_order_master where order_token=?");
$sql->bind_param('s', $token);
$sql->execute();
$res=$sql->get_result();
$row=$res->fetch_assoc();
$name=$row['fname'];
$contact=$row['mail'].",".$row['mobile'];
$status=$row['status'];
$cdt=$row['order_date'];
$dt=$row['status_upd_dt'];
$title="Order Status";
if($status==0)
$status1='Pending';
else if($status==1)
$status1='In Process';
else if($status==2)
$status1='Advance';
else if($status==3)
$status1='Dispatched';
?>
<p class="auto-style7"><strong>Dear Customer </strong> <?=$name;?>,</p>
<p>Thank you for placing an order/advertisment/ repair/ enquiry with <strong>
SOUM</strong>. Status of your reverence <strong>token Id <?=$token;?> is</strong></p>
<table style="width: 100%">
	<tr>
		<td class="auto-style3" style="width: 169px">Present <strong>Staus
		</strong></td>
		<td class="auto-style3"> <?=$status1;?> Update on <?=date("d-m-Y H:s:i", strtotime($dt));?></td>
	</tr>
</table>
<p><strong>token Id <?=$token;?> Details:</strong></p>
<table style="width: 100%">
	<tr>
		<td class="auto-style3" style="width: 169px">Creation Date:</td>
		<td class="auto-style3"><?=date("d-m-Y H:s:i", strtotime($cdt));?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Category &amp; Title </td>
		<td class="auto-style3"><?=$title;?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Detail</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Description</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Contact Details</td>
		<td class="auto-style3"><?=$contact;?></td>
	</tr>
</table>
<p>&nbsp;</p>
<p>If you have any questions or concerns, please take a look and do not hesitate 
to email us. We're here to help your everyday become better. Here are the 
credentials for managing with us using your personalized dashboard. Click here 
to visit us! </p>
<?php 
} 
if($mailtype==7)
{
 $sql=$db->prepare("select * from soum_master_customer where reg_id=?");
    $sql->bind_param("s", $token);
    $sql->execute();
    $res=$sql->get_result();
	$row=$res->fetch_assoc();
	$name=$row['fname'];
	
?>
<p>&nbsp;</p>
<p>Dear <?=$name?>,</p>
<p>We at SOUM whish you a very <strong>Warm Birthday Greetings</strong> to you.
</p>
<p><img src="http://soum.in/images/birthday.jpg"></p>
<p>It has been always pleasure to serve you for services offered by SOUM.</p>

<?php }
if($mailtype==8)
{
 $sql=$db->prepare("select * from soum_master_customer where reg_id=?");
   	$sql->bind_param("s", $token);
    $sql->execute();
    $res=$sql->get_result();
    $row=$res->fetch_assoc();
	$name=$row['fname'];
	
?>
<p>&nbsp;</p>
<p>Dear <?=$name?>,</p>
<p>We wish you greetings on your Anniversary.</p>
<p><img src="http://soum.in/images/Anniversary.jpg"></p>
<p>It has been always pleasure to serve you for services offered by SOUM.</p>
<?php } 
if($mailtype==9)
{
 $sql=$db->prepare("select * from soum_master_customer where reg_id=?");
   	$sql->bind_param("s", $token);
    $sql->execute();
    $res=$sql->get_result();
    $row=$res->fetch_assoc();
	$name=$row['fname'];
	
?>
<p>&nbsp;</p>
<p>Dear <?=$name?>,</p>
<p>We wish you greetings on your Birthday & Anniversary.</p>
<p><img src="http://soum.in/images/ba.jpg" width="300px" height="300px"></p>
<p>It has been always pleasure to serve you for services offered by SOUM.</p>

<?php }
if($mailtype==10)
{
 $sql=$db->prepare("select * from soum_feedback where token_id=?");
   	$sql->bind_param("s", $token);
    $sql->execute();
    $res=$sql->get_result();
	$row=$res->fetch_assoc();
	$type=$row['enquiry_type'];
	$name=$row['fname'];
	$email=$row['email'];
    $msg=$row['msg'];
?>
<p>&nbsp;</p>
<p>Dear <?=$name?>,</p>
<p>We'd like to thank you for give your feedback and contact us</p>
<p><strong>token Id <?=$token;?> Details:</strong></p>
<table style="width: 100%">
	<tr>
		<td class="auto-style3" style="width: 169px">Type</td>
		<td class="auto-style3"><?=$type;?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Name</td>
		<td class="auto-style3"><?=$name;?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Email</td>
		<td class="auto-style3"><?=$email;?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 169px">Message</td>
		<td class="auto-style3"><?=$msg;?></td>
	</tr>
	
</table>
<?php }
if($mailtype==11)
{

     
	 $sql="select * from soum_master_dealer where email='$token'"; 
	 $res=$db->query($sql);
	 if(mysqli_num_rows($res)>0)
		{
		  $row=$res->fetch_assoc();
		  $pwd=$row['user_pass'];
		  $pid=$row['cust_id'];

		  echo "<a href='http://soum.in/change_pwd.php?poster_id=$pid'>Click here for reset your password </a>";
		}
		else
		{
		   echo "Your email id is not authorized";
        } 
 ?>
         

 <?php } ?>
</div> 
 
		<table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody><tr>
						<td class="flexibleContainerBox" valign="top" align="left">
							<table style="background-color:#5F5F5F;width:50%;float:left;min-width:320px;" cellspacing="0" cellpadding="30" border="0" id="mobile-mail1">
								<tbody><tr>
									<td class="textContent" align="left">
										<h3 style="color:#FFFFFF;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Team Soum</h3>
										<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Haldiya Tower, 25 Kalyan Colony, <br/>Opp. Gaurav Tower, Malviya Nagar, <br/>Jaipur (Raj.) 302017</div>
									</td>
								</tr>
							</tbody></table>

							<table class="flexibleContainerBoxNext" style="background-color:#00CC99;width:50%;float:left;min-width:320px;" cellspacing="0" cellpadding="30" border="0" id="mobile-mail1">
								<tbody><tr>
									<td class="textContent" align="left">
										<h3 style="color:#FFFFFF;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Contact</h3>
										<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Customer: 9828075008 <br>Email: info@soum.in, sales@soum.in, support@soum.in</div>
									</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
 
</div>
</div>
</div>