<?php

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->
	<title>Soum: Used &amp; New Stock</title>
	
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
</style>
	
</head>
<body id="app" class="app off-canvas">
<?php 
$search=$_REQUEST['search'];
if($search!='')
{
$conds=" and concat(soum_prod_subsubcat.prod_subcat_desc,soum_order_master.order_date) like '%$search%'";
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
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">Used & New Stock</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
						
						<!-- style three -->
						<div class="col-md-12 mb30">
						<!-- tab style -->
						
						<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Used</a></li>
									
								</ul>
								<div class="tab-content table-responsive">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1" style="width: 100%">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">SNo.</th>
											<th style="padding:5px; width: 140px;">
											Brand</th>
											<th style="padding:5px; width: 272px;">Model</th>
											<th style="padding:5px;text-align:center">
											Total&nbsp; Available Stock</th>
											<th style="padding:5px;text-align:center">See Details</th>
										</tr>
									</thead>
									<tbody>
									<?php
									   
									    
								        $qry="select  *,sum(current_stock)current_stock,soum_prod_subcat.prod_subcat_desc brand_name,soum_prod_subsubcat.prod_subcat_desc model_name from soum_product_master,soum_prod_subsubcat,soum_prod_subcat 
										where soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and prod_cat_id=2 and current_stock>0
										group by modal";
										//echo $qry;
										$res=$db->query($qry);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
																	
										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['brand_name'];?></td>
											  <td style="text-align:left"><?=$row['model_name'];?></td>
										     <td class="auto-style1"><?=$row['current_stock'];?></td>
											  <td class="auto-style1"><a href="stock_detail.php?model=<?=$row['modal'];?>&type=2">Details</a></td>										</tr>
									<?php
									}
									
									?>									</tbody>
								</table>
									</div>
									
									
								</div>
							</div>
<hr>
<div class="clearfix tabs-fill">
									
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">New</a></li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1" style="width: 100%">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Brand</th>
											<th style="padding:5px;">Model</th>
											<th style="padding:5px;text-align:center">
											Total Available Stock</th>
											<th style="padding:5px;text-align:center">See Details</th>
										</tr>
									</thead>
									<tbody>
									<?php
									   
									    
								        $qry="select  *,sum(current_stock)current_stock,soum_prod_subcat.prod_subcat_desc brand_name,soum_prod_subsubcat.prod_subcat_desc model_name from soum_product_master,soum_prod_subsubcat,soum_prod_subcat 
										where soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_product_master.brand=soum_prod_subcat.prod_subcat_id		
								        and prod_cat_id=1 and current_stock>0
										group by modal";
										//echo $qry;
										$res=$db->query($qry);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
																	
										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['brand_name'];?></td>
											  <td style="text-align:left"><?=$row['model_name'];?></td>
										     <td class="auto-style1"><?=$row['current_stock'];?></td>
											  <td class="auto-style1"><a href="stock_detail.php?model=<?=$row['modal'];?>&type=1">Details</a></td>										</tr>
									<?php
									}
									
									?>
									</tbody>
								</table>
									</div>
									
									
								</div>
							</div>
							
							<!-- tab style -->
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