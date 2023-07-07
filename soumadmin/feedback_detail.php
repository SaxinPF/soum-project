<?php include("../config2.php");
$fid=$_REQUEST['fid'];
$status=$_REQUEST['status'];
if(isset($_REQUEST['Submit1']))
{
  $sqlupd="update soum_feedback set status='$status' where feedback_id='$fid'";
  $res=$db->query($sqlupd);
  if($res)
  {
  
  
                                      $sql="select * from soum_feedback where feedback_id=$fid";
    								  $res=$db->query($sql);
									  $row=$res->fetch_assoc();
					if($row['enquiry_type']=='PreLaunch'){ 				  
                                      $mobile = $row['mobile'];
  	                         $msg = "We have received your advance, once we have the mobile we would contact you.";
							 $message = urlencode($msg);
						     sms_api($mobile,$message);
                     echo "<script>window.location.href='feedback_list.php?type2=PreLaunch';</script>";
                    }else{
					    echo "<script>window.location.href='feedback_list.php?type2=Enquiry';</script>";
					
					}
  
  
  
    //header("location:feedback_list.php");

  
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
	<link rel="stylesheet" href="styles/plugins/c3.css">
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">

	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">

 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]-->

<style>
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  list-style: none;
  font-size: 14px;
  text-align: left;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid #eeeeee;
  border-radius: 2px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  background-clip: padding-box;
}
.table > tbody > tr > td {
	padding-left:6px;
	padding-right:6px;
}
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: left;
}
</style>

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
				<div class="page-wrap" style="min-height:450px;">

				<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">
									Feedback Details</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> <!-- #end row -->
					<div class="row">
						<div class="col-md-12">
						<div class="auto-style1" style="background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6)) !important;padding:50px 0px;width:100%;float:left;">
						<!-- style three -->
						<div class="col-md-6 mb30" style="margin:auto;float:none;">
						<!-- tab style -->
							<div style="width:100%;float:left;background:#fff;padding:10px;box-shadow: 1px 2px 7px 0px;border-radius:3px;">

                             <?php

                                    $i=1;
									  $sql="select * from soum_feedback where feedback_id=$fid";
									  $res=$db->query($sql);
									  $row=$res->fetch_assoc();

									?>
									<form method="post">
									<input name="fid" type="hidden" value="<?=$fid;?>"/>
									<table class="table table-bordered invoice-table mb60" id="list-1" align="center" style="width: 100%">

										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">
											Token Id</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['token_id'];?></td>

										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">											Name</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['fname'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Email</td>
											<td style="padding: 5px;word-break: break-all;" class="auto-style2"><?=$row['email'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Phone</td>
											<td style="padding: 5px; word-break: break-all;" class="auto-style2"><?=$row['mobile'];?></td>
										</tr>
										<?php if($row['enquiry_type']=='PreLaunch'){
										      $brand_id =   $row['brand_id'];
											 $sql="select * from soum_prod_subcat where prod_subcat_id=$brand_id";
				                             $res=$db->query($sql);
										      $brand=$res->fetch_assoc();


											 $model_id =   $row['model_id'];
											 $sql="select * from soum_prod_subsubcat where prod_subsubcat_id=$model_id";
				                             $res=$db->query($sql);
										      $model=$res->fetch_assoc();


										?>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Brand</td>
											<td style="padding: 5px; word-break: break-all;" class="auto-style2"><?=$brand['prod_subcat_desc']?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Model</td>
											<td style="padding: 5px; word-break: break-all;" class="auto-style2"><?php echo $row['model_name'];?></td>
										</tr>

										<?php 	} ?>


										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Description</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['msg'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Status</td>
											<td style="padding: 5px;" class="auto-style2">
												<select name="status" style="width:100%;padding:10px;border:1px solid#ddd;">
												<option value="">Select</option>
												<option value="0" <?php if($row['status']==0) echo "Selected";?>>Pending</option>
												<option value="1" <?php if($row['status']==1) echo "Selected";?>>Processed</option>
												<!--<option value="2" <?php //if($row['status']==2) echo "Selected"; ?>>Resolved</option>-->
												</select>
											</td>
										</tr>
										<tr>
											<td style="padding: 5px;" class="auto-style1" valign="top" colspan="2">
											<button name="Submit1" type="submit" value="Change Status" class="btn btn-primary mr5 waves-effect waves-effect">Update Status</button></td>
										</tr>
										</table>
									</form>
							</div>
							</div>
							<!-- tab style -->
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
	<script src="scripts/plugins/d3.min.js"></script>
	<script src="scripts/plugins/c3.min.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/jquery.sparkline.min.js"></script>
	<script src="scripts/plugins/jquery.easypiechart.min.js"></script>
	<script src="scripts/plugins/bootstrap-rating.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/index.init.js"></script>
</body>
</html>
