<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Dealer Dashboard</title>
	
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

				<div class="page-wrap">

					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
							<div class="dash-head clearfix mb20" style="margin-top: -30px;">
								<div class="left">
									<h4 class="mb5 text-light">Welcome to Mobile Header</h4>
									<p class="small"><strong>Mobile Sub heading</strong></p>
								</div>
								<div class="right mt10">
									<div class="btn-group dropdown" style="position: relative;display: inline-block;">
				                        <button class="btn btn-pink dropdown-toggle ion ion-help-buoy waves-effect" data-toggle="dropdown" aria-expanded="false">&nbsp;<span class="caret"></span></button>
				                        <ul class="dropdown-menu" style="right:0 !important;border: 1px solid#c1134e;margin-left: -100px;">
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="#">Dropdown Menu1</a></li>
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="#">Dropdown Menu2</a></li>
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="#">Dropdown Menu3</a></li>
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="#">Dropdown Menu4</a></li>
				                            <li><a href="#">Dropdown Menu5</a></li>
				                        </ul>
				                    </div>
				                </div>
							</div>
						</div>
					</div> <!-- #end row -->

					<!-- mini boxes -->
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
											<h4 class="mt0 text-primary text-bold">$30,200</h4>
											<h5 class="text-light mb0">All Earnings</h5>
										</div>
										<div class="right ion ion-ios-pulse icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">% change</p>
									<span class="sparkline right" data-Type="bar" data-BarColor="#fff" data-Width="1.15em" data-Height="1.15em">10,8,9,3,5,8,5</span>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
											<h4 class="mt0 text-success text-bold">320K+</h4>
											<h5 class="text-light mb0">Page Views</h5>
										</div>
										<div class="right ion ion-ios-people-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-success">
									<p class="mt0 mb0 left">% change</p>
									<span class="right sparkline" data-Type="bar" data-BarColor="#fff" data-Width="1.15em" data-Height="1.15em">3,5,9,8,6,10</span>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
											<h4 class="mt0 text-info text-bold">110</h4>
											<h5 class="text-light mb0">Task Completed</h5>
										</div>
										<div class="right ion ion-ios-flask-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-info">
									<p class="mt0 mb0 left">% change</p>
									<span class="right sparkline" data-Type="bar" data-BarColor="#fff" data-Width="1.15em" data-Height="1.15em">5,9,9,8,6,6</span>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
											<h4 class="mt0 text-pink text-bold">10K+</h4>
											<h5 class="text-light mb0">Downloads</h5>
										</div>
										<div class="right ion ion-ios-cloud-download-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-pink">
									<p class="mt0 mb0 left">% change</p>
									<span class="sparkline right" data-Type="bar" data-BarColor="#fff" data-Width="1.15em" data-Height="1.15em">6,4,9,10,6,2</span>
								</div>
							</div>
						</div>
						<!-- #end mini boxes -->
					</div> <!-- #end row -->

						<!-- row -->
					<div class="row">

						<!-- profile -->
						<div class="col-md-4 col-sm-6">
							<div class="panel panel-default mb20 panel-hovered profile-widget">
								<div class="panel-body">
									<div class="clearfix mb15 top-info">
										<div class="left-side">
											<h3 class="text-light mt0">Robert Smith</h3>
											<p><strong>About:&nbsp;</strong>WebDesigner</p>
											<p><strong>Hobbies:&nbsp;</strong>Listening Music, learn new things and playing guitar.</p>
											<p>
												<strong>Skills: </strong> 
												<label class="label label-pink">html5</label>
												<label class="label label-pink">css3</label>
												<label class="label label-pink">jquery</label>
											</p>
										</div>
										<div class="right-side">
											<img src="images/admin.jpg" alt="user">
											<div class="rating text-warning">
												<input type="hidden" class="rating-control" value="4" data-filled="fa fa-star" data-empty="fa fa-star-o" />
											</div>
										</div>
									</div>
									<ul class="user-badges list-unstyled row">
										<li class="col-xs-4">
											<i class="ion ion-ios-chatboxes-outline text-success"></i>
											<strong>192</strong>
											<button class="btn btn-success btn-xs mt15">View</button>
										</li>
										<li class="col-xs-4">
											<i class="ion ion-ios-heart-outline text-primary"></i>
											<strong>5K+</strong>
											<button class="btn btn-info btn-xs mt15">Follow</button>
										</li>
										<li class="col-xs-4">
											<i class="ion ion-ios-body text-danger"></i>
											<strong>32</strong>
											<button class="btn btn-primary btn-xs mt15">Profile</button>
										</li>
									</ul>
								</div> <!-- #end panel-body -->
							</div>
						</div>

						<!-- browser share -->
						<div class="col-md-4 col-sm-6">
							<div class="panel panel-default mb20 panel-hovered">
								<div class="panel-heading">Browser Share</div>
								<div class="panel-body text-center">
									<div id="c3chartbrowsershare"></div>
								</div>
							</div>
						</div>

						
						<!-- list widgets -->
						<div class="col-md-4 col-sm-12">
							<div class="panel panel-default mb20 list-widget">
								<ul class="list-unstyled clearfix">
									<li>
										<i class="fa fa-file-o"></i>
										<span class="text">File List</span>
										<span class="badge badge-xs badge-primary right">100</span>
									</li>
									<li>
										<i class="fa fa-comments-o"></i>
										<span class="text">Messages</span>
										<span class="badge badge-xs badge-info right">40+</span>
									</li>
									<li>
										<i class="fa fa-bullhorn"></i>
										<span class="text">otifications</span>
										<span class="badge badge-xs badge-success right">22</span>
									</li>
									<li>
										<i class="fa fa-hdd-o"></i>
										<span class="text">Bandwidth usage</span>
										<span class="badge badge-xs badge-danger right">80%</span>
									</li>
									<li>
										<i class="fa fa-microphone"></i>
										<span class="text">Calls Attended</span>
										<span class="badge badge-xs badge-info circle right">5</span>
									</li>
									<li>
										<i class="fa fa-bookmark-o"></i>
										<span class="text">Bookmarks Today</span>
										<span class="badge badge-xs circle badge-warning right">2</span>
									</li>
									<li>
										<i class="fa fa-bug"></i>
										<span class="text">Bug Fix Today</span>
										<span class="badge badge-xs circle badge-danger right">8</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- #end row -->

					<!-- row -->
					 <!-- #end row -->

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