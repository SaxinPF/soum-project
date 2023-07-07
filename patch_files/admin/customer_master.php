<?php include('../config2.php');?>
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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
    
   
  
    var x = document.forms["myForm"]["address"].value;
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
    }
     
		
   
    
    
 
  
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
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
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
						$name=$row['fname'];
						$email=$row['email'];
						$address=$row['address'];
						$city=$row['city'];
						$mobile=$row['mobile'];
						$pincod=$row['pincod'];
						$pwd=$row['user_pass'];
						$review=$row['user_review'];
						$image=$row['image'];
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
						<form method="post" action="customer_master_act.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
						<div class="col-md-6">
							<div class="dash-head clearfix mb20">
							
										<input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
										<input name="act" type="hidden" value="<?=$act?>"/>
									<div class="col-md-6">
										<label>Mobile No <span class="require">*</span></label>
										<input value="<?=$mobile;?>" class="form-control" placeholder="Mobile No" name="mobile" id="mobile" onchange="profile(this.value)" type="text">
									</div>	
									<div class="col-md-6">
										<label>Name <span class="require">*</span></label>
										<input value="<?=$name;?>" class="form-control" placeholder="Name" name="name1" id="name1" type="text">
									</div>
									
									
									<div class="col-md-6">
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
									<div class="col-md-6">
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
									<div class="col-md-12" style="margin-top:10px;">
										<label>Address *</label>
										<textarea class="form-control" rows="3" placeholder="Address" name="address" id="address"><?=$address;?></textarea>
									</div>
									<div class="col-md-6" style="margin-top:10px;">
										<label>City <span class="require">*</span></label>
										<input value="<?=$city;?>" class="form-control" placeholder="City" name="city" id="city" type="text">
									</div>
									<div class="col-md-6" style="margin-top:10px;">
										<label class="labelTop">Pincode<span class="require">*</span></label>
										<input value="<?=$pincod;?>" class="form-control" placeholder="Pincod" name="pincod" id="pincod" type="text">
									</div>
									<div class="col-md-6">
										<label>Email Id <span class="require">*</span></label>
										<input value="<?=$email;?>" class="form-control" placeholder="Email" name="email" id="email" type="text">
									</div>
						<!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image;?></textarea>				   
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
						 
									<div class="col-md-4" style="margin-top:10px;">
										
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing1" src="../upload/profile/<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;left:30px;">
										<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"/></span>
										</div>
										<input type="hidden" id="file1" value="<?=$image?>"> 
																	
									</div>
									
									<div class="col-md-12" style="margin-top:10px;">
										<label>Users Review *</br> <p style="font-size:10px">Maximum 
										250 character</p></label>
										<textarea class="form-control" placeholder="User Review" rows="4" name="review" id="review" ><?=$review;?></textarea>
									</div>
									
									<div class="col-md-12" style="background:#fff;margin-bottom:15px;margin-top:15px;">
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
						<div class="col-md-6">
							<div style="width:100%;float:left;background-color:#fff;padding:15px;">
							<?php if($act=='edit'){ ?>
					  		<div class="col-md-12 mb30">
						     <!-- tab style -->
									<div class="clearfix tabs-fill">			
												
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Purchase </a></li>
												<li><a href="#tab-flip-two-1" data-toggle="tab">Sell </a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab-flip-one-1">
											     		
								                   <table class="table-2" style="width:100%;">
									<tr>
										<td class="auto-style2"><strong>#</strong></td>
										<td class="auto-style2"><strong>Date</strong></td>
										<td class="auto-style2"><strong>Product</strong></td>
										<td class="auto-style3"><strong>Price 
										(Rs)</strong></td>
										<td class="auto-style2"><strong>Status</strong></td>
									</tr>
									<?php
									 $sqld="select 
											soum_order_master.order_date,soum_order_master.order_type,
											if (soum_order_details.prod_id=0, soum_order_details.prod_name, soum_prod_subsubcat.prod_subcat_desc) prod_name,
											if (soum_order_details.prod_id=0, 'Walk',soum_order_master.`status`) status,
											if(isnull(soum_order_master.exc_prod) || soum_order_master.exc_prod='', 'Pr', 'Ex') ex,
											soum_order_master.order_id,
											soum_product_master.prod_id,
											soum_order_details.price
											from soum_order_master,soum_order_details, soum_product_master,soum_prod_subcat,soum_prod_subsubcat 
											
											where soum_order_master.order_id=soum_order_details.order_id
											and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
											and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id 
											and soum_product_master.prod_id=soum_order_details.prod_id
											and cust_type='Customer' and cust_id=? 
										/*and (isnull(soum_order_master.exc_prod) || soum_order_master.exc_prod='')*/";

									/** BOF Security Patch IS-002*/
									$custList=$db->prepare($sqld);
									$custList->bind_param('i', $poster_id); 
									$custList->execute();
									$resd=$custList->get_result();
									/** EOF Security Patch IS-002*/

									//$resd=$db->query($sqld);
									 $i=1;
									while($rowd=$resd->fetch_assoc()){	
									        $dob_by_chris=$rowd['order_date'];
 										    $b_y=substr($dob_by_chris,2,2);							
											$b_m=substr($dob_by_chris,5,2);							
											$b_d=substr($dob_by_chris,8,2);	
											$t=substr($dob_by_chris,11,8);						
											$dt=$b_d."-".$b_m."-".$b_y;
											$status=$rowd['status'];
								
									?>
									
									<tr>
										<td><?=$i++;?></td>
										<td><?=$dt;?></td>
										<td><?=$rowd['prod_name']." (".$rowd['order_type'].")"; ?></td>
										<td class="auto-style1"><?=$rowd['price']?></td>
										<td><a href="order_details.php?order_id=<?=$rowd['order_id']?>&prod_id=<?=$rowd['prod_id']?>"><?php
	                                    //
	                                    if($status=='0')
		                                    { echo "Pendding"; } 
	                                    else if ($status=='1') 
	                                    	{ echo "In Process";}
	                                    else if($status=='2')
	                                    	{echo "Advance Recieved";}
	                                    else if($status=='3')
	                                    	{echo "Dispatched";}
	                                    else{echo $status."-".$rowd['ex'];}  									
                                         
										 
										 ?>
										 
										 </a>
										 </td>
									</tr>
									<?php } ?>
								</table>					
												</div>
												<div class="tab-pane" id="tab-flip-two-1">
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
												
											</div>
										</div>						
										<!-- tab style -->
							</div>
								<?php } ?>						
							</div>
						</div>
						
						
					</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">						
						<div class="dash-head clearfix mb20" style="min-height:450px;">
						
												<?php 
												 $cond="";
						 if($_REQUEST['search']!='')
						 {
						   $search=$_REQUEST['search'];
						   
                           //$cond=" and  concat(reg_id,fname,email,address,city,pincod,mobile) like '%$search%'";
                           $cond=" and  concat(reg_id,fname,mobile) like '%$search%'"; 
						 }
						?>
												<form method="get"><table style="width:auto;float:right;text-align:right;margin-bottom:10px;"><tr><td><input name="search" value="<?=$_REQUEST['search'];?>" type="text" class="form-control" style="float:right;margin-right:10px;">
												</td><td><button name="Submit1" type="submit" value="Search" class="btn btn-primary mr5 waves-effect" style="float:right;">Search</button></td></tr></table></form>
												
							<!-- tab -->
						<div class="clearfix tabs-fill">			
												
											<ul class="nav nav-tabs" style="margin-bottom: -4px;">
												<li class="active"><a href="#tab-flip-three-1" data-toggle="tab">All </a></li>
												<li><a href="#tab-flip-four-1" data-toggle="tab">Testimonial </a></li>
											</ul>
											<div class="tab-content" style="width: 100%;float: left;">
												<div class="tab-pane active" id="tab-flip-three-1">
											    
											<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding: 5px;">SNo. </th>
											<th style="padding: 5px;">Date</th>
											<th style="padding: 5px;">Token id</th>
											<th style="padding: 5px;">Name</th>
											<th style="padding: 5px;">Phone No.</th>
											<th style="padding: 5px;">Email Id</th>
											<th style="padding: 5px;">City</th>
											<th style="padding: 5px;width:80px;">Action <a href="customer_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									$num_rec_per_page=25;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;
									$sql1="select *,(SELECT count(1) FROM soum_login_log where login_type='Customer' and login_by=soum_master_customer.cust_id  group by login_by)count1
									 from soum_master_customer where 1=1 ".$cond." order by cust_id desc LIMIT $start_from, $num_rec_per_page";
									//echo $sql1;
									$res=$db->query($sql1);
									//$i=1;
									while($row1=$res->fetch_assoc())
									  {
                                            $originalDate=$row1['reg_date'];
                                            $dtt=date("d-m-Y h:i:s A", strtotime($originalDate));
 										    
									?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><?=$dtt;?></td>
											<td style="padding: 5px;"><?=$row1['reg_id'];?></td>
											<td style="padding: 5px;"><a style="text-decoration:none" href="user_log.php?uid=<?=$row1['cust_id'];?>&name=<?=$row1['fname'];?>"><?=$row1['fname']." (".$row1['count1'].")";?></a></td>
											<td style="padding: 5px;"><?=$row1['mobile'];?></td>
											<td style="padding: 5px;"><?=$row1['email'];?></td>											
											<td style="padding: 5px;"><?=$row1['city'];?></td>
											<td style="padding: 5px;">
											<a href="customer_master.php?customer=<?=$row1['cust_id']?>&act=edit" class="link btn-primary">Edit</a>
											
											</td>
										</tr>
									
									<?php
									}
								
									?>
									</tbody>
								</table>
