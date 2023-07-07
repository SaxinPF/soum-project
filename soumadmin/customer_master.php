﻿﻿﻿﻿﻿﻿﻿﻿﻿<?php include('../config2.php');
//ini_set('display_errors',1);
//error_reporting(E_ALL);

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
	<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
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
	.link {
    padding: 5px 8px;
    border-radius: 2px;
    margin-left: 5px;
    background-color: #787878;
    border-color: #898989;
    color: #fff;
}
	.table-2 td{
	padding:5px;
	border:1px solid#ddd;
	}
	.auto-style1 {
	text-align: right;
}
.auto-style2 {
	background-color: #E6E6E6;
}
.auto-style3 {
	text-align: right;
	background-color: #E6E6E6;
}
	.select-wrapper {
    background:url('../images/plus-icon.png') no-repeat;
    background-size: 31px 30px;
    background-position: center center;
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    border: 1px dashed#ddd;
    position: relative;
}
#fileToUpload1 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload2 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}


	</style>
	<script src="scripts/jquery.min.js"></script>
<script>
function validateForm() {
     var active2=$("#active2").is(':checked');
     var prod_name= $('#prod_name1').val();
	var amt= $('#amt1').val();


	if(active2==true)
	{

		if (prod_name=="")
		 {
		    alert("Pl select product name must be filled out");
		    return false;
		}
		if (amt=="")
		{
		    alert("Pl amount must be filled out");
		    return false;
		}


	}


	if( document.myForm.mobile.value == "" ||
		isNaN( document.myForm.mobile.value) ||
		document.myForm.mobile.value.length != 10 )
		{
		alert( "Please enter valid mobile no" );
		document.myForm.mobile.focus() ;
		return false;
		}

    var x = document.forms["myForm"]["name1"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }



   /* var x = document.forms["myForm"]["address"].value;
    if (x == "") {
        alert("Address must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["city"].value;
    if (x == "") {
        alert("Pl city must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["pincod"].value;
    if (x == "") {
        alert("Pl pincod must be filled out");
        return false;
    }*/







}
function profile(mob)
{

 	$.getJSON('user_info.php?callback=?','mobile='+mob, function(data){
 	//alert(data);
	 if(data!='')
	 {
	    var param='';
		 $.each(data,function(i,element){

		  param+='?customer='+element.cust_id+'&act=edit';
		 });

		 window.location.href="customer_master.php"+param;
	 }
	 else
	 {
	   //window.location.href="customer_master.php?act=add";
	 }
  });
}
</script>
<script>
var monthNames=[ "January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December" ];
$(function() {
$("#dob").change(function() {
   var dt=$("#dob").val(); // To remove the previous error message
   var d=dt.substr(0,2);
   var m=dt.substr(3,2);
       m=(m*1)-1;
   var m1=monthNames[m];
   var y=dt.substr(6,4);
   //alert(m+"/"+y);
    $("#dob").val(d+" "+m1);
});
$("#doa").change(function() {
   var dt=$("#doa").val(); // To remove the previous error message
   var d=dt.substr(0,2);
    var m=dt.substr(3,2);
       m=(m*1)-1;
   var m1=monthNames[m];
   var y=dt.substr(6,4);
   //alert(m+"/"+y);
    $("#doa").val(d+""+m1);
});
});
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
						<div class="col-md-12" style="margin-top:20px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">Customer Master</h4>
								</div>
                                    <div>
                                <!--<a href="customer_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:6px 100px;float:right;">Add new</button></a>-->
        						</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php
					$act ='';
					if(isset($_REQUEST['act'])){
					 $act=$_REQUEST['act'];
					}
					if(isset($_REQUEST['customer']))
					{
					/*$poster_id=$_REQUEST['customer'];
					$sql="select * from soum_master_customer where cust_id=$poster_id";
					$res=$db->query($sql);*/

					/** BOF Security Patch IS-002*/
					$poster_id=mysqli_real_escape_string($db,$_REQUEST['customer']);
					$custM=$db->prepare('select * from soum_master_customer where cust_id=?');
					$custM->bind_param('i', $poster_id);
					$custM->execute();
					$res=$custM->get_result();
					/** EOF Security Patch IS-002*/

					 //$sql="select * from soum_offer where offer_id=$offerid";
					 //$sql="select * from soum_master_customer where cust_id=$poster_id";


					 while($row=$res->fetch_assoc())
					 {
						$name_edit=$row['fname'];
						$email_edit=$row['email'];
						$profession = $row['profession'];
						$address=$row['address'];
						$city=$row['city'];
						$mobile=$row['mobile'];
						$pincod=$row['pincod'];
						$pwd=$row['user_pass'];
						$review=$row['user_review'];
						$image=$row['image'];
						$image2=$row['identity'];

						$ohc=$row['our_happy_client'];
						//2017-04-17 => 25/11/1922
						$d1=substr($row['dob'],8,2);
						$m1=substr($row['dob'],5,2);

						$d2=substr($row['doa'],8,2);
						$m2=substr($row['doa'],5,2);
                     }
					}
					?>


					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>
					<div class="row" id="form_offer">
						<!-- dashboard header -->


						<div class="col-md-12">
							<div style="width:100%;background-color:#fff;">

							<?php if($act=='edit'){ ?>

					  		<div class="col-md-12 mb30">
							<h3> <?php echo $name_edit; ?> (<?php echo $mobile; ?>) Entry</h3>
						     <!-- tab style -->
									<div class="clearfix tabs-fill">

											<ul class="nav nav-tabs">
											    <li class="active"><a href="#tab-flip-detail" data-toggle="tab">Detail</a></li>
												<li><a href="#tab-flip-one-1" data-toggle="tab">Purchase On-Line </a></li>
												<li><a href="#tab-flip-two-1-offline" data-toggle="tab">Purchase Off-Line </a></li>
												<li><a href="#tab-flip-two-1" data-toggle="tab">Sell </a></li>
												<li><a href="#tab-flip-sms-log" data-toggle="tab">Message Log </a></li>
												<li><a href="#tab-flip-feedback" data-toggle="tab">Feedback</a></li>
												
											</ul>
											<div class="tab-content">
												<div class="tab-pane table-responsive" id="tab-flip-one-1">

								                   <table class="table-2" style="width:100%;">
									<tr>
										<td class="auto-style2"><strong>SKU</strong></td>
										<td class="auto-style2"><strong>Date</strong></td>
										<td class="auto-style2"><strong>Brand & Model</strong></td>
										<td class="auto-style3"><strong>C.P(Rs)</strong></td>
										<td class="auto-style3"><strong>S.P(Rs)</strong></td>
										<td class="auto-style2"><strong>IMEI</strong></td>
										<td class="auto-style2"><strong>ROM</strong></td>
										<td class="auto-style2"><strong>RAM</strong></td>
										<td class="auto-style2"><strong>Satisfied</strong></td>


									</tr>
									<?php
									 $sqld="select
											soum_order_master.order_date,soum_order_master.order_type,
											if (soum_order_details.prod_id=0, soum_order_details.prod_name, soum_prod_subsubcat.prod_subcat_desc) prod_name,
											if (soum_order_details.prod_id=0, soum_order_details.prod_name, soum_prod_subcat.prod_subcat_desc) brand_name,
											if (soum_order_details.prod_id=0, 'Walk',soum_order_master.`status`) status,
											if(isnull(soum_order_master.exc_prod) || soum_order_master.exc_prod='', 'Pr', 'Ex') ex,
											soum_order_master.order_id,
											soum_product_master.prod_id,
											soum_product_master.code,
											soum_product_master.imei_no,
											soum_product_master.rom,
											soum_product_master.ram2,
											soum_product_master.poster_id,
											soum_order_details.price,
											soum_order_details.sell_price,
											soum_order_details.ord_det_id
											from soum_order_master,soum_order_details, soum_product_master,soum_prod_subcat,soum_prod_subsubcat

											where soum_order_master.order_id=soum_order_details.order_id
											and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
											and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
											and soum_product_master.prod_id=soum_order_details.prod_id
											 and cust_id=$poster_id order by order_id desc
										/*and (isnull(soum_order_master.exc_prod) || soum_order_master.exc_prod='')*/";

									/** BOF Security Patch IS-002*/
									//$custList=$db->prepare($sqld);
									//$custList->bind_param('i', $poster_id);
									//$custList->execute();
									//$resd=$custList->get_result();
									/** EOF Security Patch IS-002*/

									$resd=$db->query($sqld);
									$resd345=$db->query($sqld);
									 $i=1;
									while($rowd=$resd->fetch_assoc()){
									        $dob_by_chris=$rowd['order_date'];
 										    $b_y=substr($dob_by_chris,2,2);
											$b_m=substr($dob_by_chris,5,2);
											$b_d=substr($dob_by_chris,8,2);
											$t=substr($dob_by_chris,11,8);
											$dt=$b_d."-".$b_m."-".$b_y;
											$status=$rowd['status'];
                                           if($status=='3'){
									?>

									<tr>
										<!--<td><?=$i++;?></td>-->
										<td><?php echo $rowd['code']; ?></td>
										<td><?=$dt;?></td>
										<td><a href="phone_detail.php?prod_id=<?php echo $rowd['prod_id']; ?>&poster_id=<?php echo $rowd['poster_id']; ?>&type=Customer"><?php echo $rowd['brand_name'].' '.$rowd['prod_name']; ?></a></td>
										<td class="auto-style1"><?=$rowd['price']?></td>
										<td class="auto-style1">
										<?php
										  $sell_price = $rowd['sell_price'];
										if(empty($rowd['sell_price'])){
										  $sell_price = $rowd['price'];
										} ?>
										  <input style="width:100px;" id="SellPrice" value="<?=$sell_price?>" />
										  <button type="button" id="SellPriceFun" onclick="SellPriceFun(<?=$rowd['ord_det_id']?>)">Update</button>
										</td>
								        <td><?php echo $rowd['imei_no']; ?></td>
								        <td><?php echo $rowd['rom']; ?></td>
								        <td><?php echo $rowd['ram2']; ?></td>
										 <td>

										<?php
											$token_code =   $rowd['code'];
											 $sqldd="select * from customer_msg
											 where cust_id =$poster_id and token='$token_code' and type='feedback' order by id desc LIMIT 1";

																		$resddd = $db->query($sqldd);
																		$set ='--';
																		while($satisfiedd=$resddd->fetch_assoc()){
																			if($satisfiedd['satisfied']=='satisfied'){
																			  $set ='YES';
																			}else{
																			  $set ='NO';
																			}
																		}
																	 echo $set;
										 ?>
								        </td>
									</tr>
									<?php } } ?>
								</table>
												</div>
								<div class="tab-pane table-responsive" id="tab-flip-two-1-offline">

								     <table class="table-2" style="width:100%;">

										<tr style="background: #EFEFEF;color: #000;font-size:14px;">
											<th style="padding:2px;">SNo.</th>
											<th style="padding:2px;">Order No</th>
											<th style="padding:2px;">Name</th>
											<th style="padding:2px;">Phone No.</th>
											<th style="padding:2px;">Brand Model</th>
											<th style="padding:2px;text-align:right;">Cost</th>
											<th style="padding:2px;text-align:right;">Date</th>

										</tr>


									<?php
                                      $cof ='';
								      $sqloffline="select SQL_CALC_FOUND_ROWS* from
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=6
										and soum_buyer_requirement.cust_id=$poster_id
										 ) temp ".$cof." ORDER BY temp.req_id desc";
									  $res=$db->query($sqloffline);

     								  $i=1;
									  while($row=$res->fetch_assoc())
									  {

									    $name=$row['req_name'];
									    $mob=$row['req_mob'];
									    $email=$row['req_email'];
									 	$brand=$row['brand'];
									    $model=$row['model'];
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}

										$price=$row['price_field'];
									    $buyer_date=$row['buyer_date'];

										   $originalDate =$row['req_dttm'];
											$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

									?>
										<tr style="font-size:13px;">
											<td style="width: 19px"><?=$i++;?></td>
											<td><?=$row['req_token'];?></td>
											<td><?=$name;?></td>
											<td><?=$mob;?></td>
											<td><?=$brand1." ".$model1;?></td>
											<td style="text-align:right"><?=$price;?></td>
											<td style="text-align:right"><?=$buyer_date;?></td>

										</tr>
									<?php
									}
									?>


								</table>
							</div>

								<div class="tab-pane table-responsive" id="tab-flip-two-1">
									<table class="table-2" style="width:100%;">
									<tr>
										<td>#</td>
										<td>Date</td>
										<td>Product</td>
										<td>Price</td>
										<td>Detail</td>
									</tr>
									<?php
									 $sqld="select prod_id,post_date,prod_cat_id,brand,modal,offer_price,soum_prod_subcat.prod_subcat_desc brand_name,
										soum_prod_subsubcat.prod_subcat_desc model_name from soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and poster_type='Customer' and poster_id=?";

									/** BOF Security Patch IS-002*/
									$custList=$db->prepare($sqld);
									$custList->bind_param('i', $poster_id);
									$custList->execute();
									$resd=$custList->get_result();
									/** EOF Security Patch IS-002*/
									//$resd=$db->query($sqld);
									$i=1;
									  while($rowd=$resd->fetch_assoc())
									  {
									        $dob_by_chris=$rowd['post_date'];
 										    $b_y=substr($dob_by_chris,0,4);
											$b_m=substr($dob_by_chris,5,2);
											$b_d=substr($dob_by_chris,8,2);
											$t=substr($dob_by_chris,11,8);
											$dt=$b_d."-".$b_m."-".$b_y;

									?>
									<tr>
										<td style="vertical-align:top;"><?=$i++;?></td>
										<td style="vertical-align:top;"><?=$dt;?></td>
										<td style="vertical-align:top;"><?=$rowd['brand_name']." / ".$rowd['model_name']; ?></td>
										<td style="vertical-align:top;"><?=$rowd['offer_price']?></td>
										<td style="vertical-align:top;"><a href="phone_detail.php?prod_id=<?=$rowd['prod_id']?>">Details</a></td>
									</tr>
									<?php } ?>
								</table>												</div>


							<div class="tab-pane table-responsive" id="tab-flip-sms-log">
								  <table class="table-2" style="width:100%;">
									<tr>
										<td>#</td>
										<td>Date</td>
										<td>Message</td>
									</tr>
									<?php
									 $sqld="select * from customer_msg
										where cust_id =	$poster_id order by id desc";

									   $resd = $db->query($sqld);
									  $i=1;
									  while($rowd=$resd->fetch_assoc())
									  {


									?>
									<tr>
										<td style="vertical-align:top;"><?=$i++;?></td>
										<td style="vertical-align:top;"><?=$rowd['date'];?></td>
										<td style="vertical-align:top;"><?=$rowd['msg']; ?></td>
									</tr>
									<?php } ?>
								</table>
							</div>

							<div class="tab-pane table-responsive" id="tab-flip-feedback">
							        <div class="col-md-6" style="margin-top:10px;">
										<label>Select SKU</label>
										<select id="tokense">
										  <option value="">Select SKU</option>
										   <?php while($rowd345=$resd345->fetch_assoc()){ ?>
										  <option value="<?php echo $rowd345['code'] ?>"><?php echo $rowd345['code'] ?></option>
										  <?php } ?>
										</select>
									</div>
							        <div class="col-md-6" style="margin-top:10px;">
										<label>Feedback Type</label>
										<select id="satisfied" onchange="satisfied(this.value)">
										  <option value="satisfied">Satisfied</option>
										  <option value="unsatisfied">Unsatisfied</option>
										</select>
									</div>
								 	<div class="col-md-12" id='feddiv' style="margin-top:10px;display:none;">
										<label>Feedback Message</label>
										<textarea class="form-control" rows="4" name="feedback" id="feedback" ></textarea>
									</div>
									<div class="col-md-12" style="margin-top:10px;">
									<button  class="btn btn-info" onclick="feedbackfun(<?php echo $poster_id; ?>)" >Send</button>
									<div id="feedbackloder" ></div>
									</div>
							</div>
							<div class="tab-pane active table-responsive" id="tab-flip-detail">


							 <form method="post" action="customer_master_act.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">

										<input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
										<input name="act" type="hidden" value="<?=$act?>"/>
									<div class="col-md-3">
										<label>Mobile No <span class="require">*</span></label>
										<input value="<?=$mobile;?>" class="form-control" placeholder="Mobile No" name="mobile" id="mobile" onchange="profile(this.value)" type="text">
									</div>
									<div class="col-md-3">
										<label>Name <span class="require">*</span></label>
										<input value="<?=$name_edit;?>" class="form-control" placeholder="Name" name="name1" id="name1" type="text">
									</div>


									<div class="col-md-3">
										<p style="margin-bottom:0px;"><label class="labelTop">Birthday:<span class="require">*</span></label></p>
										<span>Date</span>
										<span><select name="ddob">
											<option value="">Day</option>
											<?php
											 for($i=1;$i<=31;$i++)
											 {
											?>
											<option value="<?=str_pad($i,2,'0', STR_PAD_LEFT);?>" <?php if($d1==$i) echo "Selected";?> ><?=str_pad($i,2,'0', STR_PAD_LEFT);?></option>
											<?php } ?>
										</select>
										</span>
										<span>Month</span>
										<span>
										<select name="mdob">
											<option value="">Month</option>
											<?php
											 for($i=1;$i<=12;$i++)
											 {
											?>
											<option value="<?=str_pad($i,2,'0', STR_PAD_LEFT);?>" <?php if($m1==$i) echo "Selected";?> ><?=str_pad($i,2,'0', STR_PAD_LEFT);?></option>
											<?php } ?>
										</select>
										</span>
									</div>
									<div class="col-md-3">
										<p style="margin-bottom:0px;"><label class="labelTop">Anniversary:</label></p>
										<span>Date</span>
										<span>
										<select name="ddoa">
											<option value="">Day</option>
											<?php
											 for($i=1;$i<=31;$i++)
											 {
											?>
											<option value="<?=str_pad($i,2,'0', STR_PAD_LEFT);?>" <?php if($d2==$i) echo "Selected";?> ><?=str_pad($i,2,'0', STR_PAD_LEFT);?></option>
											<?php } ?>
										</select>
										</span>
										<span>Month</span>
										<span>
										<select name="mdoa">
											<option value="">Month</option>
											<?php
											 for($i=1;$i<=12;$i++)
											 {
											?>
											<option value="<?=str_pad($i,2,'0', STR_PAD_LEFT);?>" <?php if($m2==$i) echo "Selected";?> ><?=str_pad($i,2,'0', STR_PAD_LEFT);?></option>
											<?php } ?>
										</select>
										</span>
									</div>
									<div class="col-md-12" style="margin-top:10px;display:none;">
										<label>Address *</label>
										<textarea class="form-control" rows="3" placeholder="Address" name="address" id="address"><?=$address;?></textarea>
									</div>
									<div class="col-md-6" style="margin-top:10px;display:none;">
										<label>City <span class="require">*</span></label>
										<input value="<?=$city;?>" class="form-control" placeholder="City" name="city" id="city" type="text">
									</div>
									<div class="col-md-6" style="margin-top:10px;display:none;">
										<label class="labelTop">Pincode<span class="require">*</span></label>
										<input value="<?=$pincod;?>" class="form-control" placeholder="Pincod" name="pincod" id="pincod" type="text">
									</div>

						<!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image;?></textarea>
				 	<textarea id="debugConsole2" name="S2" rows="3" style="width:30%; display:1none"><?=$image2;?></textarea>
                    <canvas id="myCanvas"  width="auto" style="border:1px solid #d3d3d3;display:1none">YourbrowserdoesnotsupporttheHTML5canvastag.</canvas>
                    <script>
                    function abc1(popid)
                    {

					    var canvas = document.getElementById('myCanvas');
					    var context = canvas.getContext('2d');

					    context.closePath();
					    context.lineWidth = 5;
					    context.fillStyle = '#8ED6FF';
					    context.fill();
					    context.strokeStyle = 'blue';
					    context.stroke();
					    var dataURL = canvas.toDataURL("image/jpeg",1);
					    saveImage(dataURL, popid);
					   }
					</script>
                    </div>
                    <!---------------------canvas upload image end -->
					 <div class="col-md-12" style="padding:0px;">
			                         <div class="col-md-3">
										<label>Email Id <span class="require">*</span></label>
										<input value="<?=$email_edit;?>" class="form-control" placeholder="Email" name="email" id="email" type="text">
									 </div>
									 <div class="col-md-3">
										<label>Profession <span class="require"></span></label>
										<input value="<?=$profession;?>" class="form-control" placeholder="Profession" name="profession" id="profession" type="text">
									 </div>
					</div>
						 <div class="col-md-12" style="padding:0px;">
									<div class="col-md-2" style="margin-top:10px;">
										<label>Profile Image</label>
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing1" src="../upload/profile/<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;left:30px;">
										<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"/></span>
										</div>
										<input type="hidden" id="file1" value="<?=$image?>">

									</div>
									<div class="col-md-2" style="margin-top:10px;">
										<label>Identity Image</label>
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing2" src="../upload/profile/<?=$image2?>" style="height:80px;width:auto;position:absolute;top:0;left:30px;">
										<span class="select-wrapper"><input type="file" name="fileToUpload2"  id="fileToUpload2" onchange="abc(this,2);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"/></span>
										</div>
										<input type="hidden" id="file2" value="<?=$image2?>">
									</div>


									<div class="col-md-2" style="margin-top:10px;">
									<label> <input name="ohc" type="checkbox" <?php if($ohc=='on') echo "Checked";?>>
									Our Happy Client</label>
									</div>
									<div class="col-md-6" style="margin-top:10px;">
										<label>Users Review *</br> <p style="font-size:10px">Maximum
										250 character</p></label>
										<textarea class="form-control" placeholder="User Review" rows="4" name="review" id="review" ><?=$review;?></textarea>
									</div>

								</div>




									<div class="col-md-12" style="display:none;background:#fff;margin-bottom:15px;margin-top:15px;">
										<div class="panel-group" id="accordionDemo">
											<div class="panel panel-default" style="background:#ddd">
												<div class="panel-heading" style="background:#ddd">
													<h4 class="panel-title">
														<a href="#collapseTwoS" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo" onclick="chkbox()"><strong>Walk-In Customer</strong> <span style="font-size:18px;float:right;"><strong>+</strong></span></a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseTwoS">
													<div class="panel-body" style="background:#fff">


														<div class="col-md-6">
															<div class="ui-checkbox ui-checkbox-primary" style="margin-top:10px;">
																<label>
																	<input id="active2" name="active2" type="checkbox">
																	<span>Walk-In Customer</span>
																	</label>
																	<label>
																	<input id="nosms" name="nosms" type="checkbox">
																	<span>No SMS & Email</span>
																	</label>
																	</div>


														</div>

															<div class="col-md-12">
																<div class="col-md-6">
																	<label>Iteam Sold</label>
																	<input type='text' name='prod_name' id='prod_name1' class='form-control' placeholder='Enter Product Name'>
																	<label>Amount</label>
																	<input  class="form-control" placeholder="Amount" name="amt" id="amt1" type="text">

																	<div class="ui-checkbox ui-checkbox-primary" style="margin-top:10px;">
																		<label>
																		<input name="isnew" type="checkbox">
																		<span>Is new item?</span>
																		</label>
																	</div>
																</div>
																<div class="col-md-6">
																	<label>Exchange Item</label>
																	<input type="text" name="exc_name" placeholder="Exchange Item" class="form-control">
																	<label>Exchange Item Amount</label>
																	<input type="text" name="exc_amt" placeholder="Exchange Item Amount" class="form-control">
																</div>
															</div>

															<div class="col-md-12" style="padding:0px;">
																<div id="external-cart"></div>
															</div>

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12" style="text-align:center;margin-top:10px;">
									 <?php if($act=='add'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Save</button>
									 <?php }
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Save</button>
									  <a href="customer_master_act.php?poster_id=<?=$poster_id?>&act=del" class="btn btn-primary mr5 waves-effect">Delete</a>

									 <?php } ?>
									</div>

									<p>&nbsp;</p>

							</div>

						</div>
						</form>

								     <div class="col-md-4">
                                        <a href="bill_of_supply.php?act=add" class="btn btn-primary mr5 waves-effect" >Make a bill </a>
                                     </div>

									<div class="col-md-8" style="margin-top:10px;">
										<label>Shoot a Message</label>
										<textarea class="form-control" rows="4" name="shoot" id="shoot" >Thanks for being a valuable customer. We go beyond limits to serve you. It would be nice to hear from you. Please click the link below and share your feedback. http://bit.ly/2GQxFZw</textarea>
									    <p>&nbsp;</p>
										<button  class="btn btn-info" onclick="shootfun(<?php echo $poster_id; ?>)" >Shoot</button>
									    <div id="shootloder" ></div>

									</div>

									 <p>&nbsp;</p>


							</div>




											</div>
										</div>
										<!-- tab style -->
							</div>
								<?php } ?>
							</div>
						</div>
