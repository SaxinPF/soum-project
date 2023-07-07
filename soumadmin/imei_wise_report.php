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
	border: 1px solid #000000;
	text-align: left;
}
.auto-style2 {
	border: 1px solid #000000;
	background-color: #C0C0C0;
}
.auto-style3 {
	border: 1px solid #000000;
	background-color: #C0C0C0;
	text-align: center;
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
					<div class="row" style="margin-top:30px;">
						<!-- dashboard header -->
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">PHONE IMEI WISE REPORT</h4>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> 
					<!-- #end row -->
					<!-- mini boxes -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20 table-responsive" style="min-height:400px;position:relative;">
								<table style="width: 100%">
									<tr>
										<td class="auto-style3" style="width: 5%">
										&nbsp;</td>
										<td class="auto-style3" colspan="2">
										<strong>Phone Details</strong></td>
										<td class="auto-style3" colspan="3">
										<strong>Seller Details</strong></td>
										<td class="auto-style3" colspan="3">
										<strong>Buyer Details</strong></td>
									</tr>
									
									<tr>
										<td class="auto-style2" style="width: 5%">
										<strong>#</strong></td>
										<td class="auto-style2"><strong>ProdId/IMEI</strong></td>
										<td class="auto-style2"><strong>Phone</strong></td>
										<td class="auto-style2"><strong>Purchase Date</strong></td>
										<td class="auto-style2"><strong>Purchase_Type &amp; 
										From</strong></td>
										<td class="auto-style2"><strong>Contact</strong></td>
										<td class="auto-style2"><strong>Sale Date</strong></td>
										<td class="auto-style2"><strong>Sold To</strong></td>
										<td class="auto-style2"><strong>Contact</strong></td>
									</tr>
									
<?php 
						$imei=$_REQUEST['imei'];
						$i=1;
						$sql="select *, 
concat(if(isnull(post_date),'',post_date),if(isnull(poster_type),'',poster_type),if(isnull(poster_id),'',poster_id),if(isnull(imei_no),'',imei_no),if(isnull(brand),'',brand),if(isnull(modal),'',modal),if(isnull(brend1),'',brend1),if(isnull(model),'',model),if(isnull(aname),'',aname),if(isnull(amobile),'',amobile),if(isnull(aemail),'',aemail),if(isnull(cname),'',cname),if(isnull(cemail),'',cemail),if(isnull(cmobile),'',cmobile),if(isnull(dname),'',dname),if(isnull(demail),'',demail),if(isnull(dmobile),'',dmobile),if(isnull(order_id),'',order_id),if(isnull(order_date),'',order_date),if(isnull(cust_id),'',cust_id),if(isnull(status),'',status),if(isnull(fname),'',fname),if(isnull(email),'',email),if(isnull(mobile),'',mobile)) tt
 from (
select temp3.*,soum_master_customer.fname,soum_master_customer.email,soum_master_customer.mobile from (
select temp2.*,soum_order_master.order_date,soum_order_master.cust_id,soum_order_master.status from (
select temp1.*,soum_order_details.order_id from (
select q.* ,
   a.fname aname,a.mobile amobile,a.email aemail,
	b.fname cname,b.email cemail,b.mobile cmobile,
   c.fname dname,c.email demail,c.mobile dmobile

from (
SELECT
	soum_product_master.prod_id,soum_product_master.post_date,soum_product_master.poster_type, soum_product_master.poster_id,soum_product_master.imei_no,soum_product_master.brand,soum_product_master.modal,soum_product_master.seller_name,soum_product_master.seller_phone
	,soum_prod_subcat.prod_subcat_desc brend1,soum_prod_subsubcat.prod_subcat_desc model	
	
	 FROM
      soum_product_master,soum_prod_subcat,soum_prod_subsubcat
      where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
      and   soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ) q
      
      LEFT JOIN soum_master_admin a 
              ON (q.poster_id = a.usr_id  AND q.poster_type = 'Admin')
      LEFT JOIN soum_master_customer b 
              ON (q.poster_id = b.cust_id  AND q.poster_type = 'Customer')
      LEFT JOIN soum_master_dealer c 
              ON (q.poster_id = c.cust_id  AND q.poster_type = 'Dealer')) temp1  
 
 left outer join soum_order_details
 on temp1.prod_id=soum_order_details.prod_id ) temp2
 left outer join soum_order_master
 on temp2.order_id=soum_order_master.order_id )temp3
 left outer join soum_master_customer
 on temp3.cust_id=soum_master_customer.cust_id ) temp4
having tt like '%$imei%'";
						$res=$db->query($sql);
						while($row=$res->fetch_assoc())
						{
						 
						 if($row['status']=='3' || $row['status']=='')
						 {
						 
						$originalDate =$row['post_date'];
						$sdate = date("d-m-Y H:i:s", strtotime($originalDate));
						$originalDate1 =$row['order_date'];
						if($originalDate1!='')
						{
						$bdate = date("d-m-Y H:i:s", strtotime($originalDate1));
						}
						else
						{
						$bdate='';
						}
						
						//if($row['poster_type']=='Admin'){ $name=$row['aname'];  $contact=$row['amobile']; }
						if($row['poster_type']=='Admin'){ $name=$row['seller_name'];  $contact=$row['seller_phone']; }
						if($row['poster_type']=='Customer'){ $name=$row['cname']; $contact=$row['cmobile'];}
						if($row['poster_type']=='Dealer') { $name=$row['dname']; $contact=$row['dmobile'];} 						

?>
                     <tr>
										<td class="auto-style1" style="width: 5%" valign="top"><?=$i++;?></td>
										<td class="auto-style1" valign="top"><?=$row['prod_id']." / ".$row['imei_no'];?></td>
										<td class="auto-style1" valign="top"><a href="phone_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['poster_id'];?>&type="><?=$row['brend1']." ".$row['model'];?></a></td>
										<td class="auto-style1" valign="top"><?=$sdate;?></td>
										<td class="auto-style1" valign="top"><?=$name;?></a></td>
										<td class="auto-style1" valign="top"><?=$contact;?></td>
										<td class="auto-style1" valign="top"><?=$bdate;?></td>
										<td class="auto-style1" valign="top"><a href="order_details.php?order_id=<?=$row['order_id'];?>&pid=<?=$row['prod_id'];?>"><?=$row['fname'];?></td>
										<td class="auto-style1" valign="top"><?=$row['mobile'];?></td>
									</tr>
								
						            
							<?php } } ?>
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