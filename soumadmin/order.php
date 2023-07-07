﻿﻿﻿﻿﻿﻿﻿<?php include("../config2.php");
$type2=$_REQUEST['type2'];
if($type2=='')
$type2=$_REQUEST['type'];
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
.ui-autocomplete{z-index:999999!important;}
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
		<?php
$search=$_REQUEST['search'];
$on=$_REQUEST['searchon'];
$search22 ='';
if($search!='')
{
 if($on==1)
 {
  //$conds=" and concat(order_token,order_date,soum_prod_subcat.prod_subcat_desc,soum_prod_subsubcat.prod_subcat_desc,fname,mobile) like '%$search%'";
    $conds="having UPPER(phone1)=UPPER('$search')";
	$search22 = $search;
 }
  if($on==2)
 {
    $conds=" and fname like '%$search%'";

 }
 if($on==3)
 {
    $conds=" and mobile like '%$search%'";

 }


}

?>

		<div class="content-container" id="content">
			<!-- dashboard page -->
			<div class="page page-dashboard">
				<div class="page-wrap">
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">Order List </h3>
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
										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('all');">
											<input checked="" name="radioEg" type="radio" <?php if($type2=='') echo "checked";?>>
											<span>All</span>
										</label>
										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('new');">
											<input name="radioEg" type="radio" <?php if($type2=='1') echo "checked";?>>
											<span>New</span>
										</label>
										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('used');">
											<input name="radioEg" type="radio" <?php if($type2=='2') echo "checked";?>>
											<span>Used</span>
										</label>

									</div>
								</div>
								<table style="width:auto;float:right;margin-top: -60px;">
									<tr><form method="get"><td style="padding-right:5px;">
											<select name="searchon" class="form-control" id="searchon" onchange="searchfun(this.value)">
												<option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>
												<option value="2" <?php if($on==2) echo "Selected";?>>Name</option>
												<option value="3" <?php if($on==3) echo "Selected";?>>Mobile</option>
											</select>
										</td>
										<td style="padding-right:5px;">
										<input name="search" type="text" id="locations" class="form-control searchfield" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
								</table>

								<ul class="nav nav-tabs">
						    			<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Interested <span id="pcount">&nbsp; ( 0 )</span></a></li>
						    			<li><a href="#tab-flip-one-un" data-toggle="tab">Unavailable <span id="unpcount">&nbsp; ( 0 )</span></a></li>
									<li><a href="#tab-flip-four-4" data-toggle="tab">Prebook <span id="dcount4">&nbsp; ( 0 )</span></a></li>
									<li><a href="#tab-flip-two-1" data-toggle="tab">Available <span id="prcount">&nbsp; ( 0 )</span></a></li>
									<li><a href="#tab-flip-three-1" data-toggle="tab">
									In Waiting <span id="acount">&nbsp; ( 0 )</span> </a></li>
									<li><a href="#tab-flip-four-2" data-toggle="tab">Sold Out <span id="dcount2">&nbsp; ( 0 )</span></a></li>
									<li><a href="#tab-flip-four-1" data-toggle="tab">Dispatched <span id="dcount">&nbsp; ( 0 )</span></a></li>
									<li><a href="#tab-flip-four-3" data-toggle="tab">Phone Transfer <span id="dcount3">&nbsp; ( 0 )</span></a></li>
								</ul>
								<div class="tab-content table-responsive" style="width: 100%;float: left;">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Exchange</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Availability</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php

									  $order_id=$_REQUEST['order_id'];
									  $type=$_REQUEST['type'];
									    $cond="";
									    //if($_REQUEST['type']==1){$cond="and soum_order_master.order_type='new' and soum_order_master.order_id=$order_id ";}
									    //if($_REQUEST['type']==2) {$cond="and soum_order_master.order_type='used' and soum_order_details.prod_id=$prod_id ";}
									    //if($_REQUEST['type2']==2) {$cond1="and soum_order_master.order_type='used'";}
									    //if($_REQUEST['type2']==1) {$cond1="and soum_order_master.order_type='new'";}
								        $qry="select *,soum_order_master.exchange ex1, soum_order_master.category_type ord_category_type,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=0 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										/*echo $qry;
										exit;*/
										//die();
										$res=$db->query($qry);
										 $pcount=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

											$price=$row['price1'];
											$qty=$row['qty'];
											$prod_id=$row['prod_id'];
											$amt=($price*1)*(1*$qty);
											$tot= $tot+$amt;
											$numb1.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
											 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
										     <td><?php  if($row['ex1']==1){ ?>
											     <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											<?php }else{ ?>
											     <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
											<?php } ?>
											 </td>
											 <?php if($row['ord_category_type']=='phone'){
											            $brandmodal =  $row['phone1'];
											     }else{
											            $brandmodal =  $row['brand'].' '.$row['modal_name'];
											     }?>
											  <td style="text-align:left"><?php echo $brandmodal; ?></td>
											  <td style="text-align:left"><?php echo $row['availability']; ?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									 $numb1=substr($numb1,0,(strlen.$numb1-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button1" type="button" onclick="$('#massms1').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>

								<div id="massms1" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $pcount;?> entries selected</div>
								<div class="col-md-12"><input name="mob1" class="form-control" id="mob1" type="text" value="<?=$numb1;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms1" id="sms1" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload1"><button name="Submit1" type="button" onclick="sms(1)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>



								</div>
									</div>
									
									
								<div class="tab-pane" id="tab-flip-one-un">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Exchange</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Availability</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php

									  $order_id=$_REQUEST['order_id'];
									  $type=$_REQUEST['type'];
									    $cond="";
									    //if($_REQUEST['type']==1){$cond="and soum_order_master.order_type='new' and soum_order_master.order_id=$order_id ";}
									    //if($_REQUEST['type']==2) {$cond="and soum_order_master.order_type='used' and soum_order_details.prod_id=$prod_id ";}
									    //if($_REQUEST['type2']==2) {$cond1="and soum_order_master.order_type='used'";}
									    //if($_REQUEST['type2']==1) {$cond1="and soum_order_master.order_type='new'";}
								        $qry="select *,soum_order_master.exchange ex1, soum_order_master.category_type ord_category_type,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=8 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										//die();
										$res=$db->query($qry);
										 $unpcount=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

											$price=$row['price1'];
											$qty=$row['qty'];
											$prod_id=$row['prod_id'];
											$amt=($price*1)*(1*$qty);
											$tot= $tot+$amt;
											$numb8.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
											 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
										     <td><?php  if($row['ex1']==1){ ?>
											     <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											<?php }else{ ?>
											     <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
											<?php } ?>
											 </td>
											 <?php if($row['ord_category_type']=='phone'){
											            $brandmodal =  $row['phone1'];
											     }else{
											            $brandmodal =  $row['brand'].' '.$row['modal_name'];
											     }?>
											  <td style="text-align:left"><?php echo $brandmodal; ?></td>
											  <td style="text-align:left"><?php echo $row['availability']; ?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									 $numb8=substr($numb8,0,(strlen.$numb8-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button1" type="button" onclick="$('#massms8').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>

								<div id="massms8" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $unpcount;?> entries selected</div>
								<div class="col-md-12"><input name="mob8" class="form-control" id="mob8" type="text" value="<?=$numb8;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms8" id="sms8" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload8"><button name="Submit8" type="button" onclick="sms(8)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>



								</div>
									</div>	
									
									
									
									
									
									<div class="tab-pane" id="tab-flip-two-1" style="width: 100%;float: left;">
                                    <table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
								$qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=1 ".$cond." ".$cond1." ".$conds."										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										$res=$db->query($qry);
										$prcount=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

											$price=$row['price1'];
											$prod_id=$row['prod_id'];

											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$numb7.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
											 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
											 <td style="text-align:left"><?=$row['phone1'];?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									$numb7=substr($numb7,0,(strlen.$numb7-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button7" type="button" onclick="$('#massms7').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>
								<div id="massms7" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $prcount;?> entries selected</div>
								<div class="col-md-12"><input name="mob7" class="form-control" id="mob7" type="text" value="<?=$numb7;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms7" id="sms7" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload7"><button name="Submit7" type="button" onclick="sms(7)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>
									</div>
								</div>
								<div class="tab-pane" id="tab-flip-three-1" style="width: 100%;float: left;">
                                    <table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
								$qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=2 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										$res=$db->query($qry);
										$acount=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
											$prod_id=$row['prod_id'];
											$price=$row['price1'];
											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$numb3.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
											 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
											 <td style="text-align:left"><?=$row['phone1'];?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									$numb3=substr($numb3,0,(strlen.$numb3-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button3" type="button" onclick="$('#massms3').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>
								<div id="massms3" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $acount;?> entries selected</div>
								<div class="col-md-12"><input name="mob3" class="form-control" id="mob3" type="text" value="<?=$numb3;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms3" id="sms3" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload3"><button name="Submit3" type="button" onclick="sms(3)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>

								</div>
									</div>
	                             <div class="tab-pane" id="tab-flip-four-1" style="width: 100%;float: left;">
                                    <table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
								$qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=3 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										$res=$db->query($qry);
										$dcount=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
											$prod_id=$row['prod_id'];
											$price=$row['price1'];
											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$numb4.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?> <?php if($prod_id==0) echo '*';?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
													 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
											 	 <?php if($row['ord_category_type']=='phone'){
											            $brandmodal =  $row['phone1'];
											     }else{
											            $brandmodal =  $row['brand'].' '.$row['modal_name'];
											     }?>
											  <td style="text-align:left"><?php echo $brandmodal; ?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									$numb4=substr($numb4,0,(strlen.$numb4-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button4" type="button" onclick="$('#massms4').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>
								<div id="massms4" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $dcount;?> entries selected</div>
								<div class="col-md-12"><input name="mob4" class="form-control" id="mob4" type="text" value="<?=$numb4;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms4" id="sms4" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
                                <div class="col-md-3" id="smsload4"><button name="Submit4" type="button" onclick="sms(4)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>
								</div>
									</div>

							<div class="tab-pane" id="tab-flip-four-2" style="width: 100%;float: left;">
                                    <table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
								$qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=4 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										$res=$db->query($qry);
										$dcount2=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
											$prod_id=$row['prod_id'];
											$price=$row['price1'];
											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$numb45.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?> <?php if($prod_id==0) echo '*';?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
													 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
											 <td style="text-align:left"><?=$row['phone1'];?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									$numb45=substr($numb45,0,(strlen.$numb45-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button45" type="button" onclick="$('#massms45').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>
								<div id="massms45" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $dcount2;?> entries selected</div>
								<div class="col-md-12"><input name="mob45" class="form-control" id="mob45" type="text" value="<?=$numb45;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms45" id="sms45" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload45"><button name="Submit45" type="button" onclick="sms(45)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>
								</div>
							</div>

							<div class="tab-pane" id="tab-flip-four-3" style="width: 100%;float: left;">
                                    <table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
								$qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=7 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										$res=$db->query($qry);
										$dcount3=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
											$prod_id=$row['prod_id'];
											$price=$row['price1'];
											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$numb4.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?> <?php if($prod_id==0) echo '*';?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
													 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
											 <td style="text-align:left"><?=$row['phone1'];?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									$numb4=substr($numb4,0,(strlen.$numb4-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button4" type="button" onclick="$('#massms4').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>
								<div id="massms4" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $dcount2;?> entries selected</div>
								<div class="col-md-12"><input name="mob4" class="form-control" id="mob4" type="text" value="<?=$numb4;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms4" id="sms4" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload4"><button name="Submit4" type="button" onclick="sms(4)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>
								</div>
							</div>


							<div class="tab-pane" id="tab-flip-four-4" style="width: 100%;float: left;">
                                    <table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Order Token</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Verified</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Total (in Rs.)</th>
											<th style="padding:5px;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
								$qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0
										and soum_order_master.status=6 ".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc";
										//echo $qry;
										$res=$db->query($qry);
										$dcount4=mysqli_num_rows($res);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$originalDate =$row['order_date'];
											$ord_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
											$prod_id=$row['prod_id'];
											$price=$row['price1'];
											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$numb8.=$row['mobile'].",";

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><?=$row['order_token'];?> <?php if($prod_id==0) echo '*';?></td>
										     <td><?=$ord_dt;?></td>
										     <td><?=$row['fname'];?></td>
											 <td><?=$row['mobile'];?></td>
													 <td style="text-align:center;"><?php
											  if($row['verified']=='verified'){?>
											  <i class="fa fa-check i-success" style="font-size:20px;color:green;">	</i>
											 <?php }else{ ?>
											  <i class="fa fa-close i-danger" style="font-size:20px;color:red;">	</i>
										<?php } ?></td>
											 <td style="text-align:left"><?=$row['phone1'];?></td>
										     <td style="text-align:right"><?=$amt;?></td>
											 <td><a href="order_details.php?order_id=<?=$row['order_id'];?>&type=<?=$type;?>&pid=<?=$prod_id;?>">Details</a></td>
										</tr>
									<?php
									}
									$numb8=substr($numb8,0,(strlen.$numb8-1));
									?>
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button44" type="button" onclick="$('#massms44').toggle();">View Mass SMS</button>
								<a href="user_mass_log.php">SMS Log</a>
								<div id="massms44" style="display:none;float:left;margin-top:15px;" class="col-md-12">
								<div class="col-md-12"><?php echo $dcount4;?> entries selected</div>
								<div class="col-md-12"><input name="mob44" class="form-control" id="mob44" type="text" value="<?=$numb8;?>" style="border:1px solid#ddd;"/></div>
								<div style="padding-bottom: 15px;"></div>
                                <div class="col-md-12"><textarea name="sms44" id="sms44" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"><?php echo $search22; ?> is now available on soum.co.in. For any further queries contact 9828075008/9829300040</textarea></div>
								<div class="col-md-3" id="smsload44"><button name="Submit44" type="button" onclick="sms(44)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>
								</div>
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
function ischk(val)
{

  window.location.href='calls_details.php?oid='+val;

}
</script>
<script>
$("document").ready(function(){
//alert('df');
$('#pcount').html("(<?=$pcount;?>)");
$('#unpcount').html("(<?=$unpcount;?>)");
$('#prcount').html("(<?=$prcount;?>)");
$('#acount').html("(<?=$acount;?>)");
$('#dcount').html("(<?=$dcount;?>)");
$('#dcount2').html("(<?=$dcount2;?>)");
$('#dcount3').html("(<?=$dcount3;?>)");
$('#dcount4').html("(<?=$dcount4;?>)");
});
function gopage(val)
			{
				 if(val=='all')
				 {
				    window.location.href="order2.php";
				 }
				 if(val=='new')
				 {
				    window.location.href="order2.php?type2=1";
				 }
				 if(val=='used')
				 {
				    window.location.href="order2.php?type2=2";
				 }

			}

function sms(v)
{
  var mob=$("#mob"+v).val();
  var sms=$("#sms"+v).val();
  $("#smsload"+v).html("<img src='images/viewloading.gif'/>");
   $.ajax({

		type:'POST',
		 url:'send_sms.php',
		data:'mob='+mob+'&sms='+sms,
		success:function(html)
		{
           if(html==1)
           {
            alert("SMS sent successfuly");

            $("#massms"+v).hide();
           }else{

		     alert('error');
             $("#massms"+v).hide();
			  $("#smsload"+v).html(html);

		   }
        }
   });

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

<?php
	$new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.prod_subcat_desc) phone1
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
	}
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
									table   : 'order',
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
						   e.preventDefault();
							document.getElementById('searchkeword').value = ui.item.label;

					  }
				});

	}

}

  </script>



</body>
</html>
