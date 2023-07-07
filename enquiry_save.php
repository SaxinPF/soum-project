<?php
include('config.php');
include('_mail_fire.php');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_mobile($mobile)
{

    return preg_match('/^[0-9]{10}+$/', $mobile);
}

$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
$enq_name=$_REQUEST['enq_name'];
$enq_mobile=$_REQUEST['enq_mobile'];
$enq_email=$_REQUEST['enq_email'];
$drpBrand=$_REQUEST['drpBrand'];
$drpModel=$_REQUEST['drpModel'];
$otherbrand='';//$_REQUEST['otherbrand'];
$othermodel='';//$_REQUEST['othermodel'];


$min=mysqli_real_escape_string($db,$_REQUEST['price-min']);
$max=mysqli_real_escape_string($db,$_REQUEST['price-max']);
$desc=mysqli_real_escape_string($db,$_REQUEST['desc']);
$dt=date("Y-m-d H:i:s");

if(test_input($enq_name)=='')
{
  die("Sorry! Something went wrong");
}

if(validate_mobile($enq_mobile)==0)
{
  //die("Sorry! Something went wrong");
}

if (!filter_var($enq_email, FILTER_VALIDATE_EMAIL)) {
    die("Sorry! Something went wrong");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('elements/headcommon.php');?>
</head>
<body>



   <?php include('elements/header.php');?>
  <div class="clearfix"></div>
   <div class="mainhead container">
      <div class="clearfix"></div>
       <div class="row">
		<div class="col-sm-12" style="text-align:center;padding-top:40px;">
			<img src="images/thanx.jpg" class="thank-img">
		</div>
						<div class="col-sm-12">
						<?php
						   if($poster_type=='Dealer'){
								$sql11=$db->prepare("update soum_master_dealer set email='$enq_email' where cust_id=$poster_id");
								$res2=$sql11->execute();
							}
							if($poster_type=='Customer')
							{
								$sql11=$db->prepare("update soum_master_customer set email='$enq_email' where cust_id=$poster_id");
								$res2=$sql11->execute();

							}



			        	       if($otherbrand!='')
							   $drpBrand=0;

							if($othermodel!='')
							 $drpModel=0;



								$sql=$db->prepare("insert into soum_enquire(enq_dttm,enq_name,enq_mob,enq_email,min_price,max_price,brand,model,other_brand,other_model,enq_desc)
								values(?,?,?,?,?,?,?,?,?,?,?)");
								$sql->bind_param('sssssssssss',$dt,$enq_name,$enq_mobile,$enq_email,$min,$max,$drpBrand,$drpModel,$otherbrand,$othermodel,$desc);

								$res=$sql->execute();
								$enq_id=mysqli_insert_id($db);

									$token="ENQ".str_pad ($enq_id,4,'0', STR_PAD_LEFT);


									$token1=$db->prepare("update soum_enquire set enq_token='$token' where enq_id=$enq_id");
									$rest=$token1->execute();

									$mailtype=3;
									$mailsubject="SOUM Phone Enquiry";
									$mailtoken=$token;
									$mailto=$enq_email;
									mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);


									$sqlb="select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
									  $resb=$db->query($sqlb);
									  $rowb=$resb->fetch_assoc();
									  $brand=$rowb['prod_subcat_desc'];

								      $sqlm=$db->prepare("select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel");
								      $sqlm->execute();
									  $resm=$sqlm->get_result();
									  $rowm=$resm->fetch_assoc();
									  $model=$rowm['prod_subcat_desc'];

									   if($otherbrand!='') $brand=$otherbrand;
							           if($othermodel!='') $model=$othermodel;



                                     $msg="Thanks $enq_name, for showing your interest in '".$brand." " .$model. "' .Once we receive this product, we will get back to you as soon as possible";
									 $message = urlencode($msg);
								       sms_api($enq_mobile,$message);

								         $msg2="Soum portal has received enquiry for ".$brand." " .$model;
										 $message2 = urlencode($msg2);
									  sms_api(AdminMob,$message2);


									echo "<p style='text-align:center;font-size:16px;font-weight:500;margin-top:25px;width:100%;float:left'>$msg</br><br/> <a href='index.php' class='theme-btn btn-style-four btn-sm'>Go to Home</a></p>";
								?>

</div>
</div>
</div>
 <div class="clearfix"></div>
 <?php include('elements/footer.php');?>





</body>
</html>
