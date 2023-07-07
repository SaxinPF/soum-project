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
			<div class="page page-invoice">

				<div class="page-wrap">
			
					<div class="row">
						<div class="col-md-12">
							<!-- Invoice Start -->
							<div class="invoice-wrap">
								<div class="clearfix invoice-head">
									<h3 class="brand-logo text-uppercase text-bold left mt15">
										<i class="ion ion-disc"></i>
										<span class="text">Materia</span>
									</h3>
									<h3 class="text-uppercase text-muted text-bold right mt15">Invoice</h3>
								</div>
								
								<div class="clearfix invoice-subhead mb20">
									<div class="group clearfix left">
										<p class="text-bold mb5">Invoice No - 006</p>
										<p class="small">Date: 16<sup>th</sup> March 2015</p>
									</div>

									<div class="group clearfix right">
										<a href="javascript:;" class="btn btn-default"><i class="ion ion-printer"></i>Print</a>
										<a href="javascript:;" class="btn btn-default"><i class="ion ion-archive"></i>Download</a>
									</div>
								</div>

								<div class="row mb30">
									<div class="col-md-6">
										<div class="address-wrap">
											<div class="address-title">
												<p class="mb5">Sent To</p>
												<h4 class="mt0 text-bold mb0">XYZ Software Ltd.</h4>
											</div>
											<address>
												<strong>LLIC, Inc.</strong><br>
												795 Folsom Ave, Suite 600<br>
												San Francisco, CA 94107<br>
												<abbr title="Phone">Ph:</abbr> (123) 456-7890
											</address>
										</div>
										
									</div>

									<div class="col-md-6">
										<div class="address-wrap">
											<div class="address-title">
												<p class="mb5">Recieved From</p>
												<h4 class="mt0 text-bold mb0">Materia Pvt Ltd.</h4>
											</div>
											<address>
												<strong>Robert Smith</strong><br>
												CS-343, Creative Studio, 340<br>
												San Francisco, CA 13107<br>
												<abbr title="Phone">Ph:</abbr> (123) 456-7890
											</address>
										</div>
										
									</div>
								</div>

								<!-- invoice table -->
								<table class="table table-bordered invoice-table mb30">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Unit Price</th>
											<th>Total</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>2400</td>
											<td>Moto G2 32GB</td>
											<td>1</td>
											<td>$449.00</td>
											<td>$449.00</td>
										</tr>
										<tr>
											<td>2401</td>
											<td>IPad Mini 32GB Wifi+Cellular</td>
											<td>2</td>
											<td>$349.00</td>
											<td>$698.00</td>
										</tr>
										<tr>
											<td>2402</td>
											<td>MacPro Retina 13"</td>
											<td>1</td>
											<td>$999.00</td>
											<td>$999.00</td>
										</tr>
									</tbody>
								</table>
								<!-- #end invoice table -->


								<div class="clearfix text-right total-sum mb30">
									<h3 class="text-uppercase text-bold">Total</h3>
									<h4 class="sum">$2146</h4>
								</div>
								
								<p class="text-center small text-info">This is a computer generated invoice. No signature required.</p>

							</div>

						</div> <!-- Invoice End -->
					</div> <!-- #end row -->

				</div> <!-- #end page-wrap -->

			</div>

		</div> 
		<!-- #end content-here -->

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