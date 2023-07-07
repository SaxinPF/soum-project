﻿<?php include('../config2.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="Materia - Admin Template" name="description">
<meta content="materia, webapp, admin, dashboard, template, ui" name="keywords">
<meta content="solutionportal" name="author">
<!-- <base href="/"> -->
<title>Admin Dashboard</title>
<!-- Icons -->
<link href="fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Plugins -->
<link href="styles/plugins/waves.css" rel="stylesheet">
<link href="styles/plugins/perfect-scrollbar.css" rel="stylesheet">
<link href="styles/plugins/select2.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-colorpicker.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-slider.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-datepicker.css" rel="stylesheet">
<link href="styles/plugins/summernote.css" rel="stylesheet">
<!-- Css/Less Stylesheets -->
<link href="styles/bootstrap.min.css" rel="stylesheet">
<link href="styles/main.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">
<!-- Match Media polyfill for IE9 --><!--[if IE 9]>
<script src="scripts/ie/matchMedia.js"></script>
<![endif]-->
<style>
.form-control {
    border: 1px solid#ddd;
}
.link {
    padding: 5px 8px;
    border-radius: 2px;
    margin-left: 5px;
    background-color: #787878;
    border-color: #898989;
    color: #fff;
}
.select-wrapper {
  background:url('../images/plus-icon.png') no-repeat;
  background-size:25px 25px;
  background-position:center center;
	display: block;
	position: relative;
	width: 100%;
	height: 80px;

	position:relative;
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
#fileToUpload3 , #fileToUpload4{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload5 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload6 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload7 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload8 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#previewing7 , #previewing1 , #previewing2 , #previewing3 , #previewing4 , #previewing5 , #previewing6 , #previewing8{
width:auto;
}
.filedivcls {
background: #ffffff;
}
#list-1 td {
	padding: 5px;
}

.cls-hold{
	background-color: #f79859 !important;
}
</style>
<script src="scripts/jquery.min.js"></script>


<script>
function validate2() {
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name is required.");
        return false;
    }

    var mob=$("#mobile").val();
	  if(mob=='')
	  {
	   alert('Mobile number is required.');
	   return false;
	  }


    /*var m=(mob.substr(0,1))*1;

    if(m>=0 && m<=6)
    {
      alert("Enter valid number");
      return false;

    }*/

    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }

    var x = document.forms["myForm"]["date_d"].value;
    if (x == "") {
        alert("Date is required.");
        return false;
    }

	 //var x = document.forms["myForm"]["cn_number"].value;
    //if (x == "") {
        //alert("Entry number is required.");
        //return false;
    //}


	var x = document.forms["myForm"]["drpBrand"].value;
    if (x == "") {
        alert("Brand is required.");
        return false;
    }

    var x = document.forms["myForm"]["imi_no"].value;
    if (x == "" || x == 0) {
        alert("IMEI Number is required.");
        return false;
    }


	var x = document.forms["myForm"]["drpModel"].value;
    if (x == "") {
        alert("Model is required.");
        return false;
    }

	var x = document.forms["myForm"]["price"].value;
    if (x == "") {
        alert("Price is required.");
        return false;
    }



	/*var x = document.forms["myForm"]["colour"].value;
    if (x == "") {
        alert("Colour is required.");
        return false;
    }*/

	var x = document.forms["myForm"]["receipt_cn_number"].value;
    if (x == "") {
        alert("Entry number is required.");
        return false;
    }

	var x = document.forms["myForm"]["receipt_date"].value;
    if (x == "") {
        alert("receipt date is required.");
        return false;
    }


}
</script>
</head>

<body id="app" class="app off-canvas">