<!-- add conditions-->

					</div>
					<?php } ?>
					 <div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">

												<?php
						 $cond="";
						 $condsoffline = "";
						 if($_REQUEST['search']!='')
						 {
						   $search=$_REQUEST['search'];

                           //$cond=" and  concat(reg_id,fname,email,address,city,pincod,mobile) like '%$search%'";
                           $cond=" and  concat(soum_master_customer.fname,soum_master_customer.mobile) like '%$search%'";
						  $condsoffline=" where concat(req_mob,req_name) like '%$search%'";

						 }
						 $from_dt ='';
						 $to_dt   ='';
						 if($_REQUEST['tdt']!='' && $_REQUEST['fdt']!=''){
						 	$from_dt =   $_REQUEST['fdt'];
							$to_dt   =   $_REQUEST['tdt'];
						    $from_dt1	=substr($from_dt,6,4)."/".substr($from_dt,3,2)."/".substr($from_dt,0,2);
						    $to_dt1		=substr($to_dt,6,4)."/".substr($to_dt,3,2)."/".substr($to_dt,0,2);
						    $cond .=" and date(soum_order_master.order_date)>='$from_dt1' and date(soum_order_master.order_date)<='$to_dt1'";

							$from_dt	=substr($from_dt,0,2)."/".substr($from_dt,3,2)."/".substr($from_dt,6,4);
		                    $to_dt		=substr($to_dt,0,2)."/".substr($to_dt,3,2)."/".substr($to_dt,6,4);
						}
						?>	                <div class="col-md-12">
												<form method="get">

													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label small">From</label>
															<div class="input-group date" id="datepickerDemo">
																<input name="fdt" class="form-control" type="text" value="<?=$from_dt;?>"/>
																<span class="input-group-addon">
																	<i class=" ion ion-calendar"></i>
																</span>
															</div>
														</div>
													</div>


														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label small">To</label>
																<div class="input-group date" id="datepickerDemo1">
																	<input name="tdt" class="form-control" type="text" value="<?=$to_dt;?>"/>
																	<span class="input-group-addon">
																		<i class=" ion ion-calendar"></i>
																	</span>
																</div>
															</div>
														</div>

													 <div class="col-md-3">
													   <div class="form-group">
													     <label class="control-label small">Search</label>
													     <input name="search" value="<?=$_REQUEST['search'];?>" type="text" class="form-control">
													   </div>
													 </div>
													  <div class="col-md-3">
                                                           <br>
														   <button name="Submit1" type="submit" value="Search" class="btn btn-primary mr5 waves-effect">Search</button>
													  </div>

												</form>
											 </div>

							<!-- tab -->
						<div class="clearfix tabs-fill">

											<ul class="nav nav-tabs" style="margin-bottom: -4px;">
												<li class="active"><a href="#tab-flip-dispatched" data-toggle="tab">On-line </a></li>
												<li style="display:none;" ><a href="#tab-flip-three-1" data-toggle="tab">All </a></li>
												<li style="display:none;" ><a href="#tab-flip-four-1" data-toggle="tab">Testimonial </a></li>
												<li ><a href="#tab-flip-tab0-5" data-toggle="tab">Off-line  </a></li>
											</ul>
											<div class="tab-content" style="width: 100%;float: left;">

								<div class="tab-pane active table-responsive" id="tab-flip-dispatched">
									<div class="col-md-12" style="padding:0px;">
											<table class="table table-bordered invoice-table mb30" id="list-1">
																<thead>
																	<tr style="background: #38b4ee;color: #fff">
																		<th style="padding: 5px;">SNo. </th>
																		<th style="padding: 5px;">Date</th>
																		<th style="padding: 5px;">Name</th>
																		<th style="padding: 5px;">Phone No.</th>
																		<th style="padding: 5px;">Satisfied</th>

																		<th style="padding: 5px;width:140px;">Action</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																$num_rec_per_page=25;
																if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
																$i=1+$start_from = ($page-1) * $num_rec_per_page;

																$sql1="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,soum_master_customer.fname fname,soum_master_customer.mobile mobile, concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
																			soum_order_master, soum_order_details,
																			soum_product_master,soum_prod_subcat,soum_prod_subsubcat,soum_master_customer
																			where soum_order_master.order_id= soum_order_details.order_id
																			and soum_order_details.prod_id=soum_product_master.prod_id
																			and soum_order_master.cust_id=soum_master_customer.cust_id
																			and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
																			and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
																			and soum_order_master.archive=0
																			and soum_order_master.status=3 ".$cond."
																			ORDER BY soum_order_master.order_date desc LIMIT $start_from, $num_rec_per_page";
																//echo $sql1;

																$res=$db->query($sql1);
																//$i=1;
																while($row1=$res->fetch_assoc())
																  {
																		 $originalDate =$row1['order_date'];
											                             $dtt= date("d-m-Y h:i A", strtotime($originalDate));
																		  $colorr = '';
																		  $text_color = '';
																	      if(empty($row1['profession']) || empty($row1['email']) || empty($row1['dob']) || empty($row1['doa'])){
																	          $colorr = 'color:red;';
																		      $text_color = '(Incomplete Details)';
																	      }

																?>
																	<tr>
																		<td style="padding: 5px;"><?=$i++;?></td>
																		<td style="padding: 5px;"><?=$dtt;?></td>
																		<td style="padding: 5px;<?php echo $colorr; ?>"><?=$row1['fname']?>  <?php echo $text_color; ?></td>
																		<td style="padding: 5px;"><?=$row1['mobile'];?></td>
																		<td style="padding: 5px;"><?php
																		      $usser_idd =  $row1['cust_id'];
																		      $ccode =  $row1['code'];

																			        $sqld="select * from customer_msg
																					where cust_id =	$usser_idd and token='$ccode' and type='feedback' order by id desc LIMIT 1";

																						$resd = $db->query($sqld);
																						$set ='--';
																						while($satisfied=$resd->fetch_assoc()){
																						    if($satisfied['satisfied']=='satisfied'){
																							  $set ='YES';
																							}else{
																							  $set ='NO';
																							}
																						}
																		             echo $set;


																		?></td>
																		<td style="padding: 5px;">
																		   <a href="customer_master.php?customer=<?=$row1['cust_id']?>&act=edit" class="link btn-primary">Edit </a>

																		</td>
																	</tr>

																<?php
																}

																$sql1="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,soum_master_customer.fname fname,soum_master_customer.mobile mobile, concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
																			soum_order_master, soum_order_details,
																			soum_product_master,soum_prod_subcat,soum_prod_subsubcat,soum_master_customer
																			where soum_order_master.order_id= soum_order_details.order_id
																			and soum_order_details.prod_id=soum_product_master.prod_id
																			and soum_order_master.cust_id=soum_master_customer.cust_id
																			and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
																			and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
																			and soum_order_master.archive=0
																			and soum_order_master.status=3 ".$cond;
																	//echo $sql;
																  $res1=$db->query($sql1);
																  	//echo mysqli_num_rows($res1);
																 $numb1='';
																  while($row1=$res1->fetch_assoc())
																  {
																	$numb1.=$row1['mobile'].",";
																  }

																 //$numb1=substr($numb1,0,(strlen.$numb1-1));

																?>
																</tbody>
															</table>
															<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button1" type="button" onclick="$('#massms1').toggle();">View Mass SMS</button>
											<a href="user_mass_log.php?type=repair">SMS Log</a>
											<div id="massms1" style="display:none;float:left;margin-top:15px;" class="col-md-12">
											<div class="col-md-3"><input name="mob1" class="form-control" id="mob1" type="text" value="<?=$numb1;?>" style="border:1px solid#ddd;"/></div>
											<div class="col-md-3"><textarea name="sms1" id="sms1" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"></textarea></div>
											<div class="col-md-3" id="smsload1"><button name="Submit1" type="button" onclick="sms(1)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div></div>


															</div>
							<div class="col-md-12" style="width:100%;text-align:center;margin-top:20px;margin-bottom:20px;">

							<?php
							$color= 'rgb(255, 45, 0)';
							$params = $_SERVER['QUERY_STRING'];
							$params=str_replace("page=","",$params);
							$sql="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,soum_master_customer.fname fname,soum_master_customer.mobile mobile, concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
							soum_order_master, soum_order_details,
							soum_product_master,soum_prod_subcat,soum_prod_subsubcat,soum_master_customer
							where soum_order_master.order_id= soum_order_details.order_id
							and soum_order_details.prod_id=soum_product_master.prod_id
							and soum_order_master.cust_id=soum_master_customer.cust_id
							and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
							and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
							and soum_order_master.archive=0
							and soum_order_master.status=3 ".$cond;
							$rs_result =$db->query($sql); //run the query
							$total_records = mysqli_num_rows($rs_result);  //count number of records
							//echo $total_records;
							$total_pages = ceil($total_records / $num_rec_per_page);
							echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='customer_master.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
							for ($i=1; $i<=$total_pages; $i++) {
										echo "<a style='background-color:$color;color:#fff;padding: 1px 4px;' href='customer_master.php?page=".$i."&".$params."'>".$i."</a> ";
							};
							echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='customer_master.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
							?>
							</div>

							</div>


							<!-- Offline -->

							<div class="tab-pane col-md-12" id="tab-flip-tab0-5">
								<div class="clearfix">
									<div class="col-md-12 table-responsive" style="padding:0px;">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff;font-size:14px;">
											<th style="padding:2px;">SNo.</th>
											<th style="padding:2px;">Order No</th>
											<th style="padding:2px;">Name</th>
											<th style="padding:2px;">Phone No.</th>
											<th style="padding:2px;">Brand Model</th>
											<th style="padding:2px;text-align:right;">Cost</th>
											<th style="padding:2px;text-align:right;">Date</th>
											<th style="padding:2px;width: 150px;">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php

									$num_rec_per_page=25;
									if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
									if ($page=='') $page=1;
									$i=1+$start_from = ($page-1) * $num_rec_per_page;

									  $sql="select SQL_CALC_FOUND_ROWS* from
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=6
										 ) temp ".$condsoffline." ORDER BY temp.req_id desc LIMIT $start_from, $num_rec_per_page";
										//echo $sql;
									  $res=$db->query($sql);
									 	  		  $sql2="select SQL_CALC_FOUND_ROWS* from
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=6
										 ) temp ".$condsoffline." ORDER BY temp.req_id desc";
									   $res22=$db->query($sql2);

									    $pcount5=mysqli_num_rows($res22);

									  $i=1;
									  $i=$page*25-24;
									  while($row=$res->fetch_assoc())
									  {

									  	  $colorr = '';
										  $text_color = '';


                                       $sql_cust ="select * from soum_master_customer where cust_id =".$row['cust_id'];
									   $res_cust = $db->query($sql_cust);
									     while($row_cust=$res_cust->fetch_assoc()){
										    if(empty($row_cust['profession']) || empty($row_cust['email']) || empty($row_cust['dob']) || empty($row_cust['doa'])){
												$colorr = 'color:red;';
												$text_color = '(Incomplete Details)';
											}
										 }


										$name=$row['req_name'];
									    $mob=$row['req_mob'];
									    $email=$row['req_email'];
									 	$brand=$row['brand'];
									    $model=$row['model'];
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}

										  $price=$row['price_field'];
									    $buyer_date=$row['buyer_date'];

										$originalDate =$row['req_dttm'];
											$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

									?>
										<tr style="font-size:13px;">
											<td style="width: 19px"><?=$i++;?></td>
											<td><?=$row['req_token'];?></td>
											<td style="<?php echo $colorr; ?>"><?=$name;?> <?php echo $text_color ?></td>
											<td><?=$mob;?></td>
											<td><?=$brand1." ".$model1;?></td>
											<td style="text-align:right"><?=$price;?></td>
											<td style="text-align:right"><?=$buyer_date;?></td>

											<td style="padding: 5px;">
												 <a href="customer_master.php?customer=<?=$row['cust_id']?>&act=edit" class="link btn-primary">Edit </a>
												 <a href="bill_of_supply.php?act=add" class="link btn-primary">Sale </a>
											</td>
										</tr>
									<?php
									}

                                     $sql1="select SQL_CALC_FOUND_ROWS* from
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=6
										 ) temp ".$condsoffline." ORDER BY temp.req_id desc ";
										//echo $sql;
									  $res1=$db->query($sql1);
									  while($row1=$res1->fetch_assoc())
									  {
                                        $numb156.=$row1['req_mob'].",";
                                      }

									 $numb156=substr($numb156,0,(strlen.$numb156-1));

									?>

									</tbody>
								</table>

				<!--<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button5" type="button" onclick="$('#massms6').toggle();">View Mass SMS</button>
				<a href="user_mass_log.php?type=buy">SMS Log</a>
				<div id="massms6" style="display:none;float:left;margin-top:15px;" class="col-md-12">
				<div class="col-md-12"><?php echo $pcount5;?> entries selected</div>
				<div class="col-md-12"><input name="mob6" class="form-control" id="mob6" type="text" value="<?=$numb156;?>" style="border:1px solid#ddd;"/></div>
				<div class="col-md-12"><textarea name="sms6" id="sms6" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
				<div class="col-md-3" id="smsload6"><button name="Submit6" type="button" onclick="sms(6)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div></div>-->

								</div>
								</div>


								<div class="col-md-12" style="text-align:center;">
												<div style="width:100%;">
												<?php
														$params = $_SERVER['QUERY_STRING'];
														$params=str_replace("page=","",$params);

														$sql = "SELECT FOUND_ROWS() AS found_rows";
														$rs_result =$db->query($sql); //run the query
														$row=$rs_result->fetch_assoc();
														$total_records = $row['found_rows'];

														$total_pages = ceil($total_records / $num_rec_per_page);
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='customer_master.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
														for ($i=1; $i<=$total_pages; $i++) {
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='customer_master.php?page=".$i."&".$params."'>".$i."</a> ";
														};
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='customer_master.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
														?>
												</div>
											</div>
										</div>




					   </div>
					</div>
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
<script>
function other(val)
{
   if(val==0 && val!="")
   {
		$("#other").html("<input type='text' name='prod_name' class='form-control' placeholder='Enter Product Name'>");
   }
   else
   {
   		$("#other").html("");
   }
}
function addtocart()
{

	   var pid=$("#prod_id").val();
	   var qty=$("#qty").val();
	   if(pid=='')
	   {
	      alert('Please select Product');
	      return false;
	   }

	   if(qty=='')
	   {
	      alert('Please fill quantity');
	      return false;
	   }
	   //alert("pid="+pid+"&qty="+qty);
       $.ajax({

           type:"POST",
           url:"../add_to_cart.php",
           data:"pid[]="+pid+"&qty[]="+qty,

           success:function(data)
           {
            loadexternalcart();
           }

       });

}
function loadexternalcart()
{
$.ajax({
    url:"external_cart.php",
    success:function(data) {
      $('#external-cart').html(data);
    }
  });
}
function remove_item1(i)
{


		$.getJSON('../remove_item.php?callback=?',"product_id="+i, function(data){

		if(data==1)
		{

			loadexternalcart();
		}

		});
}
var c=0;
function chkbox()
{
  if(c==0)
  {
    //alert('check');
    $('#active2').prop('checked', true);
    $('#nosms').prop('checked', true);
    c=1;
  }
  else
  {
    //alert('uncheck');
    $('#active2').prop('checked', false);
     $('#nosms').prop('checked', false);
    c=0;
  }
}
</script>

	<!-- Dev only -->
	<!-- Vendors -->
		<script src="scripts/vendors.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/select2.min.js"></script>
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/form-elements.init.js"></script>

