<?php include('config.php');$token=$_REQUEST['token'];?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>SOUM | Services Online Used Mobile</title>
<link href="/manifest.json" rel="manifest">
<meta content="#ffffff" name="msapplication-TileColor">
<meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
<meta content="#ffffff" name="theme-color">
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link `="" href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--><!--[if lt IE 9]>
<script src="js/respond.js"></script>
<![endif]-->
<style>
.form-control {
	display: block;
	width: 100%;
	height: 37px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ababab;
	border-radius: 2px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.track-form {
	background: #ddd;
	padding: 10px 20px 15px 20px;
	width: 100%;
	float: left;
}
.track-form input {
	background-color: #fff;
	border: 0px solid transparent;
	color: #757575;
	position: relative;
	width: 80%;
	font-size: 16px;
	padding: 6px;
	border: 1px solid #ddd;
	text-transform: uppercase;
	box-shadow: 3px 3px 3px -3px;
}
.bg-2 {
	background-color: #e92438 !important;
	border: 2px solid #e92438 !important;
	font-size: 15px;
	padding: 5px 15px;
	text-transform: unset;
}
.track-1 td {
	padding: 5px;
	background: #ddd;
}
</style>
</head>

<body>

<div class="page-wrapper" style="background-color: #f7f7f7;">
	<!-- Preloader -->
	<div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
	<header class="header-style-two">
		<?php include('_header.php');?>
	</header>    
	<!-- Main Header -->
	<!--End Main Header -->
	<!--Page Title-->
	<!--Default Section-->
	<!--Feature Section-->   
	<section class="welcome-section pb-70">    	
		<div class="col-md-12" style="padding: 50px 15px 30px 15px; min-height: 250px; background-image: url('images/used-phone-bg.jpg'); background-repeat: repeat;" id="remove1">
		<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
			<h1 style="line-height: 1; margin-top: 15px; text-align: center; color: #fff;">
			Track <span style="color: #fff; font-weight: 800;">Order</span></h1>
			<p style="color: #fff; margin-top: 5px;">Track your product/ services 
			status using your token Id at this link</p>
		</div>
	</div>
	<div class="auto-container">
		<div class="row clearfix">
			<!--Cause Column-->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-9 margin-top" id="padding-remove">
						<div class="track-msg">
							<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align: center;margin: 10px 0px 0px;">
								<h2 style="line-height: 1; margin-top: 8px; text-align: center; font-family: inherit;" id="remove1">Track Your	<span style="color: #000; font-weight: 800;">Package</span></h2>
								<h2 style="line-height: 1;text-align: left; font-family: inherit;font-size:18px;margin: 0px 0px 10px !important;padding: 0px;" id="remove2"><span style="color: #000; font-weight: 800;">Track Your Package</span></h2>
							</div>
							<div class="col-md-12 token-mobile">
								<div class="track-form">
									<p style="font-weight: bold; color: #787878; text-align: center; margin: 0px 0px 6px;">Enter Your Token Number</p>
									<input id="track_id" maxlength="10" name="awb" placeholder="ORD0171" style="float: left;" type="text" value="<?=$token;?>" class="mobile-input">
									<input class="theme-btn btn-style-two bg-2 mobile-input2" onclick="track()" style="width: 20%; min-width: 150px;" type="submit" value="Track Now">
								</div>
							</div>
							<div class="col-md-12" style="margin-top: 20px;">
								<div id="lastcenter-detail" class="track-status">
									<h2 style="padding-top: 2px; font-size: 18px; text-align: left; margin-bottom: 10px; font-weight: 500;">Token No. :
									<span id="trackid_dup" style="padding-left: 10px; font-weight: 500;">Track Status</span></h2>
									<div class="track-dtl">
										<div id="track_dtl">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>    
	<!--Sponsors Section-->
	<!--Main Footer--><?php include('_footer.php');?></div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper">
	<span class="fa fa-long-arrow-up"></span></div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function track(){    
	track_id=$("#track_id").val();       
	$.ajax({                 
		type:"POST",           
		url:"soumadmin/_ajax_generic-track.php",           
		data:"track_id="+track_id,			           
		success:function(data)           
			{           	
				$('#trackid_dup').html($('#track_id').val());               
				$("#track_dtl").html(data);           
			}              
	});
}
</script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>

</body>

</html>