<!-- #Start header --><?php include('_header.php');?>
<!-- #end header -->
<!-- main-container -->
<div class="main-container clearfix">
	<!-- main-navigation --><?php include('_left-menu.php');?>
	<!-- #end main-navigation -->
	<!-- content-here -->
	<div id="content" class="content-container">
		<!-- dashboard page -->
		<div class="page page-dashboard">
			<div class="page-wrap">
				<div class="row">
					<!-- dashboard header -->
					<div class="col-md-12" style="margin-top: 20px;">
						<div class="dash-head clearfix mb20">
							<div class="left">
								<h3 style="margin-top:5px;">Sale</h3>
							</div>
                            <div>
                                <a href="bill_of_supply.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:6px 85px;float:right;">Add new</button></a>
        					</div>
						</div>
					</div>
				</div>
				<!-- #end row -->
				<?php $img1 = $img2 =  $img3 =  '../images/noimage.png';?>
				<?php
					$act = (isset($_REQUEST['act']))?$_REQUEST['act']:'';
					$imei_number = (isset($_GET['imei']))?$_GET['imei']:'';

					if(isset($_REQUEST['req_id']) || isset($_GET['imei'])){
							if(isset($_REQUEST['req_id']))
					{
					/** BOF Security Patch IS-002*/
					$poster_id=mysqli_real_escape_string($db,$_REQUEST['req_id']);
					$dealerM=$db->prepare('select * from soum_bill_of_supply where id=?');
					$dealerM->bind_param('i', $poster_id);
					$dealerM->execute();
					$res=$dealerM->get_result();
					}else{
						$imei_id=mysqli_real_escape_string($db,$_GET['imei']);

						$dealerM=$db->prepare('select * from soum_receipt_note where imi_no=?');
						$dealerM->bind_param('i', $imei_id);
						$dealerM->execute();
						$res=$dealerM->get_result();
					}

					/** EOF Security Patch IS-002*/
         			 while($row=$res->fetch_assoc())
					 {

						$name=$row['name'];
						$party_gst = $row['party_gst'];
						$party_address = $row['party_address'];
					    $mob=$row['mobile'];

					    $cn_number=$row['cn_number'];


					    $color=$row['colour'];
					    $price=$row['price'];
					    $brand=$row['brand'];
					    $model=$row['model'];
					    $quantity=$row['quantity'];
					    $imi_no = $row['imi_no'];
					    $receipt_cn_no=$row['receipt_cn_no'];
					   
					    if(isset($_GET['imei'])){
						 $net_banking = $row['price'];
							}else{
								 $net_banking = $row['net_banking'];
						}
					    $mobile_wallet = $row['mobile_wallet'];
					    $cash = $row['cash'];
					    $bank_cards = $row['bank_cards'];
					    $other_model = $row['other_model'];


						$date_d = $row['date_d'];
						$date_d= date("d/m/Y",$date_d);
						$receipt_date =$row['receipt_date'];
						$receipt_date= date("d/m/Y",$receipt_date);

						if(!empty($row['images']) && file_exists('../upload/'.$row['images'])){
							$img1  =      '../upload/'.$row['images'];
						}
						if(!empty($row['images1']) && file_exists('../upload/'.$row['images1'])){
							$img2  =      '../upload/'.$row['images1'];
						}
						if(!empty($row['images2']) && file_exists('../upload/'.$row['images2'])){
							$img3  =      '../upload/'.$row['images2'];
						}



                     }
					}

				
					
			?><?php if($act=='add' || $act=='edit' || $act=='del'){?>
				<div class="row">
					<div class="col-md-8" style="margin: auto; float: none;">
					  <div class="dash-head clearfix mb20">

					   <?php if(!isset($_REQUEST['step'])){ ?>
							<form action="bill_of_supply_action.php" method="post" name="myForm" onsubmit="return validate2()">
								<input name="act" type="hidden" value="<?=$act;?>" />
								<input name="reqs_id" type="hidden" value="<?=$poster_id;?>" />
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>Party Name <span class="red-text">*</span></label></p>
										<input id="name1" class="form-control" name="name" placeholder="Name" type="text" value="<?=$name;?>" />
									</div>
								</div>
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>Mobile No <span class="red-text">*</span></label></p>
										<input id="mobile" class="form-control" name="mobile" placeholder="Mobile No" type="text" value="<?=$mob;?>" />
									</div>
								</div>

    <div class="col-md-3" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>NetBanking(Price) </label></p>
											<input id="net_banking" class="form-control" name="net_banking"  type="text" value="<?=$net_banking;?>" />
										</div>
									</div>

									<div class="col-md-3" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Exchange value</label></p>
											<input id="mobile_wallet" class="form-control" name="mobile_wallet"  type="text" value="<?=$mobile_wallet;?>" />
										</div>
									</div>

									<div class="col-md-3" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Cash (Price) </label></p>
											<input id="cash" class="form-control" name="cash"  type="text" value="<?=$cash;?>" />
										</div>
									</div>

									<div class="col-md-3" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Bank Cards (Price) </label></p>
											<input id="bank_cards" class="form-control" name="bank_cards"  type="text" value="<?=$bank_cards;?>" />
										</div>
									</div>




									<div class="col-md-4">
											<label class="control-label">Date</label>
											<div class="input-group date" id="datepickerDemo1">
											   <input type="text" id="date_d" name="date_d" value="<?php echo $date_d ?>" class="form-control" Placeholder=""/>
											    <span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
									</div>
									<div class="col-md-4" style="margin-bottom:10px;display:none;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>C. Number <span class="red-text">*</span></label></p>
											<input id="cn_number" class="form-control" name="cn_number" placeholder="CN Number" type="text" value="<?=$cn_number;?>" />
										</div>
									</div>
								<div class="col-md-4">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>IMEI<span class="red-text">*</span></label></p>
			<input type="text" name="imi_no" onchange="get_imei(this.value)" value="<?php 
			if(isset($imei_number) && $imei_number != ''){

				echo $imei_number;}else{ echo $imi_no;} ?>" id="txt_imi_no" class="form-control" Placeholder="Enter IMEI number"/>
									</div>
								</div>


								<div class="col-md-4" style="margin-bottom:10px;">
									<div style="width: 100%;margin-bottom: 8px;">
										<p  style="margin: 0px; width: 100%; float: left;"><label>Brand <span class="red-text">*</span></label></p>
										<select class="form-control" name="drpBrand" onchange="fill2(this.value,'');" id="brand_id" style="width: 100%;">
										<option selected="selected" value="">--Select Brand--</option>
										<?php
									  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									  ?>
									  <option value="<?=$row['prod_subcat_id'];?>" <?php if($row['prod_subcat_id']==$brand) echo "Selected";?>>
									  <?=$row['prod_subcat_desc']?></option>
										<?php }
									?></select> </div>
								</div>
								<div id="modeldiv1" class="col-md-3" style="margin-bottom:10px;">
									<div style="width: 100%;margin-bottom: 8px;">
										<p id="remove1" style="margin: 0px; width: 100%; float: left;"><label>Model <span class="red-text">*</span></label></p>
										<select id="soum_prod_subsubcat1" class="form-control" name="drpModel" onchange="get_color(this.value,'')" style="width: 100%;">
										<option selected="selected" value="">--Select Model--</option>
										</select> </div>
								</div>
	                               <div class="col-md-6" id="oomodel" style="margin-bottom:10px;display:none;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Other Model <span class="red-text">*</span></label></p>
											<input id="other_model" class="form-control" name="other_model"  type="text" value="<?=$other_model;?>" />
										</div>
									</div>

									<div class="col-md-3" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Quantity <span class="red-text">*</span></label></p>
											<input id="quantity" class="form-control" name="quantity"  type="number" value="<?=$quantity;?>" />
										</div>
									</div>

									<div class="col-md-3">
											<label class="control-label">Colour</label>
											<select class="form-control minimal" name="colour" id="colour">
												<option value='' >Select</option>

											</select>
									</div>

									<div class="col-md-3">
											<label class="control-label">Receipt Date</label>
											<div class="input-group date" id="datepickerDemo2" style="width: 100%;">
											   <input type="text" id="Receiptdate" name="receipt_date" value="<?php echo $receipt_date ?>" class="form-control" Placeholder=""/>
											    <span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
									</div>

									<div class="col-md-6" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Entry Number <span class="red-text">*</span></label></p>
											<input id="r_cn_number" class="form-control" name="receipt_cn_number" placeholder="Entry Number" type="text" value="<?=$receipt_cn_no;?>" />
										</div>
									</div>
		                         <div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>Party GST Number <span class="red-text"></span></label></p>
										<input id="party_gst" class="form-control" name="party_gst" placeholder="Party GST Number" type="text" value="<?=$party_gst;?>" />
									</div>
								 </div>
								 <div class="col-md-8" style="margin-bottom:10px;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label> Address <span class="red-text"></span></label></p>
										<textarea id="party_address" class="form-control" name="party_address" placeholder="Party Address" ><?=$party_address;?></textarea>
									</div>
								 </div>



								<div class="col-md-12" style="background: #f1f1f1;margin-top:10px;">

									<div class="col-md-12">
										<div style="width: 100%;text-align: center;">
										<?php
											if ($_REQUEST['act']=='del')
												$caption="Confirm Delete!";
											elseif ($_REQUEST['act']=='edit')
												$caption="Update & Next !";
											else
												$caption="Next";

											?>

											<button id="Button1" class="btn btn-primary mr5 waves-effect waves-effect" name="Button1" type="submit" value="Submit">
											<?=$caption;?></button></div>
									</div>
								</div>
							</form>
						<?php }else{ ?>

							      <div id="uploadimage">
										<div class="col-md-12">
											    <label class="control-label">Upload Documents</label>
										</div>

									<div class="col-sm-4" style="margin-top:15px;">
										<div class="filedivcls">
											<img src="<?php echo $img1 ?>" id="previewing1" style="height:80px;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1" onchange="readURL(this,1);"  id="fileToUpload1" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
			                            <div class="filedivcls">
			                            	<img src="<?php echo $img2 ?>" id="previewing2" style="height:80px;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="readURL(this,2);"  type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
		                            	<div class="filedivcls">
			                            	<img src="<?php echo $img3 ?>" id="previewing3" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="readURL(this,3);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
		                            </div>


							        <div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="button" onclick="savefun(<?php echo $mob; ?>)" style="margin:20px;" id="btn-add-extra">Submit</button>
			    					</div>
								</div>
						<?php } ?>

					</div>
					</div>
				</div>
				<?php } ?>
				<div class="row">
					<!-- dashboard header -->

