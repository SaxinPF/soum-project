<?php
include('../config2.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
//echo $_SESSION['user_name'];
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
.report td {
    border: 1px solid#ddd;
    padding: 5px;
}
.form-control {
	border:1px solid#ddd;
}
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 180px;
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
.auto-style3 {
	border: 1px solid #000000;
}
.track-1 td {
	border:1px solid#ddd;
	padding:5px;
}
.white-box {
    position: relative;
    height: 230px;
    width: 450px;
    background-color: #ffffff;
    box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -o-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -ms-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -moz-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -webkit-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    padding:10px;
    padding-top:20px;
    overflow: hidden;
    background-image: url('../images/map-small.png');
    background-repeat: no-repeat;
    background-size: cover;
}
.track-logo {
    position: relative;
    margin: 0px auto;
    height: 120px;
    width: 100%;
    text-align: left;
    margin-bottom: 5px;
}
.box-heading {
    font-size:26px;
    line-height: 30px;
    color: #212121;
    opacity: 0.75;
    margin-bottom: 10px;
    text-align: center;
    text-transform: uppercase;
    width:auto;float:right;
}
.box-tagline {
    font-size: 14px;
    text-align: center;
    line-height: 28px;
    margin-bottom: 15px;
    color: #212121;
    opacity: 0.75;

}
.track-form input {
    background-color: transparent;
    border: 0px solid transparent;
    color: #757575;
    position: relative;
    width: 100%;
    font-size: 16px;
    padding: 10px 0;
    border-bottom: 2px solid #757575;
    text-transform: uppercase;
}
.search_btn {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    float: right;
    position: absolute;
    right: 20px;
    top: 20px;
}
ShippingIcon.full.css:1
.icon {
    font-family: 'ShippingIcon';
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
#wrapper1 {
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8);
}
#wrapper1 #docket {
    text-align: center;
}
#docket .doc-data {
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 2px;
    padding: 20px 0;
}
.doc-data .doc-no {
    color: #f48221;
    padding-left: 10px;
}
.track-bkg{
    min-height: 450px;
    background: rgba(0, 0, 0, 0) url('../images/track-bkg.jpg') no-repeat center center / cover;
    border:1px solid#ddd;
/*    background-image: url('images/track-bkg.jpg');
    background-size: cover;*/
}
#lastcenter-detail {
    /*background: #fff none repeat scroll 0 0;
    border: 2px solid #f48221;
    border-radius: 10px;*/
    margin: auto;
    padding: 10px;
    width: 100%;

}
.track-1 td {
	border:1px solid#ddd;
	padding:6px;
	text-align:left;
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
						<div class="col-md-12" style="margin-top:20px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top: 0px;">Tablet</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> <!-- #end row -->

					<!-- mini boxes -->
					<div id="box-new" class="col-md-12">
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="tablet_master.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
											<h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Tablet Model</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>
				
                        <!--<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="admin_adv_cable.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
											<h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Admin Datacables List</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>-->
                    
			      </div>



					<!-- row -->
					 <!-- #end row -->

				</div> <!-- #end page-wrap -->
			</div>
			<!-- #end dashboard page -->
		</div>

	</div> <!-- #end main-container -->

	<!-- #end theme settings -->
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
