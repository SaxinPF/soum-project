<?php include("../config2.php");



$type=$_REQUEST['type'];



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



.link {



	padding: 5px 8px;



	border-radius: 2px;



	margin-left: 5px;



	background-color: #787878;



	border-color: #898989;



	color: #fff;



}



.form-control {



	border:1px solid#ddd;



	



}







</style>



	



</head>



<body id="app" class="app off-canvas">



<?php 



$search=$_REQUEST['search'];







if($search!='')



{



$conds="where 1=1 and concat(code,post_date,prod_subcat_desc,model_name,fname,mobile) like '%$search%'";



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



						<!-- style three -->



						<div class="col-md-12">



							<div class="dash-head clearfix mb20">



								<div class="left">



									<h3 class="mb5 text-light" style="margin-top:0px;">Advertisement <?php $type=$_REQUEST['type']; echo $type;?> </h3>



								</div>



								<?php include('_right_menu.php');?>



							</div>



						</div>



						



						<div class="col-md-12 mb30">



						<!-- tab style -->



							<div class="clearfix tabs-fill">



								<div style="width:100%;float:left">



									<div class="ui-radio ui-radio-pink">



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('all');">



											<input checked="" name="radioEg" type="radio" <?php if($type=='') echo "checked";?>>



											<span>All</span>



										</label>



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('admin');">



											<input name="radioEg" type="radio" <?php if($type=='Admin') echo "checked";?>> 



											<span>Admin</span>



										</label>



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('dealer');">



											<input name="radioEg" type="radio" <?php if($type=='Dealer') echo "checked";?>> 



											<span>Dealer</span>



										</label>



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('customer');">



											<input name="radioEg" type="radio" <?php if($type=='Customer') echo "checked";?>> 



											<span>Customer</span>



										</label>



									</div>



								</div>



								



								<table style="width:auto;float:right;">



									<tr><form method="post"><td style="padding-right:5px;"><input name="search" type="text" class="form-control" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>



								</table>



								



								<ul class="nav nav-tabs">



									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">New Adv <span id="acount">&nbsp; ( 0 )</span></a></li>



									<li><a href="#tab-flip-two-1" data-toggle="tab">Approved <span id="dcount">&nbsp; ( 0 )</span></a></li>



								</ul>



								



								<div class="tab-content">



									<div class="tab-pane active" id="tab-flip-one-1">



									<table class="table table-bordered invoice-table mb30" id="list-1">



									<thead>



										<tr style="background:#4a9de4;color: #fff">



											<th style="padding:5px;">#</th>



											<th style="padding:5px;">Token Id</th>



											<th style="padding:5px;">DTTM</th>											



											<th style="padding:5px;">Name</th>



											<th style="padding:5px;">Phone No.</th>



											<th style="padding:5px;">Type</th>



											<th style="padding:5px;">Brand</th>



											<th style="padding:5px;">Phone</th>



											<th style="padding:5px;">Expected Price</th>



											<th style="padding:5px;">See Details</th>



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



									



									  $sql="select * from (



select *,



if(poster_type='Dealer',



		(select fname from soum_master_dealer where cust_id=temp1.poster_id),



		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,



		



	if(poster_type='Dealer',



		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),



		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile







 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(



										select * from (



										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal



										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=0 $cond) prod



										left outer join soum_prod_subcat



										on prod.brand=soum_prod_subcat.prod_subcat_id)temp



										left outer join soum_prod_subsubcat



										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id







) temp1



)tmep2 ".$conds." order by prod_id desc";






										$i=1;



									  $res=$db->query($sql);



									  $acount=mysqli_num_rows($res);



									  



									



									  while($row=$res->fetch_assoc())



									  {



									    $originalDate =$row['post_date'];



										$post_dt= date("d-m-Y h:i A", strtotime($originalDate));



										$time= date("h:i A", strtotime($originalDate));  



										  







									?>



										<tr>



											<td><?=$i++;?></td>



											<td><?=$row['code'];?></td>



											<td><?=$post_dt;?></td>											



											<td><?=$row['fname'];?></td>



											<td><?=$row['mobile'];?></td>



											<td><?=$row['prod_type'];?></td>											



											<td><?=$row['prod_subcat_desc'];?></td>



											<td><?=$row['model_name'];?></td>



											<td><?=$row['offer_price'];?></td>



											<td><a class="link btn-primary" href="phone_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['poster_id'];?>&type=<?=$type;?>">Details</a>



										<?php if($row['prod_type']=='New'){?>



										<a class="link btn-primary" href="../form_new.php?prod_id=<?=$row['prod_id'];?>">EDIT</a>



										<?php } else {?>



										<a class="link btn-primary" href="../form_used.php?prod_id=<?=$row['prod_id'];?>">EDIT</a>



										<?php } ?>



</td>



										</tr>



									<?php



									



									}



									?>



									</tbody>



								</table>







									</div>



									<div class="tab-pane" id="tab-flip-two-1">