<?php $conds='';
$search=$_REQUEST['search'];
$on=$_REQUEST['searchon'];

if($search!='')
{
 if($on==1)
 {
   $conds="where mobile like '%$search%'";
 }
  if($on==2)
 {
   $conds="where imi_no  like '%$search%'";
 }
 if($on==3)
 {
   $conds="where brand_id  like '%$search%'";
 }
}
?>					<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height: 450px;">
										<table style="width:auto;float:right;">
                                    	<tr><form method="get"><td style="padding-right:5px;">
									          <select name="searchon" class="form-control" id="searchon">
												<!-- <option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>-->
												<option value="2" <?php if($on==2) echo "Selected";?>>IMEI</option>
												<option value="1" <?php if($on==1) echo "Selected";?>>Mobile</option>
                                                <option value="1" <?php if($on==3) echo "Selected";?>>Brand Model</option>
											  </select>
										</td>
										<td style="padding-right:5px;">
										<input name="search" type="text" id="locations" class="form-control searchfield" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td>
										</form></tr>
								            </table>
							<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active">
									<a data-toggle="tab" href="#tab-flip-tab0-1">
									Bill List </a></li>

								</ul>
								<div class="tab-content" style="display: inline-block; width: 100%;">
									<div id="tab-flip-tab0-1" class="tab-pane active col-md-12" style="overflow: hidden">
										<div class="clearfix">
										<div class="col-md-12 table-responsive" style="padding:0px;">
											<table id="list-1" class="table table-bordered invoice-table mb30" style="margin-bottom:15px;">
												<thead>
													<tr style="background: #38b4ee; color: #fff; font-size: 14px;">
														<th style="padding: 2px;">SNo.</th>
														<th style="padding: 2px;">Name</th>
														<th style="padding: 2px;">Mobile</th>
														<th style="padding: 2px;">Date</th>

														<th style="padding: 2px;">Brand Model</th>
														<th style="padding: 2px;text-align:right;">Price</th>
														<th style="padding: 2px;text-align:right;">Entry No</th>
														<th style="padding: 2px;text-align:right;">Receipt Date</th>
														<th style="padding: 2px;text-align:right;">IMEI </th>
														<th style="padding: 2px;text-align:right;">Return </th>

														<th style="padding: 2px; width: 150px;">Action</th>
														<th></th>
													</tr>
												</thead>
												<?php

												$num_rec_per_page=25;
												if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
												if ($page=='') $page=1;
												$i=1+$start_from = ($page-1) * $num_rec_per_page;



									  $sql="select SQL_CALC_FOUND_ROWS * from
									  (select soum_bill_of_supply.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_bill_of_supply,soum_prod_subcat,soum_prod_subsubcat
										where soum_bill_of_supply.brand=soum_prod_subcat.prod_subcat_id
										and soum_bill_of_supply.model=soum_prod_subsubcat.prod_subsubcat_id

										 ) temp ".$conds." ORDER BY temp.id desc LIMIT $start_from, $num_rec_per_page";
										//echo $sql;
									  $res=$db->query($sql);

									 	$i=1;
										$i=$page*25-24;

									  while($row=$res->fetch_assoc())
									  {
									    $name=$row['name'];
									    $imi_no =$row['imi_no'];
									    $mob=$row['mobile'];
									    //$price=$row['price'];
									    $brand1=$row['phone1'];
									    $model1=$row['model'];
                                        if($row['model']==0){
										  $brand1 = $row['brand_name'].' '.$row['other_model'];
										}
									    $cn_number=$row['cn_number'];
									    $receipt_cn_number=$row['receipt_cn_no'];
											$date_d =$row['date_d'];
											$date_d= date("d-m-Y",$date_d);


											$today = date("d-m-Y");

											$diff = strtotime($today) - strtotime($date_d);
  
     											 // 1 day = 24 hours
    										  // 24 * 60 * 60 = 86400 seconds
    											$date_difference =  abs(round($diff / 86400));
											//$date_difference  = dateDiffInDays($today, $date_d);
												$receipt_date =$row['receipt_date'];
											$receipt_date= date("d-m-Y",$receipt_date);


										$net_banking = $row['net_banking'];
					                    $mobile_wallet = $row['mobile_wallet'];
					                    $cash = $row['cash'];
					                    $bank_cards = $row['bank_cards'];

										$price = $net_banking+$mobile_wallet+$cash+$bank_cards;


											?>
												<tr style="font-size: 13px;">
													<td style="width: 19px"><?=$i++;?>
													</td>
													<td><?=$name;?></td>
													<td><?=$mob;?></td>
													<td><?php echo $date_d; ?></td>

													<td><?=$brand1;?></td>
													<td style="text-align:right"><?=number_format($price,2);?></td>
													<td style="text-align:right"><?=$receipt_cn_number;?></td>
													<td style="text-align:right"><?=$receipt_date;?></td>
													<td style="text-align:right"><?= $imi_no; ?></td>
													<td style="text-align:right"><?php //if(!empty($row['images'])){
														//echo '<a href="https://www.soum.co.in/upload/'.$row['images'].'" target="_blank">Doc 1 </a><br/>';
													//}
													//if(!empty($row['images1'])){
														//echo '<a href="https://www.soum.co.in/upload/'.$row['images1'].'" target="_blank">Doc 2 </a><br/>';
													//}
													//if(!empty($row['images2'])){
														//echo '<a href="https://www.soum.co.in/upload/'.$row['images2'].'" target="_blank">Doc 3 </a>';
													//}
                                                      ?>
                                                      <?php if($date_difference < 8) {?>
                                                     <?php if($row['r_status']=='no'){
                                                      ?>
                                                      <a href="bill_return.php?id=<?=$row['id']?>&type=yes">
                                                       Yes
													  </a>
                                                      <?php }else{ ?>
                                                     <a href="bill_return.php?id=<?=$row['id']?>&type=no">
                                                       No
													</a>
                                                      <?php } }?>
													</td>

													<td>
													<a href="bill_of_supply.php?req_id=<?=$row['id']?>&amp;act=edit">Edit</a>
													<a href="bill_of_supply_print.php?req_id=<?=$row['id']?>">Print</a>
													<a href="bill_and_recipte_delete.php?id=<?=$row['id']?>&type=bill">
													Delete</a></td>
													 <td width="10%"><button class="link hold_button btn-primary">Done</button></td>
												</tr>
												<?php
												}

											?>
											</table>
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
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='bill_of_supply.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
														for ($i=1; $i<=$total_pages; $i++) {
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='bill_of_supply.php?page=".$i."&".$params."'>".$i."</a> ";
														};
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='bill_of_supply.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
														?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>
			<!-- #end page-wrap --></div>
		<!-- #end dashboard page --></div>