<script>
$("#name1").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
$("#mobile").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>10)
	{
       $(this).val(val.substr(0,10));

    }


});

$('#review').keypress(function(e) {
    var tval = $('#review').val(),
        tlength = tval.length,
        set =249,
        remain = parseInt(set - tlength);

    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#review').val((tval).substring(0, tlength - 1))
    }
})
</script>
<script type="text/javascript">
function abc(x,popid)
{
 	var file = x.files[0];
    window.URL = window.URL || window.webkitURL;
    var blobURL = window.URL.createObjectURL(file);
	$("#popid").val(popid);

	$("#scream").one("load", function() {

		var img = document.getElementById("scream");
		var c_width 	= img.clientWidth;
		var c_height 	= img.clientHeight;
		var n_width 	= img.naturalWidth;
		var n_height 	= img.naturalHeight;
	    var c = document.getElementById("myCanvas");
	    var ctx = c.getContext("2d");
	    c.height = 480;
	    diff_per=480/n_height*100;
	    c.width=n_width*diff_per/100;
	    ctx.drawImage(img, 0, 0,n_width, n_height,0,0,c.width,c.height);
		var myCanvas = document.getElementById("myCanvas");
		var canvasData = myCanvas.toDataURL("image/jpeg",1);
		var debugConsole= document.getElementById("debugConsole"+popid);
		//alert(popid);
	    abc1(popid);
    }).attr("src", blobURL);


}
function saveImage(dataURL, popid)
{
    $('#previewing'+popid).attr('src','../upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: {
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#debugConsole'+popid).val(o);
	   $('#previewing'+popid).attr('src','../upload/temp/'+o);
	});
}

