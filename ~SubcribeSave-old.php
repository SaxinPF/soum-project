<?php
 include('config.php');
 include('_mail_fire.php');
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
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
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
			        	<p style="text-align:justify;margin-top:10px;">
			        	<?php
			        	$preid=mysqli_real_escape_string($db,$_REQUEST['preid']);
			        	$email=mysqli_real_escape_string($db,$_REQUEST['email']);
			        	$name=mysqli_real_escape_string($db,$_REQUEST['name']);
						$email=mysqli_real_escape_string($db,$_REQUEST['email']);
						$msg=mysqli_real_escape_string($db,$_REQUEST['message']);						
						$subject=mysqli_real_escape_string($db,$_REQUEST['subject']);
						$mobile=mysqli_real_escape_string($db,$_REQUEST['mobile']);
						$dt=date('Y-m-d H:s:i');
						$type=mysqli_real_escape_string($db,$_REQUEST['type']);
						
						if($type=='subcribe')
	                    {
							$sql11="select * from soum_master_customer where email='$email'";
							$res11=$db->query($sql11);
							if(mysqli_num_rows($res11)<=0)
							{
							 $a=1;
							 $sub='yes';
							      $sql12=$db->prepare("insert into soum_master_customer(email,type,subscribe,active)values(?,?,?,?)");
							      $sql12->bind_param("ssss",$email,$type,$sub,$a);
							       $sql12->execute();
							       
						
							       echo "<div style='text-align:center'><h4>You have been successfully subscribe</h4></br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";	
	
						
							}
							else
							{
							 echo"<script>alert('This email is allready Subscribe'); window.location.href='index.php'</script>";
							} 
						
						}
                       if($type=='Feedback' || $type=='Enquiry' || $type=='Complaint' || $type=='PreLaunch')
                        {
						
								 $sql13=$db->prepare("insert into soum_feedback(dttm,enquiry_type,fname,email,msg,subject,preid,mobile)values(?,?,?,?,?,?,?,?)");
								 $sql13->bind_param("ssssssss",$dt,$type,$name,$email,$msg,$subject,$preid,$mobile);
								 $res=$sql13->execute();
								 $enq_id=mysqli_insert_id($db);
									$token="FBN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
									
									$token1=$db->prepare("update soum_feedback set token_id='$token' where feedback_id=$enq_id");
									$rest=$token1->execute();
								    $mailtype=10;
									$mailsubject="SOUM feedback & ContactUs";
									$mailtoken=$token;
									$mailto=$email;
									mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);
									
							 $msg="Thank you for contacting Soum for enquiry/ feedback.";
							 $message = urlencode($msg);
						     $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
						     $ret = file($url);
								 
								 if($res)
								 echo "<div style='text-align:center'><h4>Thank you for contacting Soum for enquiry/ feedback.</h4></br></br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";	
		                         else
								 echo "<div style='text-align:center'>Something wrong</br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";	
						 
                        }                        
					 ?>
			        	
			        	</p>
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