</div>
<!-- #end main-container -->
<!-- theme settings -->
<div class="site-settings clearfix hidden-xs">
	<div class="settings clearfix">
		<div class="trigger ion ion-settings left">
		</div>
		<div class="wrapper left">
			<ul class="list-unstyled other-settings">
				<li class="clearfix mb10">
				<div class="left small">
					av Horizontal</div>
				<div class="md-switch right">
					<label><input id="navHorizontal" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
				<li class="clearfix mb10">
				<div class="left small">
					Fixed Header</div>
				<div class="md-switch right">
					<label><input id="fixedHeader" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
				<li class="clearfix mb10">
				<div class="left small">
					av Full</div>
				<div class="md-switch right">
					<label><input id="navFull" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
			</ul>
			<hr />
			<ul id="themeColor" class="themes list-unstyled">
				<li class="active" data-theme="theme-zero"></li>
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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="scripts/vendors.js"></script>
<script src="scripts/plugins/screenfull.js"></script>
<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
<script src="scripts/plugins/waves.min.js"></script>
<script src="scripts/plugins/select2.min.js"></script>
<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
<script src="scripts/plugins/bootstrap-slider.min.js"></script>
<script src="scripts/plugins/summernote.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
<script src="scripts/app.js"></script>
<!--<script src="scripts/form-elements.init.js"></script>-->
<script>
/*$("#txt_imi_no").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>15)
	{
       $(this).val(val.substr(0,15));

   }

});*/