function sms(v)
{
  var mob=$("#mob"+v).val();
  var sms=$("#sms"+v).val();
  $("#smsload"+v).html("<img src='images/viewloading.gif'/>");
   $.ajax({

		type:'POST',
		 url:'send_sms.php',
		data:'mob='+mob+'&sms='+sms+'&type=customer',
		success:function(html)
		{
           if(html==1)
           {
            alert("SMS sent successfuly");
            $("#smsload"+v).html('<button name="Submit1" type="button" onclick="sms(1)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button>');

            $("#massms"+v).hide();
           }
        }
   });

}

function feedbackfun(cust_id)
{
  var mob=$("#mobile").val();
  var sms=$("#feedback").val();
  var token=$("#tokense").val();
  var satisfied=$("#satisfied").val();
  $("#feedbackloder").html("<img src='images/viewloading.gif'/>");
   $.ajax({

		type:'POST',
		url:'send_feedback.php',
		data:'mob='+mob+'&sms='+sms+'&cust_id='+cust_id+'&token='+token+'&satisfied='+satisfied,
		success:function(html)
		{
           if(html==1)
           {
            alert("SMS sent successfuly");
			 $("#feedbackloder").html("");
			//window.reload();
           }else{
		      alert("Error");
			 $("#feedbackloder").html("");
		   }
        }
   });

}