<div style="width:100%;float:left;margin-top:50px;position:relative;">
<div style="width:100%;margin:auto;height:auto;position:absolute;bottom:20px;left:20px;">
<?php 
$color= 'rgb(255, 45, 0)';
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select * from soum_master_customer where 1=1 ".$cond; 
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
</div></div>
													
												</div>
												<div class="tab-pane" id="tab-flip-four-1">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding: 5px;">SNo. </th>
											<th style="padding: 5px;">Date</th>
											<th style="padding: 5px;">Token id</th>
											<th style="padding: 5px;">Name</th>
											<th style="padding: 5px;">Phone No.</th>
											<th style="padding: 5px;">User Review</th>
											<th style="padding: 5px;width:80px;">Action <a href="customer_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									$num_rec_per_page=25;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;
									$sql1="select * from soum_master_customer where 1=1 and user_review!='' order by cust_id desc LIMIT $start_from, $num_rec_per_page";
									//echo $sql1;
									$res=$db->query($sql1);
									//$i=1;
									while($row1=$res->fetch_assoc())
									  {
                                            $originalDate=$row1['reg_date'];
                                            $dtt = date("d-m-Y h:i:s A", strtotime($originalDate));
									?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><?=$dtt;?></td>
											<td style="padding: 5px;"><?=$row1['reg_id'];?></td>
											<td style="padding: 5px;"><?=$row1['fname'];?></td>
											<td style="padding: 5px;"><?=$row1['mobile'];?></td>
																					
											<td style="padding: 5px;"><?=$row1['user_review'];?></td>
											<td style="padding: 5px;">
											<a href="customer_master.php?customer=<?=$row1['cust_id']?>&act=edit" class="link btn-primary">Edit</a>
											
											</td>
										</tr>
									
									<?php
									}
								
									?>
									</tbody>
								</table>
								
<div style="width:100%;float:left;margin-top:50px;position:relative;">
<div style="width:100%;margin:auto;height:auto;position:absolute;bottom:20px;left:20px;">
<?php 
$color= 'rgb(255, 45, 0)';
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select * from soum_master_customer where 1=1 and user_review!=''"; 
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
</div></div>
											</div>
												
											</div>
										</div>
			            <!--Tab-->					
												
	
												
												
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
</script>
	
</body>
</html>