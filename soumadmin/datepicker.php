<?php include('../config2.php');


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
	</style>
	<script>
		function edit(cat_id,start-date,end-date,title,image,desc1,desc2,activie,act)
		{
			//alert(cat_id);
			$(".personSelect").val(cat_id);
			$("#btn-add").html(act);
			$("#start-date").val(start-date);	
			$("#end-date").val(end-date);
			$("#title").val(title);
			$("#image").val(image);
			$("#desc1").val(desc1);
			$("#desc2").val(desc2);
			$("#active").val(active);
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
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">Offer Detail</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					
					
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">
							
									


									<div class="col-md-6">
										<label class="control-label small">Satart Date</label>
										<div class="input-group date" id="datepickerDemo">
											<input type="text" class="form-control" id="start-date" name="start-date"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label small">End Date</label>
										<div class="input-group date" id="datepickerDemo2">
											<input type="text" class="form-control" id="end-date" name="end-date"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label class="control-label small">Offer Title</label>
										<input class="form-control" type="text" id="title" name="title">
									</div>
									<div class="col-md-6">
										<label class="control-label small">Image Upload</label>
										<input type="file" style="width:100%;padding:5px;border:1px solid#ddd;" id="image" name="image">
									</div>
									
									<div class="col-md-12">
										<label class="control-label small">Offer Description1</label>
										<textarea rows="3" class="form-control resize-v" placeholder="Message here" id="desc1" name="desc1"></textarea>	
									</div>
									
									<div class="col-md-12">
										<label class="control-label small">Offer Description2</label>
										<input class="form-control" type="text" id="desc2">
									</div>
									<div class="col-md-12">
										<div class="ui-checkbox ui-checkbox-primary" style="margin-top:20px;text-align:center">
										<label class="control-label small">&nbsp;</label>
											<label>
												<input checked="" type="checkbox" id="active" name="active"> 
												<span>Active</span>
											</label>
										</div>
									</div>

									<div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Add</button>
									</div>
									<p>&nbsp;</p>
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
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/select2.min.js"></script>	
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/form-elements.init.js"></script>


</body>
</html>