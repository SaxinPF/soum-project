<?php include("../config2.php");?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Soum: Order Summary Detail</title>
	
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
							<div class="dash-head clearfix mb20" style="margin-top:30px;">
								<div class="left">
									<h4 class="mb5 text-light">Order Summary Detail</h4>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> 
					<!-- #end row -->
					<!-- mini boxes -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20 table-responsive" style="min-height:400px;">
								
						<table style="width: 100%;border:1px solid#ddd;" class="report">
						<tbody><tr style="font-weight:bold;background-color:#f2f2f2;">
							<td>SNo.</td>
							<td>Token</td>
							<td>DTTM</td>
							<td>Model No</td>							
							<td>Sold to</td>
							<td>Contact Number</td>
							<td>Date of Birth </td>
							<td>Anniversary</td>
						</tr>
						<?php
							$num_rec_per_page=10;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
							$i=1+$start_from = ($page-1) * $num_rec_per_page;

									$sql="select 
									soum_order_master.order_id, soum_order_master.status_upd_dt,soum_prod_subcat.prod_subcat_desc, soum_prod_subsubcat.prod_subcat_desc as model,
									'Sale Date', poster_type, poster_id, source_id, soum_order_master.cust_id,soum_order_master.cust_type, soum_order_details.price, soum_order_master.`status`,
									soum_order_master.active, soum_order_master.deal,soum_order_master.order_token,soum_order_master.order_date,
									if(poster_type='Dealer',
									(select fname from soum_master_dealer where cust_id=soum_product_master.poster_id),
									if(poster_type='Customer',(select fname from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) purchase,
									(select fname from soum_master_customer where cust_id=soum_order_master.cust_id) sale,
									(select mobile from soum_master_customer where cust_id=soum_order_master.cust_id) mobile,
									(select dob from soum_master_customer where cust_id=soum_order_master.cust_id) dob,		
									(select doa from soum_master_customer where cust_id=soum_order_master.cust_id) doa

									from soum_order_master, soum_order_details, soum_product_master, soum_prod_subcat, soum_prod_subsubcat
									where
									soum_order_master.order_id=soum_order_details.order_id
									and soum_order_details.prod_id= soum_product_master.prod_id
									and soum_product_master.brand= soum_prod_subcat.prod_subcat_id
									and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$conds ."  order by soum_order_master.status_upd_dt desc LIMIT $start_from, $num_rec_per_page";
									 //echo $sql;
										$i=1;
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									    $originalDate =$row['order_date'];
										$dd= date("d-m-Y h:i A", strtotime($originalDate));
										$time= date("h:i A", strtotime($originalDate));
									  
									   $dob=$row['dob'];									  
									   $dob= date("d-m-Y", strtotime($dob));
									   $doa=$row['doa'];
									   $doa= date("d-m-Y", strtotime($doa));
									   ?>

						
						<tr>
							<td><?=$i++;?></td>
							<td><?=$row['order_token'];?></td>
							<td><?=$dd;?></td>
							<td><?=$row['prod_subcat_desc']." ".$row['model'] ;?></td>
							<td><?=$row['sale'];?></td>
							<td><?=$row['mobile'];?></td>
							<td><?=$dob;?></td>
							<td><?=$doa;?></td>
						</tr>
						<?php } ?>
						</tbody>
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