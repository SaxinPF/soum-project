<?php include("../config2.php");



 $model_id=$_REQUEST['model'];



$type2=$_REQUEST['type2'];



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



						<div class="col-md-12">



							<div class="dash-head clearfix mb20">



								<div class="left">



									<h3 class="mb5 text-light" style="margin-top:0px;">Stock Detail</h3>



								</div>



								<?php include('_right_menu.php');?>



							</div>



						</div>



						



						<!-- style three -->



						<div class="col-md-12 mb30">



						<!-- tab style -->



							<div class="clearfix tabs-fill">



							<div style="width:100%;float:left">



									<div class="ui-radio ui-radio-pink">



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('all',<?=$model_id;?>);">



											<input checked="" name="radioEg" type="radio" <?php if($type2=='') echo "checked";?>>



											<span>All</span>



										</label>



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('admin',<?=$model_id;?>);">



											<input name="radioEg" type="radio" <?php if($type2=='Admin') echo "checked";?>> 



											<span>Admin</span>



										</label>



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('dealer',<?=$model_id;?>);">



											<input name="radioEg" type="radio" <?php if($type2=='Dealer') echo "checked";?>> 



											<span>Dealer</span>



										</label>



										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('customer',<?=$model_id;?>);">



											<input name="radioEg" type="radio" <?php if($type2=='Customer') echo "checked";?>> 



											<span>Customer</span>



										</label>



									</div>



								</div>



									



								<div class="table-responsive" style="width:100%;float:left;background:#fff;padding:15px;">	



								<table class="table table-bordered invoice-table mb30" id="list-1">



									<thead>



										<tr style="background: #38b4ee;color: #fff">



											<th style="padding:5px;">#</th>



											<th style="padding:5px;">Phone Type</th>



											<th style="padding:5px;">Brand</th>



											<th style="padding:5px;">Model</th>



											<th style="padding:5px;">Posted by</th>



											<th style="padding:5px;">Name</th>



											<th style="padding:5px;">Contact</th>



											<th style="padding:5px;">



											Available Quantity</th>



											<th style="padding:5px;">



											Detail</th>



										</tr>



									</thead>







									<tbody>



									<?php



									 



									



                                       $cond="";



									    if($_REQUEST['type']==1)



									    $cond="and soum_product_master.prod_cat_id=1";



									    if($_REQUEST['type']==2)



									    $cond="and soum_product_master.prod_cat_id=2";



									    



									



									if($type2!='')



									{



									$cond1=" and soum_product_master.poster_type='$type2'";



									}











								        $qry="select soum_product_master.prod_id,soum_product_master.prod_cat_id,soum_product_master.post_date,soum_product_master.poster_type,soum_product_master.poster_id,soum_product_master.current_stock,



										soum_product_master.brand,soum_product_master.modal,soum_prod_subcat.prod_subcat_desc brand_name,soum_prod_subsubcat.prod_subcat_desc model_name



										,if(poster_type='Dealer',



												(select fname from soum_master_dealer where cust_id=soum_product_master.poster_id),



												if(poster_type='Customer',(select fname from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) fname,



												



										if(poster_type='Dealer',



												(select mobile from soum_master_dealer where cust_id=soum_product_master.poster_id),



												if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) mobile



										



										,if(poster_type='Dealer',



												(select email from soum_master_dealer where cust_id=soum_product_master.poster_id),



												if(poster_type='Customer',(select email from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) email



										,if(poster_type='Dealer',



												(select city from soum_master_dealer where cust_id=soum_product_master.poster_id),



												if(poster_type='Customer',(select city from soum_master_customer where cust_id=soum_product_master.poster_id),'Admin')) city



										



										from 	soum_product_master, soum_prod_subsubcat,soum_prod_subcat



										where soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id



										and 	soum_product_master.brand=soum_prod_subcat.prod_subcat_id



										 ". $cond ." ". $cond1 ."



										and soum_product_master.modal=$model_id";



										//echo $qry;



										//die();



										$res=$db->query($qry);



										 $pcount=mysqli_num_rows($res);



										$i=0;



										$tot=0;



										$grand_tot=0;



										while($row=$res->fetch_assoc())



										{



											$i++;



																



										?>



										     <tr>



											 <td><?=$i;?></td>



										     <td><?php if($row['prod_cat_id']==1){echo 'New';} else {echo 'Used';}?></td>



										     <td><?=$row['brand_name'];?></td>



										     <td><?=$row['model_name'];?></td>



											 <td><?=$row['poster_type'];?></td>



											 <td><?=$row['fname'];?></td>



											 <td><?=$row['mobile'];?></td>	



											  <td style="text-align:left"><?=$row['current_stock'];?></td>



											  <td style="text-align:left">&nbsp;</td>



										</tr>



									<?php



									}



									



									?>



									</tbody>



								</table>



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



<script src="scripts/jquery.min.js"></script>







<script>



$("document").ready(function(){







//alert('df');



$('#pcount').html("(<?=$pcount;?>)");



$('#prcount').html("(<?=$prcount;?>)");



$('#acount').html("(<?=$acount;?>)");



$('#dcount').html("(<?=$dcount;?>)");











});







function gopage(val,id)



			{



				 if(val=='all')



				 {



				    window.location.href="stock_detail.php?model="+id;



				 }



				 if(val=='admin')



				 {



				    window.location.href="stock_detail.php?model="+id+"&type2=Admin";



				 }



				 if(val=='dealer')



				 {



				    window.location.href="stock_detail.php?model="+id+"&type2=Dealer";



				 }







                  if(val=='customer')



				 {



				    window.location.href="stock_detail.php?model="+id+"&type2=Customer";



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