<?php include("../config2.php");


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
						<!-- style three -->
						<div class="col-md-12 mb30">
						<!-- tab style -->
							<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Approved</a></li>
									<li><a href="#tab-flip-two-1" data-toggle="tab">Disapproved</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th>ame</th>
											<th>Email</th>
											<th>Phone No.</th>
											<th>Type</th>
											<th>Brand</th>
											<th>Phone</th>
											<th>Expected Price</th>
											<th>Is Approved</th>
											<th>See Details</th>
										</tr>
									</thead>

									<tbody>
									<?php
									$type=$_REQUEST['type'];
									$cond='';
									if($type!='')
									{
									$cond=" and soum_product_master.poster_type='$type'";
									}
									
									  $sql="select temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal
										,soum_product_master.poster_id,soum_product_master.poster_type from soum_product_master where active='1' and poster_id=$poster_id and poster_type=$poster_type) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id";
									  //echo $sql;

									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									      $pid=$row['poster_id'];
									      
									      if($row['poster_type']=='Customer')
									      {
										  	$sql1="select * from soum_master_customer where cust_id=$pid";
										  }
										  else
										  {
										   $sql1="select * from soum_master_dealer where cust_id=$pid";
										  }
										  //echo $sql1;
										  $res1=$db->query($sql1);
										  while($row1=$res1->fetch_assoc())
										  {

									?>
										<tr>
											<td><?=$row1['fname'];?></td>
											<td><?=$row1['email'];?></td>
											<td><?=$row1['mobile'];?></td>
											<td><?=$row['prod_type'];?></td>											
											<td><?=$row['prod_subcat_desc'];?></td>
											<td><?=$row['model_name'];?></td>
											<td><?=$row['rate'];?></td>
											<td>Yes</td>
											<td><a href="phone_detail.php?poster_id=<?=$row['prod_id'];?>&type=<?=$type;?>">Details</a></td>
										</tr>
									<?php
									}
									}
									?>
									</tbody>
								</table>

									</div>
									<div class="tab-pane" id="tab-flip-two-1">
<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th>ame</th>
											<th>Email</th>
											<th>Phone No.</th>
											<th>Type</th>
											<th>Brand</th>
											<th>Phone</th>
											<th>Expected Price</th>
											<th>Is Approved</th>
											<th>See Details</th>
										</tr>
									</thead>

									<tbody>
									<?php
									 $sql="select temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal
										,soum_product_master.poster_id,soum_product_master.poster_type from soum_product_master where active='0' ".$cond.") prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id";
									 //echo $sql;
										
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									      $pid=$row['poster_id'];
									      
									      if($row['poster_type']=='Customer')
									      {
										  	$sql1="select * from soum_master_customer where cust_id='$pid'";
										  }
										  else
										  {
										   $sql1="select * from soum_master_dealer where cust_id='$pid'";
										  }
										 // echo $sql1;
										  
										  $res1=$db->query($sql1);
										  while($row1=$res1->fetch_assoc())
										  {

									?>
										<tr>
											<td><?=$row1['fname'];?></td>
											<td><?=$row1['email'];?></td>
											<td><?=$row1['mobile'];?></td>
											<td><?=$row['prod_type'];?></td>											
											<td><?=$row['prod_subcat_desc'];?></td>
											<td><?=$row['model_name'];?></td>
											<td><?=$row['rate'];?></td>
											<td>o</td>
											<td><a href="phone_detail.php?poster_id=<?=$row['prod_id'];?>&type=<?=$type;?>">Details</a></td>
										</tr>
									<?php
									}
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