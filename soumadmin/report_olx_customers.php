<?php 
include("../config2.php");
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

	<title>Soum</title>
	
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
.auto-style1 {
	border-collapse: collapse;
	border: 1px solid #ddd;
	padding:5px;
}
.auto-style6 {
	font-size: x-small;
	border: 1px solid #ddd;
	padding:5px;
}
.auto-style7 {
	font-size: small;
	border: 1px solid #ddd;
	padding:5px;
}
</style>

</head>
<body id="app" class="app off-canvas">
<?php 
$search=$_REQUEST['search'];

if($search!='')
{
$conds="and (soum_prod_subcat.prod_subcat_desc like '%$search%' or soum_prod_subsubcat.prod_subcat_desc like '%$search%' or soum_order_master.status_upd_dt like '%$search%')";
}



?>

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
									<h4 class="mb5 text-light">OLX CUSTOMERS</h4>
								</div>
								<?php include('_right_menu.php');?>

							</div>
						</div>
					</div> 
					<!-- #end row -->
					<!-- mini boxes -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20" style="min-height:400px;position:relative;">
								<table style="width:auto;float:right;margin-bottom:10px;">
									<tr><form method="post"><td style="padding-right:5px;"><input name="search" class="form-control" type="text" value="<?=$search;?>" /></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr></table>
						&nbsp;<table cellpadding="0" cellspacing="0" style="width:100%" width="832" class="auto-style1">
	<colgroup>
		<col span="9" width="64" />
	</colgroup>
	<tr>
		<td class="auto-style6" style="height: 20px">DATE</td>
		<td class="auto-style6" style="height: 20px">MODEL</td>
		<td class="auto-style6" style="height: 20px">CUSTOMER NAME</td>
		<td class="auto-style6" style="height: 20px">CONT. NUMBER</td>
		<td class="auto-style6" style="height: 20px">DOB</td>
		<td class="auto-style6" style="height: 20px">ANN</td>
		<td class="auto-style6" style="height: 20px">FEED BACK</td>
		<td class="auto-style6" style="height: 20px">ENTRY NUMBER</td>
		<td class="auto-style6" style="mso-spacerun: yes; height: 20px;"></td>
	</tr>
	<tr height="20">
		<td class="auto-style6" height="20">05-May</td>
		<td class="auto-style6">SAMSUNG S7EDGE BLACK</td>
		<td class="auto-style6">VIKRAM</td>
		<td align="right" class="auto-style6">7.20E+09</td>
		<td class="auto-style6">12-Oct</td>
		<td class="auto-style7"></td>
		<td class="auto-style6">?</td>
		<td class="auto-style6">62</td>
		<td class="auto-style6">ROSE GOLD 6S</td>
	</tr>
	<tr height="20">
		<td class="auto-style6" height="20">12-May</td>
		<td class="auto-style6">SAMSUNG S6 EDGE64</td>
		<td class="auto-style6">ABHIMANYU SINGH</td>
		<td align="right" class="auto-style6">8.00E+09</td>
		<td class="auto-style6">09-Jul</td>
		<td class="auto-style7"></td>
		<td class="auto-style6">Y</td>
		<td class="auto-style6">72</td>
		<td class="auto-style7"></td>
	</tr>
	<tr height="20">
		<td class="auto-style6" height="20">12-May</td>
		<td class="auto-style6">APPLE 6S ROSE GOLD</td>
		<td class="auto-style6">SHUBHAM JAIN</td>
		<td align="right" class="auto-style6">8.00E+09</td>
		<td class="auto-style6">25-Oct</td>
		<td class="auto-style7"></td>
		<td class="auto-style6">Y</td>
		<td class="auto-style6">70</td>
		<td class="auto-style6">jaini.shubham1025@gmail.com</td>
	</tr>
</table>
							
							</div>
						</div>
					</div> <!-- #end row -->


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