$(document).ready(function(){

   var b='<?=$brand;?>';

    var color_id = '<?php echo  $color ?>';
    var m = '<?php echo  $model ?>';
	//alert(m);
	//alert(color_id);
      get_color(m,color_id);

   if(b!='')
   fill2('<?=$brand;?>','<?=$model;?>');

   $("#datepickerDemo1").datepicker({autoclose:!0});
   $("#datepickerDemo2").datepicker({autoclose:!0});

});

$("#name1").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});

$("#mobile").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9 ] /g)) {
       $(this).val(val.replace(/[^0-9 ]/g, ''));
   }

   if (val.length>10)
	{
       $(this).val(val.substr(0,10));

   }

});

function fill2(bid,mid)
{

$('#soum_prod_subsubcat1').hide();
 $('#name_loader').html("<img src='../upload/loader.gif' width='30' height='30'>");
	$.ajax({
		type:"Post",
		url:"../fill3.php",
		data:"param="+bid+"&mid="+mid,
		success:function(html)
		{

		       $('#name_loader').html("");
               $('#soum_prod_subsubcat1').show();

			$("#soum_prod_subsubcat1").html(html);
		}
	});
}

function get_imei(imei){
	
	var sitpath = '<?php echo SITEPATH; ?>';
	$.ajax({
		type:"Post",
		url: "../get_imei.php",
		data:{"param":imei},
		success:function(response)
		{
			if(response ==  0){
				 alert("Please Select Valid IMEI Number");	
			}
		  
     		
		}
	});
}


