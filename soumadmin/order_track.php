<?php include('../config2.php'); 
$ord_id=$_REQUEST['ord_id'];
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
									<h4 class="mb5 text-light">Track Order</h4>
								</div>
							</div>
						</div>
					</div> 
					<!-- #end row -->
					<!-- mini boxes -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20" style="min-height:400px;">
						<div class="wrap">
		
		<!-- start login -->
		<section id="main">
	<div class="new-product">
				<div class="new-product-top">
			        
			        
			        <div class="col-md-12">
			<?php
				$sql="select * from soum_order_master where order_id=$ord_id";
				$result=$db->query($sql);
				$row=$result->fetch_assoc();
				$cust_name=$row['fname'];
				$ship_addr=$row['shipping_address'];
				$order_status=$row['status'];
				$tax_amt=$row['tax_amt'];
				$ship_amt=$row['ship_amt'];
				$disc_amt=$row['disc_amt'];
				$discount_amt=$row['discount_amt'];
				$ord_stat="";
				if($order_status==0)
				{
					if($_SESSION['user_type']=='admin')
   					{
   						$ord_stat="Order Received";
   					}
   					else
   					{
   						$ord_stat="Order Given";
   					}

				}
				elseif($order_status==1)
				{
					$ord_stat="In Process";
				}
				else
				{
					$ord_stat="Delivered";
				}
			?>
				 
<div class="col-md-12">
<p style="width: 100%;float: left;padding: 10px;background-color:#ddd;border-left: 5px solid#fbaf17;"><strong>Dear <?=$cust_name;?> </strong></p>
<p>Thanks For Shopping With Us</p>

	<table class="table table table-shopping-cart" style="border:1px solid#bfbfbf;">
	<thead>
	<tr>
	<th colspan="6">Your Order ID: <?=$ord_id;?></th>
	<tr>
	<tr>
	<th colspan="6">Order Details</th>
	<tr style="background-color:#bfbfbf;">
	<th style="width:60px;">#</th>
	<th>Image</th>
	<th>Brand</th>
	<th>Model</th>
	<th style="text-align:right">Price (in Rs.)</th>
	<th style="text-align:right">Quantity</th>
	<th style="text-align:right">Total (in Rs.)</th>
	
	</tr>
	</thead>

	<?php
	$ord_id=$_REQUEST['ord_id'];
	$qry="select temp4.*,soum_prod_subsubcat.prod_subcat_desc model from (
	select temp3.*,soum_prod_subcat.prod_subcat_desc brand_name from (
	select temp2.*,code,images,brand,modal from
	(select temp.*,prod_id,qty,price from
	(select * from soum_order_master where order_id=$ord_id ) temp
	left outer join soum_order_details
	on temp.order_id=soum_order_details.order_id) temp2
	left outer join soum_product_master
	on soum_product_master.prod_id=temp2.prod_id	 )temp3
	left outer join soum_prod_subcat
	on temp3.brand=soum_prod_subcat.prod_subcat_id )temp4 
	left outer join soum_prod_subsubcat
	on temp4.modal=soum_prod_subsubcat.prod_subsubcat_id";
	//echo $qry;
	$res=$db->query($qry);
	$i=0;
	$tot=0;
	$grand_tot=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		$dob_by_chris=$row['order_date'];
		$b_y=substr($dob_by_chris,0,4);							
		$b_m=substr($dob_by_chris,5,2);							
		$b_d=substr($dob_by_chris,8,2);							
		$ord_dt=$b_d."-".$b_m."-".$b_y;
		
		$price=$row['price'];
		$qty=$row['qty'];
		$amt=$price*$qty;
		$tot= $tot+$amt;						
	?>

	<tbody>
     <tr>
     <td><?=$i;?></td>
     <td><img src="../upload/<?=$row['images'];?>" title="Image Title" style="width:auto;height:50px;"/></td>              
     <td><?=$row['brand_name'];?></td>
     <td><?=$row['model'];?></td>
     <td style="text-align:right"><?=$price;?></td>
     <td style="text-align:right"><?=$qty;?></td>              
     <td style="text-align:right"><?=$amt;?></td>
     </tr>
     </tbody>                          
     <?php
     } 
     	$grand_tot=$ship_amt + $tax_amt + $discount_amt +$tot;
     ?>
     <tr><td colspan="6" style="text-align:right"><strong>Sub Total</strong></td><td style="text-align:right"><?=$tot;?></td></tr>
     <tr><td colspan="6" style="text-align:right"><strong>Shipping Amount</strong></td><td style="text-align:right"><?=$ship_amt;?></td></tr>
     <tr><td colspan="6" style="text-align:right"><strong>Tax</strong></td><td style="text-align:right"><?=$tax_amt;?></td></tr>
     <tr><td colspan="6" style="text-align:right"><strong>Coupon Discount</strong></td><td style="text-align:right"><?=$disc_amt;?></td></tr>
     <tr><td colspan="6" style="text-align:right"><strong>Total</strong></td><td style="text-align:right"><?=$grand_tot;?></td></tr>
	<tr>
	<th colspan="6"><strong>Shipping Address:</strong> <?=$ship_addr;?></th>
	<tr>
	<th colspan="6"><strong>Payment Details:</strong> Offline</th>
	<tr>
	<th colspan="6"><strong>Order Status:</strong> <?=$ord_stat;?></th>
	
	</table><div class="gap gap-small"></div>

	</div> 
</div>	
			        
			        
				</div>
				
		    
			</div>
			<div class="clearfix"></div>
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