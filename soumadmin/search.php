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
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">

	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">


	 
 	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'> -->

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
			<div class="page page-search">
				<div class="page-wrap">
					
					<div class="row">
						<div class="col-md-12">

							<form class="form-horizontal" action="javascript:;">
								<div class="input-group input-group-lg mb15">
									<input class="form-control" type="text" placeholder="Type Keywords">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-default ion ion-search"></button>
									</div>
								</div>
							</form>

							<!-- search results -->
							<div class="search-heading mb5 ml5">
								<h4 class="text-light h5">
									<strong>43</strong> results found : 
									<strong class="search-keyword text-danger text-normal">Keyword</strong>
								</h4>
							</div>

							
							<!-- Search results -->
							<div class="panel panel-lined mb30">
								<div class="panel-body">
									<div class="result mb30">
										<h4 class="mb0 text-info">Mauris at pellentesque volutpat</h4>
										<a href="javascript:;" class="small text-success">http://examplesite.com</a>
										<p class="mt5 summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<div class="tags">
											<span>Tags:&nbsp;</span>
											<label class="label label-primary">One</label>
											<label class="label label-primary">Two</label>
											<label class="label label-primary">Three</label>
										</div>
										<hr/>
									</div>

									<div class="result mb30">
										<h4 class="mb0 text-info">Sodales nisi nec condimentum Mauris convallis</h4>
										<a href="javascript:;" class="small text-success">http://examplesite.com</a>
										<p class="mt5 summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<div class="tags">
											<span>Tags:&nbsp;</span>
											<label class="label label-primary">Admin</label>
										</div>
										<hr/>
									</div>

									<div class="result mb30">
										<h4 class="mb0 text-info">Web Design App</h4>
										<a href="javascript:;" class="small text-success">http://examplesite.com</a>
										<p class="mt5 summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<div class="tags">
											<span>Tags:&nbsp;</span>
											<label class="label label-primary">Web App</label>
											<label class="label label-primary">Freelance</label>
										</div>
										<hr/>
									</div>

									<div class="result mb30">
										<h4 class="mb0 text-info">Responsive Wordpress Theme</h4>
										<a href="javascript:;" class="small text-success">http://examplesite.com</a>
										<p class="mt5 summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<div class="tags">
											<span>Tags:&nbsp;</span>
											<label class="label label-primary">WP</label>
											<label class="label label-primary">WordPress</label>
										</div>
										<!-- <hr/> -->
									</div>

									<pagination total-items="50" ng-model="currentPage" class="pagination"></pagination>
								</div>
							</div> <!-- #end search-results -->
							
							
						</div>
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
	<!-- Dev only -->
	<!-- Vendors -->
	<script src="scripts/vendors.js"></script>

	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/app.js"></script>

</body>
</html>