<table class="table table-bordered invoice-table mb30" id="list-1">



									<thead>



										<tr style="background: #4a9de4;color: #fff">



											<th style="padding:5px;">#</th>



											<th style="padding:5px;">Token Id</th>



											<th style="padding:5px;">DTTM</th>



											<th style="padding:5px;">Name</th>



											<th style="padding:5px;">Phone No.</th>



											<th style="padding:5px;">Type</th>



											<th style="padding:5px;">Brand</th>



											<th style="padding:5px;">Phone</th>



											<th style="padding:5px;">Expected Price</th>



											<th style="padding:5px;">See Details</th>



										</tr>



									</thead>







									<tbody>



									<?php



									 $sql="select * from (



select *,



if(poster_type='Dealer',



		(select fname from soum_master_dealer where cust_id=temp1.poster_id),



		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,



		



	if(poster_type='Dealer',



		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),



		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile







 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(



										select * from (



										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal



										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=1 $cond) prod



										left outer join soum_prod_subcat



										on prod.brand=soum_prod_subcat.prod_subcat_id)temp



										left outer join soum_prod_subsubcat



										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id







) temp1



)tmep2 ".$conds." order by prod_id desc";



		



										$i=1;



									  $res=$db->query($sql);



									   $dcount=mysqli_num_rows($res);



									  



									



									  while($row=$res->fetch_assoc())



									  {



									        $originalDate =$row['post_date'];



											$post_dt= date("d-m-Y h:i A", strtotime($originalDate));



											$time= date("h:i A", strtotime($originalDate));







									      



										   







									?>



										<tr>



											<td><?=$i++;?></td>



											<td><?=$row['code'];?></td>



											<td><?=$post_dt;?></td>											



											<td><?=$row['fname'];?></td>



											<td><?=$row['mobile'];?></td>



											<td><?=$row['prod_type'];?></td>											



											<td><?=$row['prod_subcat_desc'];?></td>



											<td><?=$row['model_name'];?></td>



											<td><?=$row['offer_price'];?></td>



											<td><a class="link btn-primary" href="phone_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['prod_id'];?>&type=<?=$type;?>">Details</a>



										<?php if($row['prod_type']=='New'){?>



										<a class="link btn-primary" href="../form_new.php?prod_id=<?=$row['prod_id'];?>">EDIT</a>



										<?php } else {?>



										<a class="link btn-primary" href="../form_used.php?prod_id=<?=$row['prod_id'];?>">EDIT</a>



										<?php } ?>



</td>



										</tr>



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



						<div class="left small">Nav Horizontal</div>



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



						<div class="left small">Nav Full</div>



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



<script src="scripts/jquery.min.js"></script>







<script>



$("document").ready(function(){











$('#acount').html("(<?=$acount;?>)");



$('#dcount').html("(<?=$dcount;?>)");











});







function gopage(val)



			{



				 if(val=='all')



				 {



				    window.location.href="approv_dis.php";



				 }



				 if(val=='admin')



				 {



				    window.location.href="approv_dis.php?type=Admin";



				 }



				 if(val=='dealer')



				 {



				    window.location.href="approv_dis.php?type=Dealer";



				 }







                  if(val=='customer')



				 {



				    window.location.href="approv_dis.php?type=Customer";



				 }







			}



		



</script>



	







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