function shootfun(cust_id)
{
  var mob=$("#mobile").val();
  var sms=$("#shoot").val();
  $("#shootloder").html("<img src='images/viewloading.gif'/>");
   $.ajax({

		type:'POST',
		url:'shoot_message.php',
		data:'mob='+mob+'&sms='+sms+'&cust_id='+cust_id,
		success:function(html)
		{
           if(html==1)
           {
            alert("SMS sent successfuly");
			 $("#shootloder").html("");
			//window.reload();
           }else{
		      alert("Error");
			 $("#shootloder").html("");
		   }
        }
   });

}






function satisfied(value){
 if(value=='satisfied'){
   $("#feedback").val('');
    $("#feddiv").hide();
 }else{
    $("#feedback").val('');
    $("#feddiv").show();

 }

}

function SellPriceFun(ord_det_id){

  var sell_price = $("#SellPrice").val();
  $("#SellPriceFun").html("<img src='images/viewloading.gif'/>");
   $.ajax({

		type:'POST',
		url:'update_sell_price.php',
		data:'ord_det_id='+ord_det_id+'&sell_price='+sell_price,
		success:function(html)
		{
           if(html==1)
           {
              alert("Updated successfuly");
			 $("#SellPriceFun").html("Update");
			//window.reload();
           }else{
		      alert("Error");
			 $("#SellPriceFun").html("Update");
		   }
        }
   });


}

</script>
<style>
@media only screen and (max-width: 500px) {
.datepicker {left:0px!important;}
}
</style>
</body>
</html>