function get_color(m_id,cid){
	if(m_id=='0'){
	  $('#oomodel').show();
	}else{
	  $('#oomodel').hide();
	}


 var sitpath = '<?php echo SITEPATH; ?>';
	$.ajax({
		type:"Post",
		url: "../get_color.php",
		data:{"param":m_id,'mid':cid},
		success:function(html)
		{
		  $("#colour").html(html);
		}
	});
}


function readURL(input,id){
		     var req_id =   '<?php echo (isset($_REQUEST['req_id']))?$_REQUEST['req_id']:0; ?> '
		     $('#previewing'+id).attr('src','../upload/loader.gif');

				if (input.files && input.files[0]) {
					var selectedFile = input.files[0];
					//console.warn(selectedFile);
					   fd = new FormData();
					   fd.append('req_id',req_id);
					   fd.append('fileToUpload'+id,selectedFile,selectedFile.name);
						$.ajax({
							  type: "POST",
							  async: false,
							  url: "bill_of_supply_file_upload.php",
							  processData: false,
				              contentType: false,
							  data: fd,
							  dataType: 'json',
							}).done(function(o) {
							   if(o.error_f==1){
							     alert(o.error);
								 $('#previewing'+id).attr('src','../images/noimage.png');
							   }else{
								    $('#previewing'+id).attr('src','../upload/'+o.path);
							   }
							});
				}
        }

