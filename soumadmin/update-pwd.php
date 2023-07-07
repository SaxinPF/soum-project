<?php 
include('../config2.php');

$poster_id=$_REQUEST['poster_id'];
$poster_type=$_REQUEST['poster_type'];

if($poster_type=='Dealer')
{
	$sql="select * from soum_master_dealer where cust_id=$poster_id";
	
}
else if($poster_type=='Customer')
{
	$sql="select * from soum_master_customer where cust_id=$poster_id";
	
}
$res=$db->query($sql);
$row=$res->fetch_assoc();
$pwd=$row['user_pass'];


if(isset($_REQUEST['Submit']))
{
  $new=$_REQUEST['new'];
  
  
  if($poster_type=='Dealer'){ $table="soum_master_dealer"; }else{ $table="soum_master_customer";}
  $sql="update $table set user_pass=md5('$new') where cust_id=$poster_id";
  $res=$db->query($sql);
 
  if($res)
  {
    echo "<script>alert('Password Changed Successfully');</script>";
    if($poster_type=='Dealer')
    	echo "<script>window.location.href='dealer_master.php';</script>";
    else
   		 echo "<script>window.location.href='customer_master.php';</script>";
  }
}

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Admin Dashboard</title>
	
	<!-- Icons -->
		<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">
	<link rel="stylesheet" href="styles/plugins/select2.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-slider.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-datepicker.css">
	<link rel="stylesheet" href="styles/plugins/summernote.css">
	
	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">


	 
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> 
	<style>
	.form-control {
	border:1px solid#ddd;
	}
	.link {
    padding: 5px 8px;
    border-radius: 2px;
    margin-left: 5px;
    background-color: #787878;
    border-color: #898989;
    color: #fff;
}

.select-wrapper {
    background:url('../images/plus-icon.png') no-repeat;
    background-size: 31px 30px;
    background-position: center center;
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    border: 1px dashed#ddd;
    position: relative;
}
#fileToUpload1 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
	</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"/>	
<script src="scripts/jquery.min.js"></script>
<script>
function validateForm()
{
  var old=$("#old").val();
  var new1=$("#new").val();
  var new2=$("#new2").val(); 
  var rep=$("#rep").val();
  
  
  /*if(old=='')
  {
    alert("Enter old password");
    return false;
  }*/
  
  if(new1=='')
  {
    alert("Enter new password");
    return false;
  }
  
  if(rep=='')
  {
    alert("Enter repeat new password");
    return false;
  }
  
  if(new1!=rep)
  {
    alert("Enter new and repeat password same");
    return false;
  }
  /*if(CryptoJS.MD5(old)!=new2)
  {
    alert("Enter right old password");
    return false;
  }*/
}
</script>


</head>
<body id="app" class="app off-canvas">
	<!-- #Start header -->
		<?php include('_header.php');?>
	<!-- #end header -->

	<!-- main-container -->
	<div class="main-container clearfix">
		<!-- main-navigation -->
		<?php include('_left-menu.php');?>
		<!-- #end main-navigation -->

		<!-- content-here -->
		<div class="content-container" id="content">
			<!-- dashboard page -->
			<div class="page page-dashboard">

				<div class="page-wrap">

					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">Update Password</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					
					
					
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-6" style="margin:auto;float:none;">
						<div class="dash-head clearfix mb20" style="min-height:300px;width:100%;float:left;padding-top:15px;">
												
					<form name="myForm"  method="post" onsubmit="return validateForm()" style="width:100%;float:left;margin-top:0px;">
							<input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
							<input type="hidden" name="poster_type" value="<?=$poster_type;?>"/>
							<input type="hidden" name="new2" id="new2" value="<?=$pwd;?>"/>
									
					
					<div class="col-md-12" style="margin-bottom:0px;display:none">
						<label class="labelTop">Old Pass: <span class="require">*</span></label>
						<input  class="form-control" name="old" id="old" type="text">
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">New Pass: <span class="require">*</span></label>
						<input  class="form-control"  name="new" id="new" type="password">
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Repeat Pass: <span class="require">*</span></label>
						<input  class="form-control"  name="rep" id="rep" type="password">
					</div>
					
					
					<div class="col-md-12 botton1" style="text-align:center;margin-top:15px;">
						<input value="Update Password" name="Submit" type="submit" style="width:auto !important;">
					</div>
					</form>
					
												
							
						
							


							</div>
							
						</div>
					</div>					
				
				</div> <!-- #end page-wrap -->
			</div>
			<!-- #end dashboard page -->
		</div>

	</div> <!-- #end main-container -->

	<!-- theme settings -->
	<div class="site-settings clearfix hidden-xs">
		<div class="settings clearfix">
			<div class="trigger ion ion-settings left"></div>
			<div class="wrapper left">
				<ul class="list-unstyled other-settings">
					<li class="clearfix mb10">
						<div class="left small">av Horizontal</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox" id="navHorizontal"> 
								<span>&nbsp;</span> 
							</label>
						</div>
						
						
					</li>
					<li class="clearfix mb10">
						<div class="left small">Fixed Header</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="fixedHeader"> 
								<span>&nbsp;</span> 
							</label>
						</div>
					</li>
					<li class="clearfix mb10">
						<div class="left small">av Full</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="navFull"> 
								<span>&nbsp;</span> 
							</label>
						</div>
					</li>
				</ul>
				<hr/>
				<ul class="themes list-unstyled" id="themeColor">
					<li data-theme="theme-zero" class="active"></li>
					<li data-theme="theme-one"></li>
					<li data-theme="theme-two"></li>
					<li data-theme="theme-three"></li>
					<li data-theme="theme-four"></li>
					<li data-theme="theme-five"></li>
					<li data-theme="theme-six"></li>
					<li data-theme="theme-seven"></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- #end theme settings -->


	

	<!-- Dev only -->
	<!-- Vendors -->
		<script src="scripts/vendors.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/select2.min.js"></script>
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/form-elements.init.js"></script>


</body>
</html>