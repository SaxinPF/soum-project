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
	font-weight: bold;
}
</style>
</head>
<body id="app" class="app off-canvas">
<?php 
$search=$_REQUEST['search'];
if($search!='')
{
$conds="and concat(order_token,order_date,order_type,prod_subcat_desc,model,purchase,sale)like '%$search%'";
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
					<div class="row" style="margin-top:30px;">
						<!-- dashboard header -->
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">

									<h4 class="mb5 text-light">Activity Report</h4>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> 
					<!-- #end row -->
				<!-- mini boxes -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20" style="min-height:550px;position:relative;">
								<table style="width:auto;float:right;margin-bottom:10px;">
									<tr><form method="post"><td style="padding-right:5px;"><input name="search" class="form-control" type="text" value="<?=$search;?>" /></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr></table>
						&nbsp;
						<div class="col-md-12 table-responsive" style="padding:0px;">
						<table style="width: 100%;border:1px solid#ddd;" class="report">
						<tbody>
							<tr style="font-weight:bold;background-color:#f2f2f2;">
								<td>SNo.</td>
								<td class="auto-style1">Token</td>
								<td>DTTM</td>
								<td>Order Type</td>
								<td>Model No</td>
								<td>Purchased From</td>
								<td>Purc Price</td>
								<td>Sold to</td>
								<td>Sold Price</td>
							</tr>
							<?php
							$num_rec_per_page=10;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
							$i=1+$start_from = ($page-1) * $num_rec_per_page;
							 $sql="select * from( select 
										soum_order_master.order_id, soum_order_master.status_upd_dt,soum_prod_subcat.prod_subcat_desc, soum_prod_subsubcat.prod_subcat_desc as model,
										'Sale Date', poster_type, poster_id, source_id, soum_order_master.cust_id,soum_order_master.cust_type, soum_order_details.price, soum_order_master.`status`,
										soum_order_master.active, soum_order_master.deal,soum_order_master.order_token,soum_order_master.order_date,soum_order_master.order_type,
							if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=soum_product_master.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) purchase,
	(select fname from soum_master_customer where cust_id=soum_order_master.cust_id) sale
										from soum_order_master, soum_order_details, soum_product_master, soum_prod_subcat, soum_prod_subsubcat
										where
										soum_order_master.order_id=soum_order_details.order_id
										and soum_order_details.prod_id= soum_product_master.prod_id
										and soum_product_master.brand= soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id )temp2 where 1=1 ".$conds ."  order by temp2.status_upd_dt desc LIMIT $start_from, $num_rec_per_page";
									 //echo $sql;
										$i=1;
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									    $originalDate =$row['order_date'];
										$dd= date("d-m-Y h:i A", strtotime($originalDate));
										$time= date("h:i A", strtotime($originalDate));
									   ?>
							<tr>
								<td><?=$i++;?></td>
								<td><?=$row['order_token'];?></td>
								<td><?=$dd;?></td>				
								<td><?=$row['order_type'];;?></td>
								<td><?=$row['prod_subcat_desc']." ".$row['model'] ;?></td>
								<td><?=$row['purchase'];?></td>
								<td><?=$row['price'];?></td>
								<td><?=$row['sale'];?></td>
								<td><?=$row['price'];?></td>
							</tr>
							<?php } ?>
						</tbody>
						</table>


</div>
<div class="col-md-12" style="width:100%;text-align:center;margin-top:20px;margin-bottom:20px;">
<?php 
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select soum_order_master.order_id, soum_order_master.status_upd_dt,soum_prod_subcat.prod_subcat_desc, soum_prod_subsubcat.prod_subcat_desc as model,
		'Sale Date', poster_type, poster_id, source_id, soum_order_master.cust_id,soum_order_master.cust_type, soum_order_details.price, soum_order_master.`status`,
		soum_order_master.active, soum_order_master.deal
		from soum_order_master, soum_order_details, soum_product_master, soum_prod_subcat, soum_prod_subsubcat
		where
		soum_order_master.order_id=soum_order_details.order_id
		and soum_order_details.prod_id= soum_product_master.prod_id
		and soum_product_master.brand= soum_prod_subcat.prod_subcat_id
		and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$conds; 
	$rs_result =$db->query($sql); //run the query
	$total_records = mysqli_num_rows($rs_result);  //count number of records
//echo $total_records;
$total_pages = ceil($total_records / $num_rec_per_page); 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='report_order_summary.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='report_order_summary.php?page=".$i."&".$params."'>".$i."</a> "; 
}; 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='report_order_summary.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
?>



</div>
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