function savefun(mobile){
	var sitpath = '<?php echo SITEPATH; ?>';
	$.ajax({
		type:"Post",
		url: "bill_of_supply_message.php",
		data:{"mobile":mobile,'mobile':mobile},
		success:function(html)
		{
			alert("Data Update successfully");
            window.location.href="bill_of_supply.php";
		}
	});


}

$(document).ready(function(){

    jQuery('.hold_button').click(function()
    {
      jQuery(this).closest('tr').toggleClass('cls-hold');  
       jQuery(this).text(function(i, text){
          return text === "Done" ? "Undone" : "Done";
      })

    },
    /*function()
    {
      jQuery(this).closest('tr').removeClass('cls-create-btn');
    } */                                  
    );
});

</script>

<?php
	/* $new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.prod_subcat_desc) phone1
    FROM soum_prod_subcat
    LEFT JOIN soum_prod_subsubcat AS A
        ON soum_prod_subcat.prod_subcat_id = A.prod_subcat_id";
         $res=$db->query($new_sql);
         $allRows =array();
			while($rowss=$res->fetch_assoc()){
	          $allRows[]=$rowss['phone1'];
		    }
	if(empty($on)){
	    $onn=1;
	}else{
	 $onn=$on;
	}  */
	/*
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
    var locationsz = ["<?php echo  implode('","',$allRows); ?>"];
	var url     =  'search_auto.php';
	searchfun(<?php echo $onn ?>);


function searchfun(search_id){

	if(search_id==1){
     $('.searchfield').attr('id','locations');

	 	var availableTags = locationsz;
			$( "#locations" ).autocomplete({
			  minLength: 3,
			  source: availableTags
			});

	}else{
	 $('.searchfield').attr('id','searchkeword');
	 	  $("#searchkeword").autocomplete({
					minLength: 2,
					delay : 200,
					source: function(request, response) {

						$.ajax({
						   url: 	 url,
						   data:  {
									term : request.term,
									table   : 'seller_r',
									field   : document.getElementById('searchon').value
							},
						   dataType: "json",

						   success: function(data) 	{
								//alert(data);
							 response(data);
						  }

						})
				   },

					  select:  function(e, ui) {
						  // e.preventDefault();
							//document.getElementById('searchkeword').value = ui.item.label;

					  }
				});

	}

}

</script>
<?php */ ?>

<?php
   $new_sql = "SELECT imi_no FROM soum_receipt_note";
         $res=$db->query($new_sql);
         $allRows =array();
			while($rowss=$res->fetch_assoc()){
	          $allRows[]=$rowss['imi_no'];
		    }
?>


  <script>
    var locationsz = ["<?php echo  implode('","',$allRows); ?>"];
	//var url     =  'search_auto.php';

show_cn_no();
function show_cn_no(){
  	 	var availableTags = locationsz;
			$( "#txt_imi_no" ).autocomplete({
			  minLength: 2,
			  source: availableTags,

					  select:  function(e, ui) {
						  e.preventDefault();
						var txt_imi_no = 	document.getElementById('txt_imi_no').value = ui.item.label;


							$.ajax({
								type:"Post",
								url: "get_r_cn_number.php",
								data:{"r_cn_number":txt_imi_no},
								dataType:'json',
								error:function(err){
								  alert(err.toString());
								},
								success:function(data)
								{

								  document.getElementById('brand_id').value = data.brand;
								  fill2(data.brand,data.model);
								  get_color(data.model,data.colour);

								     document.getElementById('quantity').value = data.quantity;
								     document.getElementById('Receiptdate').value = data.receipt_date;
									 document.getElementById('r_cn_number').value = data.id;

								}
							});



					  }
			});
}
</script>

</body>

</html>
