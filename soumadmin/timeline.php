<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Materia - Admin Template</title>
	
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
			<div class="page page-timeline">

				<div class="page-wrap">
					
					<div class="row">
						<div class="col-md-12">
							
							<!-- timeline start -->
							<ul class="list-unstyled timeline">
								<li>
									<time class="event-time" datetime="2014-05-19 03:04">
										<div class="date text-light">Today</div>
										<div class="time h4 mt0">4:32&nbsp;<strong class="text-bold">p.m</strong></div>
									</time>
									<span class="event-icon event-icon-success">
										<i class="ion ion-edit"></i>
									</span>

									<div class="event">
										<h4 class="text-info">Simie&nbsp;<span class="small">added three new friends</span></h4>
										<div class="clearfix mb15">
											<img src="images/sample/1.jpg" alt="image" width="28" height="28" class="img-circle"> 
											<img src="images/sample/2.jpg" alt="image" width="28" height="28" class="img-circle"> 
											<img src="images/sample/3.jpg" alt="image" width="28" height="28" class="img-circle"> 
										</div>
										<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>

									</div>
								</li>

								<li class="on-right">
									<time class="event-time" datetime="2014-05-19 03:04">
										<div class="date text-light">Yesterday</div>
										<div class="time h4 mt0">2:32&nbsp;<strong class="text-bold">a.m</strong></div>
									</time>
									<span class="event-icon event-icon-primary">
										<i class="ion ion-email-unread"></i>
									</span>

									<div class="event">
										<h5 class="mb15">Attended meetup with <span class="text-muted">unity group</span></h5>
										<p>Learned a lot about this game engine. Thanks a lot guys. Follow unity group:</p>
										<div>
											<button type="button" class="btn btn-twitter btn-xs fa fa-twitter icon"></button>
											<button type="button" class="btn btn-facebook btn-xs fa fa-facebook  icon"></button>
											<button type="button" class="btn btn-gplus btn-xs fa fa-google-plus  icon"></button>
										</div>
									</div>
								</li>

								<li>
									<time class="event-time" datetime="2014-05-19 03:04">
										<div class="date text-light">3rd March</div>
										<div class="time h4 mt0">4:12&nbsp;<strong class="text-bold">p.m</strong></div>
									</time>
									<span class="event-icon event-icon-pink">
										<i class="ion ion-document-text"></i>
									</span>

									<div class="event">
										<h5 class="mb15">Web Projects uploaded by <strong class="text-muted">Isha</strong></h5>
										<p class="small">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
										<figure class="row">
											<img src="images/gallery/sample-1.jpg" alt="image" class="col-sm-6 mb15 col-xs-12">
											<img src="images/gallery/sample-2.jpg" alt="image" class="col-sm-6 mb15 col-xs-12">
										</figure>
									</div>
								</li>

							</ul> <!-- #end timeline -->

						</div> <!-- #end col -->
					</div> <!-- #end row -->

				</div> <!-- #end page-wrap -->

			</div>
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