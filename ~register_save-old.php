<?php
include('config.php');
//include('_mail_fire.php');
/*$name=$_REQUEST['fname'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];
$pincod=$_REQUEST['pincode'];
$reg_dt=date('Y-m-d H:i:s');*/

/** BOF Security Patch IS-002*/
$name=mysqli_real_escape_string($db,$_REQUEST['fname']);
$email=mysqli_real_escape_string($db,$_REQUEST['email']);
$mobile=mysqli_real_escape_string($db,$_REQUEST['mobile']);
$pincod=mysqli_real_escape_string($db,$_REQUEST['pincode']);
$reg_dt=date('Y-m-d H:i:s');
/** EOF Security Patch IS-002*/
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
<script>
    localStorage.setItem("mobile","<?=$mobile?>");
    localStorage.setItem("name","<?=$name?>");   
</script>
</head>
<body>
<div class="page-wrapper" style="background:#f7f7f7;margin-top:-25px;">
 	
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
			        	   <?php
	        	            
							  //  $sql1="select * from soum_master_customer where mobile='$mobile'";	
							  //	$res1=$db->query($sql1);
			        	   		/** BOF Security Patch IS-002*/
								$stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $mobile); 
								$stmt->execute();
								$res1=$stmt->get_result();
								/** EOF Security Patch IS-002*/
								if(mysqli_num_rows($res1)>0)
								{
									$row=$res1->fetch_assoc();
									$enq_id=$row['cust_id'];
									$_SESSION['poster_id']= $enq_id;
									$_SESSION['poster_type']="Customer";
									//echo "<script>alert('This Mobile allready register');</script>";
									 echo '<script>window.location.href="index.php";</script>';
								     //die();
								     
								}
							    else
							    {
							    
							        
							        $a=1;   
									$utype='Customer';									
									$t="CRN";
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,email,mobile,pincod,active)values(?,?,?,?,?,?,?)");
									$sql->bind_param("sssssss",$reg_dt,$utype,$name,$email,$mobile,$pincod,$a); 									
							    									
										
									$res=$sql->execute();
									$enq_id=mysqli_insert_id($db);
								
									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);						        
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");								
									$rest=$token1->execute();
									
									

									
									if($res)
									{
							         $msg="Thanks ".$name." for choosing Soum for all kind of your Mobile requirement.";
									 $message = urlencode($msg);
								     $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
								     $ret = file($url);
	
									
									 $msg2="Register a customer with soum portal Id#".$token;
									 $message2 = urlencode($msg2);
								     $url2="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=9829300040&sms=".$message2."&senderid=MYSOUM";
								     $ret2 = file($url2);
	
									    
									  
										$_SESSION['poster_id']= $enq_id;
										$_SESSION['poster_type']="Customer";
									   //echo '<script>window.location.href="index.php";</script>';
									}
												
								}	
								
								   $cdate=date("Y-m-d");
								   $log1="select * from soum_login_log where date(login_date)='$cdate' and login_by='$enq_id' group by login_by";	
									$resl1=$db->query($log1);
									$rowl=$resl1->fetch_assoc();
									$ldate=$rowl['login_date'];
									$old= date("d-m-Y h:i", strtotime($ldate));
									$new= date("d-m-Y h:i");
								    
								    if($old!=$new)
								    {
									$log="insert into soum_login_log(login_date,login_type,login_by)values('$reg_dt','Customer','$enq_id')";
									$db->query($log);	
						        	}
								?>
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